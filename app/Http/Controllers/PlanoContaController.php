<?php

namespace App\Http\Controllers;

use App\Models\PlanoConta;
use App\Models\GrupoConta;
use Illuminate\Http\Request;

class PlanoContaController extends Controller
{
    public function index()
    {
        return view('plano_contas.index');
    }

    public function create()
    {
        $gruposContas = GrupoConta::get(["id", "descricao"]);
        return view('plano_contas.create', compact('gruposContas'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request, "create");
        $data['id_estrutura'] = session('estrutura_id');

        PlanoConta::create($data);

        return redirect()->route('plano-contas.index')->with('success', 'Plano de conta criado com sucesso!');
    }

    public function show(PlanoConta $plano_conta)
    {
        $grupos = GrupoConta::pluck('descricao', 'id');
        return view('plano_contas.show', compact('plano_conta', 'grupos'));
    }

    public function edit(PlanoConta $plano_conta)
    {
        $gruposContas = GrupoConta::pluck('descricao', 'id');
        return view('plano_contas.edit', compact('plano_conta', 'gruposContas'));
    }

    public function update(Request $request, PlanoConta $plano_conta)
    {
        $data = $this->validateData($request, "update");
        $data['id_estrutura'] = session('estrutura_id');


        $plano_conta->update($data);

        return redirect()->route('plano-contas.index')->with('success', 'Plano de conta atualizado com sucesso!');
    }

    public function destroy(PlanoConta $plano_conta)
    {
        $plano_conta->delete();
        return redirect()->route('plano-contas.index')->with('success', 'Plano de conta excluído com sucesso!');
    }

    public function data(Request $request)
    {
        $query = PlanoConta::with('grupoConta');
        $total = $query->count();

        if ($search = $request->input('search.value')) {
            $query->where('id', $search)
                ->orWhere('descricao', 'like', '%' . $search . '%')
                ->orWhere('codigo', 'like', '%' . $search . '%');
        }

        $filtered = $query->count();

        $data = $query->get()->map(function ($item) {
            $dataCriacao = date_create($item->created_at);
            return [
                'id' => $item->id,
                'descricao' => $item->descricao,
                'codigo' => $item->codigo,
                'grupo' => $item->grupoConta->descricao,
                'operacao' => $item->operacao,
                'status' => $item->status,
                'actions' => view('plano_contas.partials.actions', compact('item'))->render(),
            ];
        });

        return response()->json([
            'data' => $data,
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'draw' => intval($request->draw),
        ]);


    }

    protected function validateData(Request $request, $origem = "create", $professor = null)
    {
        if ($origem == "create") {
            $rules = [
                'descricao' => 'required|string|max:255',
                'codigo' => 'required|string|max:50',
                'tipo_conta' => 'required|in:Analitica,Sintetica',
                'operacao' => 'required|in:Soma,Subtracao',
                'status' => 'required|in:Ativo,Inativo',
                'natureza' => 'nullable|in:ATIVO,PASSIVO,PATRIMONIO,RECEITA,DESPESA',
            ];

        } else {
            $rules = [
                'descricao' => 'required|string|max:255',
                'codigo' => 'required|string|max:50',
                'tipo_conta' => 'required|in:Analitica,Sintetica',
                'operacao' => 'required|in:Soma,Subtracao',
                'status' => 'required|in:Ativo,Inativo',
                'natureza' => 'nullable|in:ATIVO,PASSIVO,PATRIMONIO,RECEITA,DESPESA',
            ];
        }


        return $request->validate($rules);
    }
}
