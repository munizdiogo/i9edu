<?php

namespace App\Http\Controllers;

use App\Models\Convenio;
use App\Models\PlanoConta;
use Illuminate\Http\Request;

class ConvenioController extends Controller
{
    public function index()
    {
        return view('convenios.index');
    }

    public function data(Request $request)
    {
        $query = Convenio::with('planoConta');

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
                'modalidade' => $item->modalidade,
                'tipo' => $item->tipo,
                'valor' => $item->valor,
                'status' => $item->status,
                'actions' => view('convenios.partials.actions', compact('item'))->render(),
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
        $planos = PlanoConta::pluck('descricao', 'id');
        return view('convenios.create', compact('planos'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request, "create");
        $data['perde_convenio'] = $request->has('perde_convenio');
        $data['id_estrutura'] = session('estrutura_id');

        Convenio::create($data);
        return redirect()->route('convenios.index')->with('success', 'Convênio cadastrado!');
    }

    public function edit(Convenio $convenio)
    {
        $planos = PlanoConta::pluck('descricao', 'id');
        return view('convenios.edit', compact('convenio', 'planos'));
    }

    public function update(Request $request, Convenio $convenio)
    {
        $data = $this->validateData($request, "update");
        $data['perde_convenio'] = $request->has('perde_convenio');
        $data['id_estrutura'] = session('estrutura_id');

        $convenio->update($data);
        return redirect()->route('convenios.index')->with('success', 'Convênio atualizado!');
    }

    public function show(Convenio $convenio)
    {
        return view('convenios.show', compact('convenio'));
    }

    public function destroy(Convenio $convenio)
    {
        $convenio->delete();
        return redirect()->route('convenios.index')->with('success', 'Convênio removido!');
    }

    protected function validateData(Request $request, $origem = "create", $professor = null)
    {

        if ($origem == "create") {
            $rules = [
                'descricao' => 'required|string',
                'modalidade' => 'required|string',
                'tipo_financiamento' => 'nullable|string',
                'plano_conta_id' => 'required|exists:plano_contas,id',
                'valor' => 'required|numeric',
                'tipo' => 'required|string',
                'perde_convenio' => 'boolean',
                'status' => 'required|string',
                'pagamento_ate' => 'required|string',
                'dia_limite' => 'nullable|string',
                'tipo_vencimento' => 'nullable|string',
                'inicio' => 'nullable|date',
                'fim' => 'nullable|date',
                'instrucao_bancaria' => 'nullable|string',
            ];
        } else {
            $rules = [
                'descricao' => 'required|string',
                'modalidade' => 'required|string',
                'tipo_financiamento' => 'nullable|string',
                'plano_conta_id' => 'required|exists:plano_contas,id',
                'valor' => 'required|numeric',
                'tipo' => 'required|string',
                'perde_convenio' => 'boolean',
                'status' => 'required|string',
                'pagamento_ate' => 'required|string',
                'dia_limite' => 'nullable|string',
                'tipo_vencimento' => 'nullable|string',
                'inicio' => 'nullable|date',
                'fim' => 'nullable|date',
                'instrucao_bancaria' => 'nullable|string',
            ];
        }

        return $request->validate($rules);
    }
}
