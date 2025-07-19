<?php
namespace App\Http\Controllers;

use App\Models\MatrizCaptacao;
use Illuminate\Http\Request;

class MatrizCaptacaoController extends Controller
{
    public function index()
    {
        return view('matriz_captacao.index');
    }

    public function data(Request $r)
    {
        $q = MatrizCaptacao::query();
        $total = $q->count();
        if ($search = $r->input('search.value')) {
            $q->where('nome', 'like', "%{$search}%");
        }
        $filtered = $q->count();
        $data = $q->skip($r->start)->take($r->length)->get()->map(fn($item) => [
            'id' => $item->id,
            'nome' => $item->nome,
            'status' => $item->status,
            'actions' => view('matriz_captacao.partials.actions', compact('item'))->render(),
        ]);

        return response()->json([
            'draw' => $r->draw,
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $data,
        ]);
    }

    public function create()
    {
        // para create não passamos $matriz
        return view('matriz_captacao.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data['id_estrutura'] = session('estrutura_id');

        $matriz = MatrizCaptacao::create($data);

        // após criar, redireciona para edit, onde já existe o ID e aparecem os tabs
        return redirect()->route('matriz-captacao.edit', $matriz->id)
            ->with('success', 'Matriz de Captação criada!');
    }

    public function show(MatrizCaptacao $matriz)
    {
        return view('matriz_captacao.show', compact('matriz'));
    }

    public function edit(MatrizCaptacao $matriz)
    {

        return view('matriz_captacao.edit', compact('matriz'));
    }

    public function update(Request $request, MatrizCaptacao $matriz)
    {
        $data = $this->validateData($request);
        $data['id_estrutura'] = session('estrutura_id');
        $matriz->update($data);

        return redirect()->route('matriz-captacao.edit', $matriz->id)
            ->with('success', 'Matriz atualizada!');
    }

    public function destroy(MatrizCaptacao $matriz)
    {
        $matriz->delete();
        return redirect()->route('matriz_captacao.index')
            ->with('success', 'Matriz removida.');
    }

    protected function validateData(Request $request, $origem = "create", $professor = null)
    {
        $rules = [
            'nome' => 'required|string',
            'descricao' => 'nullable|string',
            'status' => 'required|in:Ativo,Inativo',
        ];

        return $request->validate($rules);
    }
}