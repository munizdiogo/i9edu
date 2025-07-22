<?php
namespace App\Http\Controllers;

use App\Models\CursoMatrizCaptacao;
use Illuminate\Http\Request;

class CursoMatrizCaptacaoController extends Controller
{
    public function data(Request $request)
    {
        $data = CursoMatrizCaptacao::with('curso')
            ->where('id_matriz_captacao', $request->matriz)
            ->get()
            ->map(fn($c) => [
                'id' => $c->id,
                'curso' => $c->curso->nome,
                'status' => $c->status,
                'modalidade' => $c->modalidade,
                'vagas' => $c->quantidade_vagas,
                'actions' => view('matriz_captacao.tabs.cursos.partials.actions', compact('c'))->render(),
            ]);

        return response()->json(['data' => $data]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_matriz_captacao' => 'required|exists:matriz_captacao,id',
            'id_curso' => 'required|exists:cursos,id',
            'status' => 'required|in:Ativo,Inativo',
            'modalidade' => 'required|in:Presencial,EaD',
            'quantidade_vagas' => 'required|integer',
        ]);
        $data['id_estrutura'] = session('id_estrutura');
        CursoMatrizCaptacao::create($data);
        return back()->with('success', 'Curso adicionado!');
    }

    public function destroy(CursoMatrizCaptacao $curso)
    {
        $curso->delete();
        return back()->with('success', 'Curso removido.');
    }
}