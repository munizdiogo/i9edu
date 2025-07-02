<?php

namespace App\Http\Controllers;

use App\Models\RequerimentoStatus;
use Illuminate\Http\Request;

class RequerimentoStatusController extends Controller
{
    public function index()
    {
        return view('requerimentos_status.index');
    }

    public function create()
    {
        return view('requerimentos_status.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'descricao' => 'required|string|max:255',
            // 'cor' => 'nullable|string|max:20',
            // 'status' => 'required|in:Ativo,Inativo',
        ]);


        RequerimentoStatus::create($request->all());

        return redirect()->route('requerimentos-status.index')->with('success', 'Status cadastrado com sucesso.');
    }

    public function edit($id)
    {
        $requerimento_status = RequerimentoStatus::findOrFail($id);
        return view('requerimentos_status.edit', compact('requerimento_status'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'descricao' => 'required|string|max:255',
            'cor' => 'nullable|string|max:20',
            'status' => 'required|in:Ativo,Inativo',
        ]);

        $statusModel = RequerimentoStatus::findOrFail($id);
        $statusModel->update($request->all());

        return redirect()->route('requerimentos-status.index')->with('success', 'Status atualizado com sucesso.');
    }

    public function destroy($id)
    {
        RequerimentoStatus::destroy($id);
        return response()->json(['success' => true]);
    }

    public function data(Request $request)
    {
        $query = RequerimentoStatus::query();

        if ($request->has('search') && $request->search['value']) {
            $search = $request->search['value'];
            $query->where(function ($q) use ($search) {
                $q->where('descricao', 'like', "%$search%")
                    ->orWhere('status', 'like', "%$search%");
            });
        }

        $dados = $query->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'descricao' => $item->descricao,
                'status' => $item->status,
                'cor' => $item->cor,
                'acoes' => view('requerimentos_status.partials.actions', compact('item'))->render(),
            ];
        });

        return response()->json(['data' => $dados]);
    }
}
