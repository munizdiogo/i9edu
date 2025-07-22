<?php
namespace App\Http\Controllers;

use App\Models\Modulo;
use Illuminate\Http\Request;

class ModuloController extends Controller
{
    public function index()
    {
        return view('modulos.index');
    }

    public function data(Request $request)
    {
        $cols = ['id', 'codigo', 'descricao', 'status'];
        $query = Modulo::with('proxModulo');
        $total = $query->count();

        if ($search = $request->input('search.value')) {
            $query->where('codigo', 'like', "%{$search}%")
                ->orWhere('descricao', 'like', "%{$search}%");
        }
        $filtered = $query->count();

        if ($order = $request->input('order.0')) {
            $col = $cols[$order['column']];
            $query->orderBy($col, $order['dir']);
        }

        $data = $query->skip($request->start)
            ->take($request->length)
            ->get()
            ->map(fn($item) => [
                'id' => $item->id,
                'codigo' => $item->codigo,
                'descricao' => $item->descricao,
                'status' => $item->status,
                'prox' => $item->proxModulo->descricao ?? '',
                'actions' => view('modulos.partials.actions', compact('item'))->render(),
            ]);

        return response()->json([
            'draw' => intval($request->draw),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $data,
        ]);
    }

    public function create()
    {
        $proximos = Modulo::pluck('descricao', 'id');
        return view('modulos.create', compact('proximos'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request, "create");
        $data['id_estrutura'] = session('id_estrutura');
        Modulo::create($data);
        return redirect()->route('modulos.index')->with('success', 'Módulo criado!');
    }

    public function show(Modulo $modulo)
    {
        $proximos = Modulo::pluck('descricao', 'id');
        return view('modulos.show', compact('modulo', 'proximos'));
    }

    public function edit(Modulo $modulo)
    {
        $proximos = Modulo::pluck('descricao', 'id');
        return view('modulos.edit', compact('modulo', 'proximos'));
    }

    public function update(Request $request, Modulo $modulo)
    {
        $data = $this->validateData($request, "update", $modulo);
        $data['id_estrutura'] = session('id_estrutura');
        $modulo->update($data);
        return redirect()->route('modulos.index')->with('success', 'Módulo atualizado!');
    }

    public function destroy(Modulo $modulo)
    {
        $modulo->delete();
        return redirect()->route('modulos.index')->with('success', 'Módulo removido!');
    }

    protected function validateData(Request $request, $origem = "create", $modulo = null)
    {
        if ($origem == 'create') {
            $rules = [
                'codigo' => 'required|unique:modulos,codigo',
                'descricao' => 'required|string',
                'nome_reduzido' => 'required|string',
                'ordem' => 'required|integer',
                'status' => 'required|in:Ativo,Inativo',
                'prox_id_modulo' => 'nullable|exists:modulos,id',
            ];

        } else {
            $rules = [
                'codigo' => 'required|unique:modulos,codigo,' . $modulo->id,
                'descricao' => 'required|string',
                'nome_reduzido' => 'required|string',
                'ordem' => 'required|integer',
                'status' => 'required|in:Ativo,Inativo',
                'prox_id_modulo' => 'nullable|exists:modulos,id',
            ];

        }

        return $request->validate($rules);
    }
}