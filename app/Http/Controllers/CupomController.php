<?php

namespace App\Http\Controllers;

use App\Models\Cupom;
use App\Models\Convenio;
use App\Models\PlanoConta;
use App\Models\Curso;
use App\Models\Polo;
use Illuminate\Http\Request;

class CupomController extends Controller
{
    public function index()
    {

        return view('cupons.index');
    }

    public function data()
    {
        $cupons = Cupom::with(['convenio', 'planoConta'])->get();

        return response()->json([
            'data' => $cupons->map(function ($item) {
                return [
                    'id' => $item->id,
                    'codigo' => $item->codigo,
                    'vigencia' => $item->data_inicio . ' a ' . $item->data_fim,
                    'quantidade_maxima' => $item->quantidade_maxima,
                    'convenio' => $item->convenio->descricao ?? "",
                    'status' => $item->status,
                    'actions' => view('cupons.partials.actions', compact('item'))->render()
                ];
            }),
        ]);
    }

    public function create()
    {
        $convenios = Convenio::all();
        $planos = PlanoConta::all();
        return view('cupons.create', compact('convenios', 'planos'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request, "create");
        $data['criar_convenio_pagador'] = $request->has('criar_convenio_pagador');
        $data['validar_matricula_ativa'] = $request->has('validar_matricula_ativa');
        $data['id_estrutura'] = session('estrutura_id');

        $cupom = Cupom::create($data);

        return redirect()->route('cupons.index')->with('success', 'Cupom criado com sucesso!');
    }

    public function show(Cupom $cupom)
    {
        $convenios = Convenio::all();
        $planos = PlanoConta::all();
        return view('cupons.show', compact('cupom', 'convenios', 'planos'));
    }

    public function edit(Cupom $cupom)
    {
        $convenios = Convenio::all();
        $planos = PlanoConta::all();
        $cursos = Curso::all();
        $polos = Polo::all();
        return view('cupons.edit', compact('cupom', 'convenios', 'planos', 'cursos', 'polos'));
    }

    public function update(Request $request, Cupom $cupom)
    {
        $data = $this->validateData($request, "update", $cupom);
        $data['criar_convenio_pagador'] = $request->has('criar_convenio_pagador');
        $data['validar_matricula_ativa'] = $request->has('validar_matricula_ativa');
        $data['id_estrutura'] = session('estrutura_id');

        $cupom->update($data);

        return redirect()->route('cupons.index')->with('success', 'Cupom atualizado com sucesso!');
    }

    public function destroy(Cupom $cupom)
    {
        $cupom->delete();
        return response()->json(['success' => true]);
    }

    protected function validateData(Request $request, $origem = "create", $cupom = null)
    {

        if ($origem == "create") {
            $rules = [
                'codigo' => 'required|unique:cupons,codigo',
                'descricao' => 'nullable|string',
                'data_inicio' => 'required|date',
                'data_fim' => 'required|date|after_or_equal:data_inicio',
                'convenio_id' => 'nullable|exists:convenios,id',
                'status' => 'required|in:ATIVO,INATIVO',
                'quantidade_maxima' => 'nullable|integer|min:0',
                'criar_convenio_pagador' => 'nullable|boolean',
                'validar_matricula_ativa' => 'nullable|boolean',
                'id_plano_conta' => 'nullable|exists:plano_contas,id'
            ];
        } else {
            $rules = [
                'codigo' => 'required|unique:cupons,codigo,' . $cupom->id,
                'descricao' => 'nullable|string',
                'data_inicio' => 'required|date',
                'data_fim' => 'required|date|after_or_equal:data_inicio',
                'convenio_id' => 'nullable|exists:convenios,id',
                'status' => 'required|in:ATIVO,INATIVO',
                'quantidade_maxima' => 'nullable|integer|min:0',
                'criar_convenio_pagador' => 'nullable|boolean',
                'validar_matricula_ativa' => 'nullable|boolean',
                'id_plano_conta' => 'nullable|exists:plano_contas,id'
            ];
        }

        return $request->validate($rules);
    }




    // ------------------------ LIBERAÇÕES CURSOS -------------------------------------- //

    public function cursosData($cupomId)
    {
        $cupom = Cupom::findOrFail($cupomId);
        $data = $cupom->cursos()->with('areaConhecimento')->get()->map(function ($curso) {
            return [
                'id' => $curso->id,
                'nome' => $curso->nome,
                'area' => $curso->areaConhecimento->nome ?? '',
                'quantidade_disponivel' => $curso->pivot->quantidade_disponivel,
            ];
        });

        return response()->json(['data' => $data]);
    }

    public function adicionarCurso(Request $request, $cupomId)
    {
        $request->validate([
            'curso_ids' => 'required|array|min:1',
            'curso_ids.*' => 'exists:cursos,id',
            'quantidade_disponivel' => 'required|integer|min:0'
        ]);

        $cupom = Cupom::findOrFail($cupomId);

        $syncData = [];
        foreach ($request->curso_ids as $cursoId) {
            $syncData[$cursoId] = ['quantidade_disponivel' => $request->quantidade_disponivel];
        }
        $cupom->cursos()->syncWithoutDetaching($syncData);

        return back()->with('success', 'Cursos vinculados ao cupom!');
    }

    public function removerCurso($cupomId, $cursoId)
    {
        $cupom = Cupom::findOrFail($cupomId);
        $cupom->cursos()->detach($cursoId);

        return back()->with('success', 'Curso removido!');
    }

    public function removerTodosCursos($cupomId)
    {
        $cupom = Cupom::findOrFail($cupomId);
        $cupom->cursos()->detach();
        return back()->with('success', 'Todos os cursos foram removidos deste cupom!');
    }





    // ------------------------ LIBERAÇÕES POLOS -------------------------------------- //

    public function polosData($cupomId)
    {
        $cupom = Cupom::findOrFail($cupomId);
        $data = $cupom->polos()->get()->map(function ($polo) {
            return [
                'id' => $polo->id,
                'nome' => $polo->nome,
                'cidade' => $polo->cidade ?? '',
                'quantidade_disponivel' => $polo->pivot->quantidade_disponivel,
            ];
        });

        return response()->json(['data' => $data]);
    }

    public function adicionarPolo(Request $request, $cupomId)
    {
        $request->validate([
            'polo_ids' => 'required|array|min:1',
            'polo_ids.*' => 'exists:polos,id',
            'quantidade_disponivel' => 'required|integer|min:0'
        ]);

        $cupom = Cupom::findOrFail($cupomId);

        $syncData = [];
        foreach ($request->polo_ids as $poloId) {
            $syncData[$poloId] = ['quantidade_disponivel' => $request->quantidade_disponivel];
        }
        $cupom->polos()->syncWithoutDetaching($syncData);

        return back()->with('success', 'Polos vinculados ao cupom!');
    }

    public function removerPolo($cupomId, $poloId)
    {
        $cupom = Cupom::findOrFail($cupomId);
        $cupom->polos()->detach($poloId);

        return back()->with('success', 'Polo removido!');
    }

    public function removerTodosPolos($cupomId)
    {
        $cupom = Cupom::findOrFail($cupomId);
        $cupom->polos()->detach();
        return back()->with('success', 'Todos os polos foram removidos deste cupom!');
    }
}