<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\Curso;
use App\Models\Matricula;
use App\Models\Perfil;
use App\Models\PeriodoLetivo;
use App\Models\PlanoPagamento;
use App\Models\Turma;
use Illuminate\Http\Request;

class ContratoController extends Controller
{
    public function index()
    {
        return view('contratos.index');
    }

    public function data(Request $request)
    {
        $query = Contrato::with(['perfil', 'curso', 'matricula', 'turma', 'periodoLetivo', 'planoPagamento']);
        $total = $query->count();

        // Adicione filtros conforme necessidade do seu sistema
        if ($request->status) {
            $query->where('status', $request->status);
        }

        $filtered = $query->count();

        $data = $query->get()->map(function ($item) {
            $dataCriacao = date_create($item->created_at);
            return [
                'id' => $item->id,
                'perfil' => $item->perfil->nome,
                'curso' => $item->curso->nome,
                'matricula' => $item->matricula->id,
                'turma' => $item->turma->nome,
                'plano_pagamento' => $item->planoPagamento->nome,
                'status' => $item->status,
                'data_aceite' => $item->data_aceite,
                'actions' => view('contratos.partials.actions', compact('item'))->render(),
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
        return view('contratos.create', [
            'alunos' => Perfil::all(),
            'cursos' => Curso::all(),
            'matriculas' => Matricula::all(),
            'turmas' => Turma::all(),
            'periodosLetivos' => PeriodoLetivo::all(),
            'planos' => PlanoPagamento::all()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_perfil' => 'required',
            'id_curso' => 'required',
            'id_matricula' => 'nullable',
            'id_turma' => 'nullable',
            'id_periodo_letivo' => 'required',
            'id_plano_pagamento' => 'required',
            'status' => 'required',
            'data_aceite' => 'nullable|date',
            'data_inicio_vigencia' => 'nullable|date',
            'data_fim_vigencia' => 'nullable|date',
            'cancelado_por' => 'nullable|string',
            'observacao' => 'nullable|string',
        ]);
        $data['id_estrutura'] = session('id_estrutura');
        Contrato::create($data);
        return redirect()->route('contratos.index')->with('success', 'Contrato criado!');
    }

    public function edit($id)
    {
        $contrato = Contrato::findOrFail($id);
        return view('contratos.edit', [
            'contrato' => $contrato,
            'alunos' => Perfil::all(),
            'cursos' => Curso::all(),
            'matriculas' => Matricula::all(),
            'turmas' => Turma::all(),
            'periodosLetivos' => PeriodoLetivo::all(),
            'planos' => PlanoPagamento::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $contrato = Contrato::findOrFail($id);
        $data = $request->validate([
            // Mesmos campos do store
        ]);
        $data['id_estrutura'] = session('id_estrutura');

        $contrato->update($data);
        return redirect()->route('contratos.index')->with('success', 'Contrato atualizado!');
    }

    public function show($id)
    {
        $contrato = Contrato::with(['perfil', 'curso', 'matricula', 'turma', 'periodoLetivo', 'planoPagamento'])->findOrFail($id);
        return view('contratos.show', compact('contrato'));
    }

    public function destroy($id)
    {
        Contrato::findOrFail($id)->delete();
        return redirect()->route('contratos.index')->with('success', 'Contrato excluído!');
    }
}