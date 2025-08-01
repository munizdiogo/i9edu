<?php
namespace App\Http\Controllers;

use App\Models\Turma;
use App\Models\MatrizCurricular;
use App\Models\PeriodoLetivo;
use App\Models\Polo;
use App\Models\Perfil;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public function index()
    {

        return view('turmas.index');
    }

    public function data(Request $request)
    {
        $cols = ['id', 'nome', 'matriz', 'periodo', 'status'];
        $total = Turma::count();
        $q = Turma::with(['matrizCurricular', 'periodoLetivo']);

        if ($s = $request->input('search.value')) {
            $q->where('nome', 'like', "%{$s}%");
        }
        $filtered = $q->count();
        if ($order = $request->input('order.0')) {
            $col = $cols[$order['column']];
            $dir = $order['dir'];
            if ($col === 'matriz') {
                $q->join('matrizes_curriculares', 'turmas.id_matriz_curricular', '=', 'matrizes_curriculares.id')
                    ->orderBy('matrizes_curriculares.nome', $dir);
            } elseif ($col === 'periodo') {
                $q->join('periodos_letivos', 'turmas.id_periodo_letivo', '=', 'periodos_letivos.id')
                    ->orderBy('periodos_letivos.nome', $dir);
            } else {
                $q->orderBy($col, $dir);
            }
        }
        $start = $request->input('start', 0);
        $len = $request->input('length', 10);
        $page = $q->skip($start)->take($len)->get();

        $data = $page->map(function ($item) {
            return [
                'id' => $item->id,
                'nome' => $item->nome,
                'matriz' => $item->matrizCurricular->nome,
                'periodo' => $item->periodoLetivo->nome,
                'status' => $item->status,
                'actions' => view('turmas.partials.actions', ['item' => $item])->render(),
            ];
        });

        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $data,
        ]);
    }

    public function create()
    {
        $matrizes = MatrizCurricular::all();
        $periodos = PeriodoLetivo::all();
        $polos = Polo::all();
        $professores = Perfil::all();
        return view('turmas.create', compact('matrizes', 'periodos', 'polos', 'professores'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);

        if ($data->fails()) {
            return redirect()->back()
                ->withErrors($data)
                ->withInput();
        }
        $data = $data->getData();
        $data['id_estrutura'] = session('id_estrutura');
        Turma::create($data);
        return redirect()->route('turmas.index')->with('success', 'Turma criada!');
    }

    public function show(Turma $turma)
    {
        $matrizes = MatrizCurricular::all();
        $periodos = PeriodoLetivo::all();
        $polos = Polo::all();
        $professores = Perfil::all();
        return view('turmas.show', compact('turma', 'matrizes', 'periodos', 'polos', 'professores'));
    }

    public function edit(Turma $turma)
    {
        $matrizes = MatrizCurricular::all();
        $periodos = PeriodoLetivo::all();
        $polos = Polo::all();
        $professores = Perfil::all();

        return view('turmas.edit', compact('turma', 'matrizes', 'periodos', 'polos', 'professores'));
    }

    public function update(Request $request, Turma $turma)
    {
        $data = $this->validateData($request);

        if ($data->fails()) {
            return redirect()->back()
                ->withErrors($data)
                ->withInput();
        }
        $data = $data->getData();
        $data['id_estrutura'] = session('id_estrutura');

        $turma->update($data);
        return redirect()->route('turmas.index')->with('success', 'Turma atualizada!');
    }

    public function destroy(Turma $turma)
    {
        $turma->delete();
        return redirect()->route('turmas.index')->with('success', 'Turma removida.');
    }


    protected function validateData(Request $request, $id = null)
    {
        $rules = [
            'id_matriz_curricular' => 'required|exists:matrizes_curriculares,id',
            'id_periodo_letivo' => 'required|exists:periodos_letivos,id',
            'nome' => 'required|string|max:255',
            'turno' => 'required|in:Manhã,Tarde,Noite,EaD,Integral',
            'status' => 'required|in:ATIVA,INATIVA',
            // config notas
            'media_periodo' => 'numeric',
            'media_minima' => 'numeric',
            'freq_periodo' => 'integer',
            'media_recuperacao' => 'numeric',
            'media_minima_rec' => 'numeric',
            'nota_minima' => 'numeric',
            'nota_maxima' => 'numeric',
            'ne_nota_exame' => 'boolean',
            'nf_nota_final' => 'boolean',
            // info comp
            'cidade' => 'nullable|string',
            'data_inicio' => 'nullable|date',
            'data_termino' => 'nullable|date',
            'formato_venda' => 'nullable|string',
            'id_inep' => 'nullable|string',
            'seguro_escolar' => 'nullable|string',
            'id_professor_responsavel' => 'nullable|exists:perfis,id',
            'fech_diario' => 'nullable|date',
            'data_limite_matriculas' => 'nullable|date',
            'data_abono_faltas' => 'nullable|date',
            'observacoes' => 'nullable|string',
            'nucleo_comum' => 'boolean',
            'acesso_biblioteca' => 'boolean',
            'acesso_blackboard' => 'boolean',
            'atendimento_online' => 'boolean',
        ];


        return $request->validate($rules);
    }
}