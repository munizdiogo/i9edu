<?php
namespace App\Http\Controllers;

use App\Models\ParcelaPlanoPagamento;
use App\Models\PlanoPagamento;
use Illuminate\Http\Request;

class ParcelaPlanoPagamentoController extends Controller
{
    public function data(Request $request, PlanoPagamento $plano)
    {
        $q = ParcelaPlanoPagamento::where('plano_pagamento_id', $plano->id);
        $total = $q->count();

        if ($search = $request->input('search.value')) {
            $q->where('descricao', 'like', "%{$search}%");
        }
        $filtered = $q->count();

        $rows = $q->skip($request->start)
            ->take($request->length)
            ->get()
            ->map(function ($parcela) use ($plano) {
                return [
                    'id' => $parcela->id,
                    'descricao' => $parcela->descricao,
                    'quantidade_parcelas' => $parcela->quantidade_parcelas,
                    'valor' => number_format($parcela->valor, 2, ',', '.'),
                    'actions' => view('planos.partials.parcela_actions', compact('parcela', 'plano'))->render(),
                ];
            });

        return response()->json([
            'draw' => intval($request->draw),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $rows,
        ]);
    }

    public function store(Request $request, PlanoPagamento $plano)
    {
        $data = $this->validateData($request, "create");
        $data['id_estrutura'] = session('id_estrutura');
        $data['plano_pagamento_id'] = $plano->id;
        ParcelaPlanoPagamento::create($data);
        return back();
    }

    public function destroy(ParcelaPlanoPagamento $r)
    {
        $r->delete();
        return back();
    }

    public function edit(PlanoPagamento $plano, ParcelaPlanoPagamento $parcela)
    {
        // retornamos JSON para popular o modal
        return response()->json($parcela);
    }

    public function update(Request $request, PlanoPagamento $plano, ParcelaPlanoPagamento $parcela)
    {
        $data = $this->validateData($request, "update");
        $data['id_estrutura'] = session('id_estrutura');

        $parcela->update($data);
        return back()->with('success', 'Parcela atualizada!');
    }

    protected function validateData(Request $request, $origem = "create", $professor = null)
    {
        if ($origem == "create") {
            $rules = [
                'descricao' => 'required|string',
                'quantidade_parcelas' => 'required|string',
                'valor' => 'required|numeric',
                'calculo_vencimento' => 'required|in:FIXO,DIAS_UTIL,DINAMICO',
                'tipo_parcela' => 'required|in:NORMAL,MATRICULA,DESCONTO',
            ];

        } else {
            $rules = [
                'descricao' => 'required|string',
                'quantidade_parcelas' => 'required|string',
                'valor' => 'required|numeric',
                'calculo_vencimento' => 'required|in:FIXO,DIAS_UTIL,DINAMICO',
                'tipo_parcela' => 'required|in:NORMAL,MATRICULA,DESCONTO',
            ];
        }


        return $request->validate($rules);
    }
}
