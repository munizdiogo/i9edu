<?php
namespace App\Http\Controllers;

use App\Models\Setor;
use App\Models\Funcionario as Funcionarios;
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
            ->map(fn($item) => [
                'id' => $item->id,
                'codigo' => $item->codigo,
                'descricao' => $item->descricao,
                'tipo' => $item->tipo,
                'responsavel' => $item->responsavel->nome ?? "",
                'status' => $item->status,
                'actions' => view('setores.partials.actions', compact('item'))->render(),
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
        $funcionarios = Funcionarios::with('perfil')->get()->pluck('perfil.nome', 'id');
        $tipos = ['NENHUM', 'ADMINISTRATIVO', 'ACADEMICO', 'FINANCEIRO', 'TI', 'OUTRO'];
        return view('setores.create', compact('funcionarios', 'tipos'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request, "create");
        $data['id_estrutura'] = session('id_estrutura');

        Setor::create($data);
        return redirect()->route('setores.index')->with('success', 'Setor criado!');
    }

    public function show(Setor $setor)
    {
        $funcionarios = Funcionarios::with('perfil')->get()->pluck('perfil.nome', 'id');
        $tipos = ['NENHUM', 'ADMINISTRATIVO', 'ACADEMICO', 'FINANCEIRO', 'TI', 'OUTRO'];
        return view('setores.show', compact('setor', 'funcionarios', 'tipos'));
    }

    public function edit(Setor $setor)
    {
        $funcionarios = Funcionarios::with('perfil')->get()->pluck('perfil.nome', 'id');
        $tipos = ['NENHUM', 'ADMINISTRATIVO', 'ACADEMICO', 'FINANCEIRO', 'TI', 'OUTRO'];
        return view('setores.edit', compact('setor', 'funcionarios', 'tipos'));
    }



    public function update(Request $request, Setor $setor)
    {
        $data = $this->validateData($request, "update", $setor);
        $data['id_estrutura'] = session('id_estrutura');

        $setor->update($data);
        return redirect()->route('setores.index')->with('success', 'Setor atualizado!');
    }

    public function destroy(Setor $setor)
    {
        $setor->delete();
        return redirect()->route('setores.index')->with('success', 'Setor removido!');
    }


    protected function validateData(Request $request, $origem = "create", $setor = null)
    {
        if ($origem == 'create') {
            $rules = [
                'codigo' => 'required|integer|unique:setores,codigo',
                'descricao' => 'required|string',
                'tipo' => 'required|in:NENHUM,ADMINISTRATIVO,ACADEMICO,FINANCEIRO,TI,OUTRO',
                'email' => 'nullable|email',
                'id_funcionario_responsavel' => 'nullable|exists:funcionarios,id',
                'status' => 'required|in:ATIVO,INATIVO',
            ];

        } else {
            $rules = [
                'codigo' => 'required|integer|unique:setores,codigo,' . $setor->id,
                'descricao' => 'required|string',
                'tipo' => 'required|in:NENHUM,ADMINISTRATIVO,ACADEMICO,FINANCEIRO,TI,OUTRO',
                'email' => 'nullable|email',
                'id_funcionario_responsavel' => 'nullable|exists:funcionarios,id',
                'status' => 'required|in:ATIVO,INATIVO'
            ];

        }

        return $request->validate($rules);
    }
}