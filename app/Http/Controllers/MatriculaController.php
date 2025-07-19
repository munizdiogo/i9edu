<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use App\Models\AlunoCursoAdmissao;
use App\Models\Turma;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    public function index()
    {
        return view('matriculas.index');
    }

    public function data(Request $request)
    {
        $cols = ['id', 'aluno', 'turma', 'data_matricula', 'status'];
        $total = Matricula::count();
        $query = Matricula::with(['admissao.aluno.perfil', 'turma']);

        if ($search = $request->input('search.value')) {
            $query->whereHas('admissao.aluno.perfil', function ($q) use ($search) {
                $q->where('nome', 'like', "%{$search}%");
            });
        }

        $filtered = $query->count();

        if ($order = $request->input('order.0')) {
            $col = $cols[$order['column']];
            $dir = $order['dir'];
            if ($col === 'aluno') {
                $query->join('alunos_curso_admissao', 'matriculas.aluno_curso_admissao_id', '=', 'alunos_curso_admissao.id')
                    ->join('alunos', 'alunos_curso_admissao.aluno_id', '=', 'alunos.id')
                    ->join('perfis', 'alunos.perfil_id', '=', 'perfis.id')
                    ->orderBy('perfis.nome', $dir);
            } elseif ($col === 'turma') {
                $query->join('turmas', 'matriculas.turma_id', '=', 'turmas.id')
                    ->orderBy('turmas.nome', $dir);
            } else {
                $query->orderBy($col, $dir);
            }
        }

        $page = $query->skip($request->input('start', 0))
            ->take($request->input('length', 10))
            ->get();

        $data = $page->map(function ($item) {
            $data_matricula = date_create($item->data_matricula);
            return [
                'id' => $item->id,
                'aluno' => $item->admissao->aluno->perfil->nome,
                'turma' => $item->turma->nome,
                'data_matricula' => $data_matricula->format('d/m/Y'),
                'status' => $item->status,
                'actions' => view('matriculas.partials.actions', compact('item'))->render(),
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
        $admissoes = AlunoCursoAdmissao::with('aluno.perfil')
            ->get()
            ->pluck('aluno.perfil.nome', 'id');
        $turmas = Turma::pluck('nome', 'id');
        return view('matriculas.create', compact('admissoes', 'turmas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'aluno_curso_admissao_id' => 'required|exists:alunos_curso_admissao,id',
            'turma_id' => 'required|exists:turmas,id',
            'contrato_id' => 'nullable|integer',
            'data_matricula' => 'required|date',
            'data_ocorrencia' => 'nullable|date',
            'status' => 'required|in:ATIVA,AGUARDANDO,APROVADO,APROVADO_PARCIALMENTE,CANCELADA,DESISTENTE,INFREQUENTE,REENQUADRADA',
        ]);
        $data['id_estrutura'] = session('estrutura_id');

        Matricula::create($data);

        return redirect()->route('matriculas.index')
            ->with('success', 'Matrícula criada!');
    }

    public function show(Matricula $matricula)
    {
        $admissoes = AlunoCursoAdmissao::with('aluno.perfil')
            ->get()
            ->pluck('aluno.perfil.nome', 'id');
        $turmas = Turma::pluck('nome', 'id');
        return view('matriculas.show', compact('matricula', 'admissoes', 'turmas'));
    }

    public function edit(Matricula $matricula)
    {
        $admissoes = AlunoCursoAdmissao::with('aluno.perfil')
            ->get()
            ->pluck('aluno.perfil.nome', 'id');
        $turmas = Turma::pluck('nome', 'id');
        return view('matriculas.edit', compact('matricula', 'admissoes', 'turmas'));
    }

    public function update(Request $request, Matricula $matricula)
    {
        $data = $request->validate([
            'aluno_curso_admissao_id' => 'required|exists:alunos_curso_admissao,id',
            'turma_id' => 'required|exists:turmas,id',
            'contrato_id' => 'nullable|integer',
            'data_matricula' => 'required|date',
            'data_ocorrencia' => 'nullable|date',
            'status' => 'required|in:ATIVA,AGUARDANDO,APROVADO,APROVADO_PARCIALMENTE,CANCELADA,DESISTENTE,INFREQUENTE,REENQUADRADA',
        ]);
        $data['id_estrutura'] = session('estrutura_id');

        $matricula->update($data);

        return redirect()->route('matriculas.index')
            ->with('success', 'Matrícula atualizada!');
    }

    public function destroy(Matricula $matricula)
    {
        $matricula->delete();

        return redirect()->route('matriculas.index')
            ->with('success', 'Matrícula removida.');
    }
}