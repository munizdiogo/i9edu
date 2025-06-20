<?php
namespace App\Http\Controllers;

use App\Models\Funcao;
use Illuminate\Http\Request;

class FuncaoController extends Controller
{
    public function index()
    {
        return view('funcoes.index');
    }

    public function data(Request $request)
    {
        $query = Funcao::query();
        $total = $query->count();

        if ($search = $request->input('search.value')) {
            $query->where('descricao', 'like', "%{$search}%")
                ->orWhere('codigo', $search);
        }
        $filtered = $query->count();

        $data = $query->skip($request->start)
            ->take($request->length)
            ->get()
            ->map(fn($f) => [
                'id' => $f->id,
                'codigo' => $f->codigo,
                'descricao' => $f->descricao,
                'status' => $f->status,
                'actions' => view('funcoes.partials.actions', compact('f'))->render(),
            ]);

        return response()->json([
            'draw' => intval($request->draw),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $data,
        ]);
    }

    public function create()
    {
        return view('funcoes.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request, "create");
        Funcao::create($data);
        return redirect()->route('funcoes.index')->with('success', 'Função criada!');
    }

    public function show(Funcao $funcao)
    {
        return view('funcoes.show', compact('funcao'));
    }

    public function edit(Funcao $funcao)
    {
        return view('funcoes.edit', compact('funcao'));
    }

    public function update(Request $request, Funcao $funcao)
    {
        $data = $this->validateData($request, "update", $funcao);
        $funcao->update($data);
        return redirect()->route('funcoes.index')->with('success', 'Função atualizada!');
    }

    public function destroy(Funcao $funcao)
    {
        $funcao->delete();
        return redirect()->route('funcoes.index')->with('success', 'Função removida!');
    }


    protected function validateData(Request $request, $origem = "create", $funcao = null)
    {
        if ($origem == 'create') {
            $rules = [
                'codigo' => 'required|integer|unique:funcoes,codigo',
                'descricao' => 'required|string',
                'status' => 'required|in:Ativo,Inativo',
            ];

        } else {
            $rules = [
                'codigo' => 'required|integer|unique:funcoes,codigo,' . $funcao->id,
                'descricao' => 'required|string',
                'status' => 'required|in:Ativo,Inativo',
            ];

        }

        return $request->validate($rules);
    }
}