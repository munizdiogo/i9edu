<?php

namespace App\Http\Controllers;

use App\Models\RequerimentoAssunto;
use App\Models\RequerimentoDepartamento;
use App\Models\RequerimentoStatus;
use Illuminate\Http\Request;

class RequerimentoAssuntoController extends Controller
{
    public function index()
    {
        return view('requerimentos_assuntos.index');
    }

    public function data(Request $request)
    {
        $query = RequerimentoAssunto::with('departamento');

        if ($request->has('search') && $request->search['value'] != '') {
            $search = $request->search['value'];
            $query->where(function ($q) use ($search) {
                $q->where('codigo', 'like', "%{$search}%")
                    ->orWhere('descricao', 'like', "%{$search}%");
            });
        }

        $data = $query->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'codigo' => $item->codigo,
                'descricao' => $item->descricao,
                'departamento' => $item->departamento->descricao,
                'tipo_assunto' => $item->tipo_assunto,
                'status' => $item->status === 'ATIVO' ? '<span class="badge bg-success">Ativo</span>' : '<span class="badge bg-danger">Inativo</span>',
                'acoes' => view('requerimentos_assuntos.partials.actions', compact('item'))->render(),
            ];
        });

        return response()->json([
            'data' => $data,
        ]);
    }

    public function create()
    {
        $departamentos = RequerimentoDepartamento::where('status', 'Ativo')->get();
        $status = RequerimentoStatus::where('status', 'Ativo')->get();
        return view('requerimentos_assuntos.create', compact('departamentos', 'status'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request, "create");
        $data['id_estrutura'] = session('id_estrutura');

        RequerimentoAssunto::create($data);
        return redirect()->route('requerimentos_assuntos.index')->with('success', 'Assunto criado com sucesso!');
    }

    public function edit(RequerimentoAssunto $requerimento_assunto)
    {
        $departamentos = RequerimentoDepartamento::where('status', 'Ativo')->get();
        $status = RequerimentoStatus::where('status', 'Ativo')->get();
        return view('requerimentos_assuntos.edit', compact('requerimento_assunto', 'departamentos', 'status'));
    }

    public function update(Request $request, RequerimentoAssunto $requerimento_assunto)
    {
        $data = $this->validateData($request, "update");
        $data['id_estrutura'] = session('id_estrutura');

        $requerimento_assunto->update($data);
        return redirect()->route('requerimentos_assuntos.index')->with('success', 'Assunto atualizado com sucesso!');
    }

    public function destroy(RequerimentoAssunto $requerimento_assunto)
    {
        $requerimento_assunto->delete();
        return response()->json(['message' => 'Assunto excluído com sucesso!']);
    }

    protected function validateData(Request $request, $id = null)
    {
        $rules = [
            'descricao' => 'required|string|max:255',
            // 'valor' => 'nullable|numeric',
            'status' => 'required|in:Ativo,Inativo',
            // 'prazo_maximo_resolucao' => 'nullable|integer',
            // 'quantidade_gratuita' => 'nullable|integer',
            // 'permite_portal' => 'boolean',
            // 'visualizar_portal' => 'boolean',
            // 'bloquear_inadimplente' => 'boolean',
            // 'vincular_matricula' => 'boolean',
            // 'nao_permitir_se_existe' => 'boolean',
            // 'obrigatorio_anexo' => 'boolean',
            // 'observacoes' => 'nullable|string',
            // 'tipo_assunto' => 'required|in:POLO,ALUNO,TODOS',
            // 'id_requerimento_status' => 'nullable|exists:requerimentos_status,id',
            'id_requerimento_departamento' => 'required|exists:requerimentos_departamentos,id',
        ];

        return $request->validate($rules);
    }
}
