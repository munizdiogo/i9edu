<?php

namespace App\Http\Controllers;

use App\Models\RequerimentoSolicitacao;
use App\Models\Aluno;
use App\Models\Polo;
use App\Models\Curso;
use App\Models\Matricula;
use App\Models\RequerimentoAssunto;
use App\Models\RequerimentoStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class RequerimentoSolicitacaoController extends Controller
{
    public function index()
    {
        return view('requerimentos_solicitacoes.index');
    }

    public function data(Request $request)
    {
        $query = RequerimentoSolicitacao::with(['aluno', 'matricula', 'polo', 'assunto', 'status']);
        $total = $query->count();

        if ($request->has('search') && $request->search['value'] != '') {
            $search = $request->search['value'];
            $query->whereHas('aluno', function ($q) use ($search) {
                $q->where('nome', 'like', '%' . $search . '%');
            })->orWhereHas('assunto', function ($q) use ($search) {
                $q->where('titulo', 'like', '%' . $search . '%');
            })->orWhere('id', 'like', '%' . $search . '%');
        }

        if ($search = $request->input('search.value')) {
            $query->whwhereHasere('id', $search)
                ->orWhereHas('aluno', fn($q) => $q->where('ra', 'like', "%{$search}%"))
                ->orWhereHas('aluno.perfil', fn($q) => $q->where('aluno.perfil.nome', 'like', "%{$search}%"))
                ->orWhereHas('assunto', fn($q) => $q->where('assunto', 'like', "%{$search}%"));
        }

        $filtered = $query->count();

        $data = $query->get()->map(function ($item) {
            $dataCriacao = date_create($item->created_at);
            return [
                'id' => $item->id,
                'aluno' => $item->aluno->perfil->nome,
                'matricula' => $item->matricula->id,
                'polo' => $item->polo->nome,
                'assunto' => $item->assunto->descricao,
                'created_at' => $dataCriacao->format('d/m/Y'),
                'status' => '<span class="badge bg-success">' . $item->status->descricao . '</span>',
                'actions' => view('requerimentos_solicitacoes.partials.actions', compact('item'))->render(),
            ];
        });

        return response()->json([
            'data' => $data,
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'draw' => intval($request->draw),
        ]);
    }


    public function create()
    {
        return view('requerimentos_solicitacoes.create', [
            'modo' => 'create',
            'alunos' => Aluno::all(),
            'polos' => Polo::all(),
            'cursos' => Curso::all(),
            'matriculas' => Matricula::all(),
            'assuntos' => RequerimentoAssunto::where('status', 'Ativo')->get(),
            'status' => RequerimentoStatus::where('status', 'Ativo')->get(),
        ]);
    }

    public function store(Request $request)
    {
        try {
            $data = $this->validateData($request, "update");
            $data['id_estrutura'] = session('estrutura_id');

            if ($request->hasFile('arquivo')) {
                $nomeArquivo = Str::uuid() . '.' . $request->arquivo->extension();
                $caminho = $request->file('arquivo')->storeAs('requerimentos/anexos', $nomeArquivo, 'public');
                $data['caminho_anexo'] = $caminho;
            }

            RequerimentoSolicitacao::create($data);

            return redirect()->route('requerimentos_solicitacoes.index')
                ->with('success', 'Solicitação registrada com sucesso!');

        } catch (\Exception $e) {
            return back()->with('error', 'Não foi possível criar solicitação:' . $e->getMessage());
        }
    }

    public function show(RequerimentoSolicitacao $requerimentos_solicitacoes)
    {
        return view('requerimentos_solicitacoes.show', [
            'modo' => 'show',
            'alunos' => Aluno::all(),
            'polos' => Polo::all(),
            'cursos' => Curso::all(),
            'matriculas' => Matricula::all(),
            'requerimento' => $requerimentos_solicitacoes,
            'assuntos' => RequerimentoAssunto::where('status', 'Ativo')->get(),
            'status' => RequerimentoStatus::where('status', 'Ativo')->get(),
        ]);
    }

    public function edit(RequerimentoSolicitacao $requerimento_solicitacao)
    {
        return view('requerimentos_solicitacoes.edit', [
            'modo' => 'edit',
            'requerimento' => $requerimento_solicitacao,
            'alunos' => Aluno::all(),
            'polos' => Polo::all(),
            'cursos' => Curso::all(),
            'matriculas' => Matricula::all(),
            'assuntos' => RequerimentoAssunto::where('status', 'Ativo')->get(),
            'status' => RequerimentoStatus::where('status', 'Ativo')->get(),
        ]);
    }

    public function update(Request $request, RequerimentoSolicitacao $requerimento_solicitacao)
    {
        $data = $this->validateData($request, "update");
        $data['id_estrutura'] = session('estrutura_id');

        if ($request->hasFile('arquivo')) {
            if ($requerimento_solicitacao->caminho_anexo) {
                Storage::disk('public')->delete($requerimento_solicitacao->caminho_anexo);
            }
            $nomeArquivo = Str::uuid() . '.' . $request->arquivo->extension();
            $data['caminho_anexo'] = $request->file('arquivo')->storeAs('requerimentos/anexos', $nomeArquivo, 'public');
        }

        $requerimento_solicitacao->update($data);

        return redirect()->route('requerimentos_solicitacoes.index')
            ->with('success', 'Solicitação atualizada com sucesso!');
    }

    public function destroy(RequerimentoSolicitacao $requerimento_solicitacao)
    {
        if ($requerimento_solicitacao->caminho_anexo) {
            Storage::disk('public')->delete($requerimento_solicitacao->caminho_anexo);
        }

        $requerimento_solicitacao->delete();

        return redirect()->route('requerimentos_solicitacoes.index')
            ->with('success', 'Solicitação excluída com sucesso!');
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('anexo')) {
            $file = $request->file('anexo');
            $path = $file->store('anexos', 'public'); // salva em storage/app/public/anexos

            return response()->json(['success' => true, 'path' => $path]);
        }

        return response()->json(['success' => false], 400);
    }

    protected function validateData(Request $request, $origem = "create", $funcionario = null)
    {
        if ($origem == 'create') {
            $rules = [
                'id_aluno' => 'required|exists:alunos,id',
                'id_polo' => 'required|exists:polos,id',
                'id_matricula' => 'required|exists:matriculas,id',
                'id_curso' => 'nullable|exists:cursos,id',
                'id_assunto' => 'required|exists:requerimentos_assuntos,id',
                'id_status' => 'required|exists:requerimentos_status,id',
                'observacao' => 'nullable|string',
                'arquivo' => 'nullable|file|max:10240',
            ];

        } else {
            $rules = [
                'id_aluno' => 'required|exists:alunos,id',
                'id_polo' => 'required|exists:polos,id',
                'id_matricula' => 'required|exists:matriculas,id',
                'id_curso' => 'nullable|exists:cursos,id',
                'id_assunto' => 'required|exists:requerimentos_assuntos,id',
                'id_status' => 'required|exists:requerimentos_status,id',
                'observacao' => 'nullable|string',
                'arquivo' => 'nullable|file|max:10240',
            ];

        }

        return $request->validate($rules);
    }

}
