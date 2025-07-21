<?php

namespace App\Http\Controllers;

use App\Models\Transacao;
use App\Models\Matricula;
use App\Models\Perfil;
use App\Models\Contrato;
use App\Models\PlanoPagamento;
use App\Models\Convenio;
use App\Models\PlanoConta;
use App\Models\ParcelaPlanoPagamento;
use App\Models\Estrutura;
use Illuminate\Http\Request;

class TransacaoController extends Controller
{
    // Listagem
    public function index()
    {
        return view('transacoes.index');
    }

    // DataTable Server-Side
    public function data(Request $request)
    {
        $query = Transacao::query()
            ->with([
                'matricula',
                'pagador',
                'contrato',
                'planoPagamento',
                'convenio',
                'planoConta',
                'parcelaPlanoPagamento',
            ])
            ->where('id_estrutura', session('estrutura_id'));

        // Filtros dinâmicos
        if ($request->filled('situacao')) {
            $query->where('situacao', $request->situacao);
        }
        if ($request->filled('aluno')) {
            $query->whereHas('matricula', function ($q) use ($request) {
                $q->where('nome', 'like', '%' . $request->aluno . '%');
            });
        }
        if ($request->filled('competencia')) {
            $query->where('competencia', $request->competencia);
        }
        if ($request->filled('data_vencimento')) {
            $query->whereDate('data_vencimento', $request->data_vencimento);
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        // Adicione outros filtros conforme necessário

        // Paginação server-side e ordenação
        $total = $query->count();
        $draw = $request->input('draw');
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $order = $request->input('order', []);
        $columns = $request->input('columns', []);
        $search = $request->input('search.value', '');

        // Pesquisa rápida (exemplo: busca na descrição ou aluno)
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('descricao', 'like', "%$search%")
                    ->orWhereHas('matricula', function ($qq) use ($search) {
                        $qq->where('nome', 'like', "%$search%");
                    });
            });
        }

        // Ordenação
        if (!empty($order)) {
            $columnIdx = $order[0]['column'];
            $columnName = $columns[$columnIdx]['data'];
            $dir = $order[0]['dir'];
            $query->orderBy($columnName, $dir);
        } else {
            $query->orderBy('data_vencimento', 'desc');
        }

        // Paginação
        $transacoes = $query->skip($start)->take($length)->get();

        // Formatação para DataTable
        $data = $transacoes->map(function ($item) {
            return [
                'id' => $item->id,
                'aluno' => optional($item->matricula)->nome,
                'pagador' => optional($item->pagador)->nome ?? '',
                'descricao' => $item->descricao,
                'competencia' => $item->competencia,
                'data_vencimento' => optional($item->data_vencimento)->format('d/m/Y'),
                'valor' => number_format($item->valor, 2, ',', '.'),
                'valor_pago' => number_format($item->valor_pago ?? 0, 2, ',', '.'),
                'situacao' => $item->situacao,
                'status' => ucfirst($item->status),
                'actions' => view('transacoes.partials.actions', compact('item'))->render(),
            ];
        });

        return response()->json([
            'draw' => intval($draw),
            'recordsTotal' => $total,
            'recordsFiltered' => $total,
            'data' => $data,
        ]);
    }

    // Exibir formulário de cadastro
    public function create()
    {
        return view('transacoes.create', [
            'matriculas' => Matricula::with('admissao')->get()->pluck('admissao.aluno.perfil.nome', 'id'),
            'pagadores' => Perfil::pluck('nome', 'id'),
            'contratos' => Contrato::pluck('descricao', 'id'),
            'planos' => PlanoPagamento::pluck('nome', 'id'),
            'convenios' => Convenio::pluck('descricao', 'id'),
            'planos_conta' => PlanoConta::pluck('descricao', 'id'),
            'parcelas' => ParcelaPlanoPagamento::pluck('descricao', 'id'),
        ]);
    }

    // Salvar novo registro
    public function store(Request $request)
    {
        $data = $this->validateData($request, 'create');
        $data['id_estrutura'] = session('estrutura_id');

        Transacao::create($data);

        return redirect()->route('transacoes.index')->with('success', 'Transação criada com sucesso!');
    }

    // Exibir formulário de edição
    public function edit($id)
    {
        $transacao = Transacao::findOrFail($id);

        return view('transacoes.edit', [
            'transacao' => $transacao,
            'matriculas' => Matricula::with('admissao')->get()->pluck('admissao.aluno.perfil.nome', 'id'),
            'pagadores' => Perfil::pluck('nome', 'id'),
            'contratos' => Contrato::find($transacao->id_contrato),
            'planos' => PlanoPagamento::pluck('nome', 'id'),
            'convenios' => Convenio::pluck('descricao', 'id'),
            'planos_conta' => PlanoConta::pluck('descricao', 'id'),
            'parcelas' => ParcelaPlanoPagamento::pluck('descricao', 'id'),
        ]);
    }

    // Atualizar registro
    public function update(Request $request, $id)
    {
        $transacao = Transacao::findOrFail($id);

        $data = $this->validateData($request, 'update');
        $data['id_estrutura'] = session('estrutura_id');

        $transacao->update($data);

        return redirect()->route('transacoes.index')->with('success', 'Transação atualizada com sucesso!');
    }

    // Visualizar detalhes
    public function show($id)
    {
        $transacao = Transacao::with([
            'matricula',
            'pagador',
            'contrato',
            'planoPagamento',
            'convenio',
            'planoConta',
            'parcelaPlanoPagamento'
        ])->findOrFail($id);

        return view('transacoes.show', compact('transacao'));
    }

    // Excluir registro
    public function destroy($id)
    {
        $transacao = Transacao::findOrFail($id);
        $transacao->delete();

        return redirect()->route('transacoes.index')->with('success', 'Transação excluída com sucesso!');
    }


    protected function validateData(Request $request, $origem = "create", $setor = null)
    {
        if ($origem == 'create') {
            $rules = [
                'id_matricula' => 'required|exists:matriculas,id',
                'id_pagador' => 'required|exists:perfis,id',
                'id_contrato' => 'nullable|exists:contratos,id',
                'id_plano_pagamento' => 'nullable|exists:planos_de_pagamento,id',
                'id_convenio' => 'nullable|exists:convenios,id',
                'id_plano_conta' => 'nullable|exists:plano_de_contas,id',
                'id_parcela_plano_pagamento' => 'nullable|exists:parcelas_plano_pagamento,id',
                'descricao' => 'nullable|string',
                'competencia' => 'nullable|string',
                'data_vencimento' => 'required|date',
                'valor' => 'required|numeric',
                'situacao' => 'required|string',
                'status' => 'required|string',
            ];

        } else {
            $rules = [
                'id_matricula' => 'required|exists:matriculas,id',
                'id_pagador' => 'required|exists:perfis,id',
                'id_contrato' => 'nullable|exists:contratos,id',
                'id_plano_pagamento' => 'nullable|exists:planos_de_pagamento,id',
                'id_convenio' => 'nullable|exists:convenios,id',
                'id_plano_conta' => 'nullable|exists:plano_de_contas,id',
                'id_parcela_plano_pagamento' => 'nullable|exists:parcelas_plano_pagamento,id',
                'descricao' => 'nullable|string',
                'competencia' => 'nullable|string',
                'data_vencimento' => 'required|date',
                'valor' => 'required|numeric',
                'situacao' => 'required|string',
                'status' => 'required|string',
            ];

        }

        return $request->validate($rules);
    }
}
