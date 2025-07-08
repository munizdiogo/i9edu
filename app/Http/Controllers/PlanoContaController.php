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
        $this->validateData($request, "create");

        PlanoConta::create($request->all());

        return redirect()->route('plano-contas.index')->with('success', 'Plano de conta criado com sucesso!');
    }

    public function edit(PlanoConta $plano_conta)
    {
        $grupos = GrupoConta::pluck('descricao', 'id');
        return view('plano_contas.edit', compact('plano_conta', 'grupos'));
    }

    public function update(Request $request, PlanoConta $plano_conta)
    {
        $this->validateData($request, "update");

        $plano_conta->update($request->all());

        return redirect()->route('plano-contas.index')->with('success', 'Plano de conta atualizado com sucesso!');
    }

    public function destroy(PlanoConta $plano_conta)
    {
        $plano_conta->delete();
        return redirect()->route('plano-contas.index')->with('success', 'Plano de conta excluído com sucesso!');
    }

    public function data()
    {
        $planos = PlanoConta::with('grupoConta')->get();

        return datatables()->of($planos)
            ->addColumn('grupo', fn($row) => $row->grupoConta->descricao ?? '-')
            ->addColumn('actions', function ($row) {
                return view('components.actions', [
                    'edit' => route('plano-contas.edit', $row->id),
                    'destroy' => route('plano-contas.destroy', $row->id)
                ]);
            })
            ->rawColumns(['actions'])
            ->make(true);
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
