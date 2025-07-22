<?php

namespace App\Http\Controllers;

use App\Models\RequerimentoDepartamento;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RequerimentoDepartamentoController extends Controller
{
    public function index()
    {
        return view('requerimentos_departamentos.index');
    }


    public function data(Request $request)
    {
        $query = RequerimentoDepartamento::query();

        // Filtro opcional
        if ($request->has('search') && $request->search['value']) {
            $search = $request->search['value'];
            $query->where('descricao', 'like', '%' . $search . '%');
        }

        $data = $query->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'descricao' => $item->descricao,
                'tipo' => $item->tipo,
                'status' => $item->status,
                'actions' => view('requerimentos_departamentos.partials.actions', compact('item'))->render(),
            ];
        });

        $data = $query->skip($request->start)
            ->take($request->length)
            ->get()
            ->map(fn($item) => [
                'id' => $item->id,
                'descricao' => $item->descricao,
                'tipo' => $item->tipo,
                'status' => $item->status,
                'actions' => view('requerimentos_departamentos.partials.actions', compact('item'))->render(),
            ]);



        return response()->json([
            'data' => $data,
            'recordsTotal' => $data->count(),
            'recordsFiltered' => $data->count(),
            'draw' => intval(request('draw')),
        ]);
    }

    public function create()
    {
        return view('requerimentos_departamentos.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'descricao' => 'required|string|max:255',
            'status' => 'required|string',
            'tipo' => 'required|string',
        ]);
        $data['id_estrutura'] = session('id_estrutura');

        RequerimentoDepartamento::create($data);

        return redirect()->route('requerimentos_departamentos.index')
            ->with('success', 'Departamento cadastrado com sucesso!');
    }

    public function show(RequerimentoDepartamento $requerimento_departamento)
    {
        return view('requerimentos_departamentos.show', compact('requerimento_departamento'));
    }

    public function edit(RequerimentoDepartamento $requerimento_departamento)
    {
        return view('requerimentos_departamentos.edit', compact('requerimento_departamento'));
    }

    public function update(Request $request, RequerimentoDepartamento $requerimento_departamento)
    {
        $data = $request->validate([
            'descricao' => 'required|string|max:255',
            'status' => 'required|string',
            'tipo' => 'required|string',
        ]);
        $data['id_estrutura'] = session('id_estrutura');

        $requerimento_departamento->update($data);

        return redirect()->route('requerimentos_departamentos.index')
            ->with('success', 'Departamento atualizado com sucesso!');
    }

    public function destroy(RequerimentoDepartamento $requerimento_departamento)
    {
        $requerimento_departamento->delete();

        return response()->json(['success' => true]);
    }

}
