<?php
namespace App\Http\Controllers;

use App\Models\PlanoPagamento;
use App\Models\Curso;
use App\Models\Polo;
use Illuminate\Http\Request;

class PlanoPagamentoController extends Controller
{
    public function index()
    {
        return view('planos.index');
    }

    public function data(Request $request)
    {
        $cols = ['id', 'nome', 'disponivel_todos_cursos', 'permite_cupom'];
        $q = PlanoPagamento::select($cols);
        $total = $q->count();

        if ($search = $request->input('search.value')) {
            $q->where('nome', 'like', "%{$search}%");
        }
        $filtered = $q->count();

        if ($order = $request->input('order.0')) {
            $q->orderBy($cols[$order['column']], $order['dir']);
        }

        $rows = $q->skip($request->start)
            ->take($request->length)
            ->get()
            ->map(function ($p) {
                return [
                    'id' => $p->id,
                    'nome' => $p->nome,
                    'disponivel_todos_cursos' => $p->disponivel_todos_cursos ? 'Sim' : 'Não',
                    'permite_cupom' => $p->permite_cupom ? 'Sim' : 'Não',
                    'actions' => view('planos.partials.actions', ['p' => $p])->render(),
                ];
            });

        return response()->json([
            'draw' => intval($request->draw),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $rows,
        ]);
    }

    public function create()
    {
        return view('planos.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request, "create");
        $data['id_estrutura'] = session('estrutura_id');
        $plano = PlanoPagamento::create($data);
        return redirect()->route('planos_pagamento.edit', $plano->id);
    }

    public function edit(PlanoPagamento $planos_pagamento)
    {
        $cursos = Curso::pluck('nome', 'id');
        $polos = Polo::pluck('nome', 'id');
        return view('planos.edit', compact('planos_pagamento', 'cursos', 'polos'));
    }

    public function update(Request $request, PlanoPagamento $planos_pagamento)
    {
        $data = $this->validateData($request, "update");
        $data['id_estrutura'] = session('estrutura_id');
        $planos_pagamento->update($data);
        $planos_pagamento->cursos()->sync($request->input('cursos', []));
        $planos_pagamento->polos()->sync($request->input('polos', []));
        return back()->with('success', 'Plano atualizado');
    }

    public function destroy(PlanoPagamento $planos_pagamento)
    {
        $planos_pagamento->delete();
        return redirect()->route('planos_pagamento.index');
    }

    protected function validateData(Request $request, $origem = "create", $professor = null)
    {
        if ($origem == "create") {
            $rules = [
                'nome' => 'required|string',
                // 'disponivel_todos_cursos' => 'boolean',
                // 'permite_cupom' => 'boolean',
            ];

        } else {
            $rules = [
                'nome' => 'required|string',
                'disponivel_todos_cursos' => 'boolean',
                'permite_cupom' => 'boolean',
                'cursos' => 'array',
                'cursos.*' => 'exists:cursos,id',
                'polos' => 'array',
                'polos.*' => 'exists:polos,id'
            ];
        }


        return $request->validate($rules);
    }


}
