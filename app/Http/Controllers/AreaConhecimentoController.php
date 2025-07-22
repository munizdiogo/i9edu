<?php
namespace App\Http\Controllers;

use App\Models\AreaConhecimento;
use Illuminate\Http\Request;

class AreaConhecimentoController extends Controller
{
    public function index()
    {
        return view('area_conhecimentos.index');
    }

    public function data(Request $request)
    {
        $columns = ['id', 'codigo', 'descricao', 'status'];
        $query = AreaConhecimento::query();

        $totalRecords = $query->count();

        if ($search = $request->input('search.value')) {
            $query->where('codigo', 'like', "%{$search}%")
                ->orWhere('descricao', 'like', "%{$search}%");
        }

        $filtered = $query->count();

        if ($order = $request->input('order.0')) {
            $col = $columns[$order['column']];
            $dir = $order['dir'];
            $query->orderBy($col, $dir);
        }

        $data = $query->skip($request->start)
            ->take($request->length)
            ->get()
            ->map(fn($item) => [
                'id' => $item->id,
                'codigo' => $item->codigo,
                'descricao' => $item->descricao,
                'status' => $item->status,
                'actions' => view('area_conhecimentos.partials.actions', compact('item'))->render(),
            ]);

        return response()->json([
            'draw' => intval($request->draw),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $filtered,
            'data' => $data,
        ]);
    }

    public function create()
    {
        return view('area_conhecimentos.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'codigo' => 'required|unique:area_conhecimentos,codigo',
            'descricao' => 'required|string',
            'status' => 'required|in:Ativo,Inativo',
        ]);
        $data['id_estrutura'] = session('id_estrutura');
        AreaConhecimento::create($data);
        return redirect()->route('area_conhecimentos.index')->with('success', 'Área criada!');
    }

    public function show(AreaConhecimento $area_conhecimento)
    {
        return view('area_conhecimentos.show', compact('area_conhecimento'));
    }

    public function edit(AreaConhecimento $area_conhecimento)
    {
        return view('area_conhecimentos.edit', compact('area_conhecimento'));
    }

    public function update(Request $request, AreaConhecimento $area_conhecimento)
    {
        $data = $request->validate([
            'codigo' => 'required|unique:area_conhecimentos,codigo,' . $area_conhecimento->id,
            'descricao' => 'required|string',
            'status' => 'required|in:Ativo,Inativo',
        ]);
        $data['id_estrutura'] = session('id_estrutura');
        $area_conhecimento->update($data);
        return redirect()->route('area_conhecimentos.index')->with('success', 'Área atualizada!');
    }

    public function destroy(AreaConhecimento $area_conhecimento)
    {
        $area_conhecimento->delete();
        return redirect()->route('area_conhecimentos.index')->with('success', 'Área removida!');
    }
}