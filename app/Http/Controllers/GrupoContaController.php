<?php

namespace App\Http\Controllers;

use App\Models\GrupoConta;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GrupoContaController extends Controller
{
    public function index()
    {
        return view('grupo_contas.index');
    }

    public function data(Request $request)
    {
        $query = GrupoConta::query();
        $total = $query->count();

        if ($search = $request->input('search.value')) {
            $query->where('id', $search)
                ->orWhere('descricao', 'like', '%' . $search . '%')
                ->orWhere('sigla', 'like', '%' . $search . '%');
        }

        $filtered = $query->count();

        $data = $query->get()->map(function ($item) {
            $dataCriacao = date_create($item->created_at);
            return [
                'id' => $item->id,
                'descricao' => $item->descricao,
                'sigla' => $item->sigla,
                'ordem' => $item->ordem,
                'nivel' => $item->nivel,
                'tipo_resultado' => $item->tipo_resultado,
                'operacao' => $item->operacao,
                'status' => $item->status,
                'actions' => view('grupo_contas.partials.actions', compact('item'))->render(),
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
        return view('grupo_contas.create');
    }

    public function store(Request $request)
    {
        try {
            $data = $this->validateData($request, "update");
            $data['id_estrutura'] = session('id_estrutura');

            GrupoConta::create($data);

            return redirect()->route('grupo-contas.index')->with('success', 'Grupo de Conta criado com sucesso!');

        } catch (\Exception $e) {
            return back()->with('error', 'Não foi possível criar solicitação:' . $e->getMessage());
        }
    }

    public function edit(GrupoConta $grupoConta)
    {
        return view('grupo_contas.edit', compact('grupoConta'));
    }

    public function show(GrupoConta $grupoConta)
    {
        return view('grupo_contas.show', compact('grupoConta'));
    }

    public function update(Request $request, GrupoConta $grupoConta)
    {
        $data = $this->validateData($request, "update");
        $data['id_estrutura'] = session('id_estrutura');

        $grupoConta->update($data);

        return redirect()->route('grupo-contas.index')->with('success', 'Grupo de Conta atualizado com sucesso!');
    }

    public function destroy(GrupoConta $grupoConta)
    {
        $grupoConta->delete();
        return response()->route('grupo-contas.index')->with('success', 'Grupo de Conta deletado com sucesso!');
    }

    protected function validateData(Request $request, $origem = "create", $funcionario = null)
    {
        if ($origem == 'create') {
            $rules = [
                // 'descricao' => 'required|string|max:255',
                // 'sigla' => 'nullable|string|max:10',
                // 'nivel' => 'required|integer',
                // 'ordem' => 'nullable|string|max:20',
                // 'tipo_resultado' => 'required|in:VALOR,PERCENTUAL',
                // 'operacao' => 'required|in:(+),(-)',
                // 'eh_dre' => 'nullable|boolean',
                // 'mensalidade' => 'nullable|boolean',
                // 'apresentar_relatorio' => 'nullable|boolean',
            ];

        } else {
            $rules = [
                'descricao' => 'required|string|max:255',
                'sigla' => 'nullable|string|max:10',
                'nivel' => 'required|integer',
                'ordem' => 'nullable|string|max:20',
                'tipo_resultado' => 'required|in:VALOR,PERCENTUAL',
                'operacao' => 'required|in:(+),(-)',
                'eh_dre' => 'nullable|boolean',
                'mensalidade' => 'nullable|boolean',
                'apresentar_relatorio' => 'nullable|boolean',
            ];

        }

        return $request->validate($rules);
    }
}
