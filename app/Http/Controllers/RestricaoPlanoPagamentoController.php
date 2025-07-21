<?php



namespace App\Http\Controllers;

use App\Models\RestricaoPlanoPagamento;
use App\Models\PlanoPagamento;
use App\Models\Curso;
use App\Models\Polo;
use App\Models\Turma;
use Illuminate\Http\Request;

class RestricaoPlanoPagamentoController extends Controller
{
    public function index()
    {
        $planos = PlanoPagamento::all();
        // $cursos = Curso::all();
        // $polos = Polo::all();
        // $turmas = Turma::all();
        return view('restricoes_plano_pagamento.index', compact('planos'));
    }

    public function data(Request $request)
    {
        $query = RestricaoPlanoPagamento::with(['plano', 'cursos', 'polos', 'turmas']);
        $total = $query->count();


        if ($request->has('search') && $request->search['value']) {
            $search = $request->search['value'];
            $query->orWhereHas(
                'cursos',
                fn($q) =>
                $q->where('nome', 'like', "%{$search}%")
            )
                ->orWhereHas(
                    'polos',
                    fn($q) =>
                    $q->where('nome', 'like', "%{$search}%")
                )
                ->orWhereHas(
                    'turmas',
                    fn($q) =>
                    $q->where('nome', 'like', "%{$search}%")
                )
                ->orWhereHas(
                    'plano',
                    fn($q) =>
                    $q->where('nome', 'like', "%{$search}%")
                )->orWhere('modalidade', 'like', "%{$search}%");


        }



        $filtered = $query->count();

        $data = $query->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'plano' => $item->plano->nome ?? '-',
                'cursos' => $item->cursos->pluck('nome')->implode(', '),
                'polos' => $item->polos->pluck('nome')->implode(', '),
                'turmas' => $item->turmas->pluck('nome')->implode(', '),
                'modalidade' => $item->modalidade ?? '-',
                'actions' => view('restricoes_plano_pagamento.partials.actions', ['item' => $item])->render(),
            ];
        });

        return response()->json([
            'draw' => intval($request->draw),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $data,
        ]);



    }

    public function create()
    {
        $planos = PlanoPagamento::all();
        $cursos = Curso::all();
        $polos = Polo::all();
        $turmas = Turma::all();
        return view('restricoes_plano_pagamento.create', compact('planos', 'cursos', 'polos', 'turmas'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request, "create");
        $data['id_estrutura'] = session('estrutura_id');

        $restricao = RestricaoPlanoPagamento::create($data);

        // vincula vários de uma vez só
        $restricao->cursos()->sync($request->id_cursos ?: []);
        $restricao->polos()->sync($request->id_polos ?: []);
        $restricao->turmas()->sync($request->turma_ids ?: []);

        return redirect()->route('restricoes_plano_pagamento.index')->with('success', 'Restrição adicionada!');
    }

    public function edit(RestricaoPlanoPagamento $restricao)
    {
        // $restricao = RestricaoPlanoPagamento::findOrFail($id);
        $planos = PlanoPagamento::all();
        $cursos = Curso::all();
        $polos = Polo::all();
        $turmas = Turma::all();
        return view('restricoes_plano_pagamento.edit', compact('restricao', 'planos', 'cursos', 'polos', 'turmas'));
    }

    public function show(RestricaoPlanoPagamento $restricao)
    {
        // $restricao = RestricaoPlanoPagamento::findOrFail($id);
        $planos = PlanoPagamento::all();
        $cursos = Curso::all();
        $polos = Polo::all();
        $turmas = Turma::all();
        return view('restricoes_plano_pagamento.edit', compact('restricao', 'planos', 'cursos', 'polos', 'turmas'));
    }

    public function update(Request $request, RestricaoPlanoPagamento $restricao)
    {
        // $restricao = RestricaoPlanoPagamento::findOrFail($id);
        $data = $this->validateData($request, "update", $restricao);
        $data['id_estrutura'] = session('estrutura_id');

        $restricao->update($data);
        $restricao->cursos()->sync($request->id_cursos ?: []);
        $restricao->polos()->sync($request->id_polos ?: []);
        $restricao->turmas()->sync($request->turma_ids ?: []);

        return redirect()->route('restricoes_plano_pagamento.index')->with('success', 'Restrição atualizada!');
    }

    public function destroy($id)
    {
        RestricaoPlanoPagamento::destroy($id);
        return response()->json(['success' => true]);
    }

    protected function validateData(Request $request, $origem = "create", $restricao = null)
    {
        if ($origem == "create") {
            $rules = [
                'id_plano_pagamento' => 'required|exists:planos_pagamento,id',
                'modalidade' => 'nullable|string|max:50',
            ];

        } else {
            $rules = [
                'id_plano_pagamento' => 'required|exists:planos_pagamento,id',
                'modalidade' => 'nullable|string|max:50',
            ];
        }


        return $request->validate($rules);
    }
}