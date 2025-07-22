<?php

namespace App\Http\Controllers;

use App\Models\AlunoCursoAdmissao;
use App\Models\Aluno;
use App\Models\MatrizCurricular;
use App\Models\Polo;
use App\Models\PeriodoLetivo;
use App\Models\Turma;
use App\Models\EditalProcessoSeletivo;
use Illuminate\Http\Request;

class AlunoCursoAdmissaoController extends Controller
{
    private $instituicoes = ['UNIP', 'ANHANGUERA'];
    public function index()
    {
        return view('admissoes.index');
    }

    public function data(Request $request)
    {
        $cols = ['id', 'aluno', 'matriz', 'data_ingresso', 'turno', 'status'];
        $total = AlunoCursoAdmissao::count();
        $query = AlunoCursoAdmissao::with(['aluno', 'matriz']);

        if ($s = $request->input('search.value')) {
            $query->whereHas('aluno', function ($q) use ($s) {
                $q->where('ra', 'like', "%{$s}%")
                    ->orWhere('nome', 'like', "%{$s}%");
            });
        }

        $filtered = $query->count();

        if ($order = $request->input('order.0')) {
            $col = $cols[$order['column']];
            $dir = $order['dir'];
            if ($col === 'aluno') {
                $query->join('alunos', 'admissoes.id_aluno', '=', 'alunos.id')
                    ->orderBy('alunos.nome', $dir);
            } elseif ($col === 'matriz') {
                $query->join('matrizes_curriculares', 'admissoes.id_matriz_curricular', '=', 'matrizes_curriculares.id')
                    ->orderBy('matrizes_curriculares.nome', $dir);
            } else {
                $query->orderBy($col, $dir);
            }
        }

        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $page = $query->skip($start)->take($length)->get();

        $data = $page->map(function ($item) {
            $data_ingresso = date_create($item->data_ingresso);
            return [
                'id' => $item->id,
                'aluno' => "{$item->aluno->ra} — {$item->aluno->perfil->nome}",
                'matriz' => $item->matriz->nome,
                'data_ingresso' => $data_ingresso->format('d/m/Y'),
                'turno' => $item->turno,
                'status' => $item->status,
                'actions' => view('admissoes.partials.actions', ['item' => $item])->render(),
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
        $alunos = Aluno::with('perfil')->get()->pluck('perfil.nome', 'id');
        $matrizes = MatrizCurricular::pluck('nome', 'id');
        $polos = Polo::pluck('nome', 'id');
        $periodos = PeriodoLetivo::pluck('nome_impressao', 'id');
        $turmas = Turma::pluck('nome', 'id');
        $editais = EditalProcessoSeletivo::pluck('descricao', 'id');
        $instituicoes = $this->instituicoes;

        return view('admissoes.create', compact('alunos', 'matrizes', 'polos', 'periodos', 'turmas', 'editais', 'instituicoes'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data['id_estrutura'] = session('id_estrutura');
        AlunoCursoAdmissao::create($data);
        return redirect()->route('admissoes.index')->with('success', 'Registro salvo!');
    }

    public function show(AlunoCursoAdmissao $admissao)
    {
        // mesmos selectlists do create
        $alunos = Aluno::with('perfil')->get()->pluck('perfil.nome', 'id');
        $matrizes = MatrizCurricular::pluck('nome', 'id');
        $polos = Polo::pluck('nome', 'id');
        $periodos = PeriodoLetivo::pluck('nome_impressao', 'id');
        $turmas = Turma::pluck('nome', 'id');
        $editais = EditalProcessoSeletivo::pluck('descricao', 'id');
        $instituicoes = $this->instituicoes;

        return view('admissoes.show', compact('admissao', 'alunos', 'matrizes', 'polos', 'periodos', 'turmas', 'editais', 'instituicoes'));
    }

    public function edit(AlunoCursoAdmissao $admissao)
    {
        // mesmos selectlists do create
        $alunos = Aluno::with('perfil')->get()->pluck('perfil.nome', 'id');
        $matrizes = MatrizCurricular::pluck('nome', 'id');
        $polos = Polo::pluck('nome', 'id');
        $periodos = PeriodoLetivo::pluck('nome_impressao', 'id');
        $turmas = Turma::pluck('nome', 'id');
        $editais = EditalProcessoSeletivo::pluck('descricao', 'id');
        $instituicoes = $this->instituicoes;

        return view('admissoes.edit', compact('admissao', 'alunos', 'matrizes', 'polos', 'periodos', 'turmas', 'editais', 'instituicoes'));
    }

    public function update(Request $request, AlunoCursoAdmissao $admissao)
    {
        $data = $this->validateData($request);
        $data['id_estrutura'] = session('id_estrutura');
        $admissao->update($data);
        return redirect()->route('admissoes.index')->with('success', 'Registro atualizado!');
    }

    public function destroy(AlunoCursoAdmissao $admissao)
    {
        $admissao->delete();
        return redirect()->route('admissoes.index')->with('success', 'Registro removido.');
    }


    protected function validateData(Request $request, $id = null)
    {
        $rules = [
            'id_aluno' => 'required|exists:alunos,id',
            'id_matriz_curricular' => 'required|exists:matrizes_curriculares,id',
            // 'campus_id_polo' => 'nullable|exists:polos,id',
            // 'id_periodo_letivo_ingresso' => 'nullable|exists:periodos_letivos,id',
            // 'id_turma_base' => 'nullable|exists:turmas,id',
            'id_edital_processo_seletivo' => 'nullable|exists:editais_processo_seletivo,id',
            'data_ingresso' => 'required|date',
            'data_inicio_curso' => 'nullable|date',
            'data_conclusao' => 'nullable|date',
            'periodo_conclusao' => 'nullable|string',
            'turno' => 'required|in:Matutino,Vespertino,Noturno,Integral,EaD',
            'numero_matricula' => 'nullable|string',
            'forma_ingresso_id' => 'nullable|exists:formas_ingresso,id',
            'id_instituicao' => 'nullable|exists:instituicoes,id',
            'classificacao' => 'nullable|integer',
            'pontos' => 'nullable|numeric',
            'vagas' => 'nullable|integer',
            'numero_chamada' => 'nullable|integer',
            'data_vestibular' => 'nullable|date',
            'procedencia_escola_publica' => 'in:(1)Sim,(2)Não Informado',
            'nota_redacao' => 'nullable|numeric',
            'observacao' => 'nullable|string',
            'data_estagio' => 'nullable|date',
            'horas_estagio' => 'nullable|integer',
            // 'instituicao_transferencia_id' => 'nullable|exists:instituicoes,id',
            // 'status' => 'required|in:ATIVO,INATIVO'
        ];

        return $request->validate($rules);
    }
}