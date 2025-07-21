<?php
namespace App\Http\Controllers;

use App\Models\PoloMatrizCaptacao;
use Illuminate\Http\Request;

class PoloMatrizCaptacaoController extends Controller
{
    public function data(Request $request)
    {
        $data = PoloMatrizCaptacao::with('polo')
            ->where('matriz_captacao_id', $request->matriz)
            ->get()
            ->map(fn($p) => [
                'id' => $p->id,
                'polo' => $p->polo->nome,
                'status' => $p->status,
                'vagas' => $p->quantidade_vagas,
                'actions' => view('matriz_captacao.tabs.polos.partials.actions', compact('p'))->render(),
            ]);

        return response()->json(['data' => $data]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'matriz_captacao_id' => 'required|exists:matriz_captacao,id',
            'id_polo' => 'required|exists:polos,id',
            'status' => 'required|in:Ativo,Inativo',
            'quantidade_vagas' => 'required|integer',
        ]);
        $data['id_estrutura'] = session('id_estrutura');
        PoloMatrizCaptacao::create($data);
        return back()->with('success', 'Polo adicionado!');
    }

    public function destroy(PoloMatrizCaptacao $polo)
    {
        $polo->delete();
        return back()->with('success', 'Polo removido.');
    }
}