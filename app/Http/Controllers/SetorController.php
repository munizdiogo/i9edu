<?php
namespace App\Http\Controllers;

use App\Models\Setor;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class SetorController extends Controller
{
    public function index()
    {
        return view('setores.index');
    }

    public function data(Request $request)
    {
        $query = Setor::with('responsavel');
        $total = $query->count();

        if ($search = $request->input('search.value')) {
            $query->where('descricao', 'like', "%{$search}%")
                ->orWhere('codigo', $search);
        }

        $filtered = $query->count();

        $data = $query->skip($request->start)
            ->take($request->length)
            ->get()
            ->map(fn($s) => [
                'id' => $s->id,
                'codigo' => $s->codigo,
                'descricao' => $s->descricao,
                'tipo' => $s->tipo,
                'responsavel' => $s->responsavel->nome ?? "",
                'status' => $s->status,
                'actions' => view('setores.partials.actions', compact('s'))->render(),
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
        $funcionarios = Funcionario::pluck('nome', 'id');
        $tipos = ['NENHUM', 'ADMINISTRATIVO', 'ACADEMICO', 'FINANCEIRO', 'TI', 'OUTRO'];
        return view('setores.create', compact('funcionarios', 'tipos'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'codigo' => 'required|integer|unique:setores,codigo',
            'descricao' => 'required|string',
            'tipo' => 'required|in:NENHUM,ADMINISTRATIVO,ACADEMICO,FINANCEIRO,TI,OUTRO',
            'email' => 'nullable|email',
            'funcionario_responsavel_id' => 'nullable|exists:funcionarios,id',
            'status' => 'required|in:ATIVO,INATIVO',
        ]);

        Setor::create($data);
        return redirect()->route('setores.index')->with('success', 'Setor criado!');
    }

    public function edit(Setor $setor)
    {
        $funcionarios = Funcionario::pluck('nome', 'id');
        $tipos = ['NENHUM', 'ADMINISTRATIVO', 'ACADEMICO', 'FINANCEIRO', 'TI', 'OUTRO'];
        return view('setores.edit', compact('setor', 'funcionarios', 'tipos'));
    }

    public function update(Request $request, Setor $setor)
    {
        $data = $request->validate([
            'codigo' => 'required|integer|unique:setores,codigo,' . $setor->id,
            'descricao' => 'required|string',
            'tipo' => 'required|in:NENHUM,ADMINISTRATIVO,ACADEMICO,FINANCEIRO,TI,OUTRO',
            'email' => 'nullable|email',
            'funcionario_responsavel_id' => 'nullable|exists:funcionarios,id',
            'status' => 'required|in:ATIVO,INATIVO',
        ]);

        $setor->update($data);
        return redirect()->route('setores.index')->with('success', 'Setor atualizado!');
    }

    public function destroy(Setor $setor)
    {
        $setor->delete();
        return redirect()->route('setores.index')->with('success', 'Setor removido!');
    }
}