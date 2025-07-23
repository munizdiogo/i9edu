<?php
namespace App\Http\Controllers;
use App\Models\MatrizCurricular;
use App\Models\Curso;
use App\Models\Polo;
use Illuminate\Http\Request;

class MatrizCurricularController extends Controller
{
    public function index()
    {
        return view('matrizes.index');
    }

    public function data(Request $request)
    {
        $cols = ['id', 'nome', 'id_curso', 'status'];
        $total = MatrizCurricular::count();
        $q = MatrizCurricular::with('curso');
        if ($s = $request->input('search.value')) {
            $q->where('nome', "like", "%{$s}%")->orWhereHas('curso', function ($qq) use ($s) {
                $qq->where('nome_impressao1', 'like', "%{$s}%");
            });
        }
        $filtered = $q->count();
        if ($order = $request->input('order.0')) {
            $col = $cols[$order['column']];
            $q->orderBy($col, $order['dir']);
        }
        $start = $request->input('start', 0);
        $len = $request->input('length', 10);
        $page = $q->skip($start)->take($len)->get();
        $data = $page->map(function ($item) {
            return [
                'id' => $item->id,
                'nome' => $item->nome,
                'curso' => $item->curso->nome_impressao1,
                'status' => $item->status,
                'actions' => view('matrizes.partials.actions', compact('item'))->render(),
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
        $cursos = Curso::all();
        $polos = Polo::all();
        return view('matrizes.create', compact('cursos', 'polos'));
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
        MatrizCurricular::create($data);
        return redirect()->route('matrizes.index')->with('success', 'Matriz criada!');
    }

    public function show(MatrizCurricular $matriz)
    {
        $cursos = Curso::all();
        $polos = Polo::all();
        return view('matrizes.show', compact('matriz', 'cursos', 'polos'));
    }

    public function edit(MatrizCurricular $matriz)
    {
        $cursos = Curso::all();
        $polos = Polo::all();
        return view('matrizes.edit', compact('matriz', 'cursos', 'polos'));
    }

    public function update(Request $request, MatrizCurricular $matriz)
    {
        $data = $this->validateData($request);

        if ($data->fails()) {
            return redirect()->back()
                ->withErrors($data)
                ->withInput();
        }
        $data = $data->getData();
        $data['id_estrutura'] = session('id_estrutura');
        $matriz->update($data);
        return redirect()->route('matrizes.index')->with('success', 'Matriz atualizada!');
    }

    public function destroy(MatrizCurricular $matriz)
    {
        $matriz->delete();
        return redirect()->route('matrizes.index')->with('success', 'Matriz removida.');
    }

    protected function validateData(Request $request, $id = null)
    {
        $rules = [
            'nome' => 'required|string',
            'nome_reduzido' => 'nullable|string',
            'id_curso' => 'required|exists:cursos,id',
            'id_centro_custo' => 'nullable|exists:polos,id',
            'habilitacao' => 'nullable|string',
            'data_habilitacao' => 'nullable|date',
            'status' => 'required|in:ATIVO,INATIVO',
            'modalidade' => 'required|in:Presencial,EaD,Híbrido',
            'id_inep' => 'nullable|string',
            'data_curriculo' => 'nullable|date',
            'tipo_horas_atividades' => 'integer',
            'min_hr_aula' => 'integer',
            'creditos' => 'numeric',
            'carga_horaria' => 'integer',
            'ch_teorica' => 'integer',
            // … (demais CH)
            'media_periodo' => 'numeric',
            'media_minima' => 'numeric',
            'freq_periodo' => 'integer',
            // … (demais notas)
            'nota_minima' => 'numeric',
            'nota_maxima' => 'numeric',
            'prazo_em' => 'in:Anos,Semestres',
            'prazo_inicial' => 'integer',
            'prazo_maximo' => 'integer',
            'periodicidade' => 'string',
            'possivel_trancar_1periodo' => 'boolean',
            // demais validações omitidas por brevidade... assume semelhantes
        ];

        return $request->validate($rules);
    }

}
