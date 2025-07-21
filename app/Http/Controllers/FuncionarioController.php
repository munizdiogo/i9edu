<?php
namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Perfil;
use App\Models\Setor;
use App\Models\Funcao;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function index()
    {
        return view('funcionarios.index');
    }

    public function data(Request $request)
    {
        $query = Funcionario::with(['perfil', 'setor', 'funcao']);
        $total = $query->count();

        if ($search = $request->input('search.value')) {
            $query->where('codigo', $search)
                ->orWhereHas('perfil', fn($q) => $q->where('nome_civil', 'like', "%{$search}%"));
        }
        $filtered = $query->count();

        $data = $query->skip($request->start)
            ->take($request->length)
            ->get()
            ->map(fn($item) => [
                'id' => $item->id,
                'codigo' => $item->codigo,
                'perfil' => $item->perfil->nome ?? '',
                'email_empresa' => $item->email_empresa,
                'status' => $item->status,
                'setor' => $item->setor->descricao ?? '',
                'funcao' => $item->funcao->descricao ?? '',
                'actions' => view('funcionarios.partials.actions', compact('item'))->render(),
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
        $perfis = Perfil::pluck('nome', 'id');
        $setores = Setor::pluck('descricao', 'id');
        $funcoes = Funcao::pluck('descricao', 'id');
        return view('funcionarios.create', compact('perfis', 'setores', 'funcoes'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request, "create");
        $data['id_estrutura'] = session('estrutura_id');

        Funcionario::create($data);
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário criado!');
    }

    public function show(Funcionario $funcionario)
    {
        $perfis = Perfil::pluck('nome', 'id');
        $setores = Setor::pluck('descricao', 'id');
        $funcoes = Funcao::pluck('descricao', 'id');
        return view('funcionarios.show', compact('funcionario', 'perfis', 'setores', 'funcoes'));
    }

    public function edit(Funcionario $funcionario)
    {
        $perfis = Perfil::pluck('nome', 'id');
        $setores = Setor::pluck('descricao', 'id');
        $funcoes = Funcao::pluck('descricao', 'id');
        return view('funcionarios.edit', compact('funcionario', 'perfis', 'setores', 'funcoes'));
    }

    public function update(Request $request, Funcionario $funcionario)
    {
        $data = $this->validateData($request, "update", $funcionario);
        $data['id_estrutura'] = session('estrutura_id');

        $funcionario->update($data);
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário atualizado!');
    }

    public function destroy(Funcionario $funcionario)
    {
        $funcionario->delete();
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário removido!');
    }


    protected function validateData(Request $request, $origem = "create", $funcionario = null)
    {
        if ($origem == 'create') {
            $rules = [
                'codigo' => 'required|integer|unique:funcionarios,codigo',
                'id_perfil' => 'required|exists:perfis,id',
                'nome_conjuge' => 'nullable|string',
                'fone_conjuge' => 'nullable|string',
                'nr_dependentes' => 'nullable|integer',
                'email_empresa' => 'nullable|email',
                'senha_email' => 'nullable|string',
                'status' => 'required|in:Ativo,Inativo',
                'data_admissao' => 'nullable|date',
                'data_demissao' => 'nullable|date|after_or_equal:data_admissao',
                'setor_id' => 'nullable|exists:setores,id',
                'funcao_id' => 'nullable|exists:funcoes,id',
                'nr_folha' => 'nullable|string',
                'nr_horas_mes' => 'nullable|integer',
                'tipo_contrato' => 'required|in:Não informado,CLT,PJ,Autônomo',
            ];

        } else {
            $rules = [
                'codigo' => 'required|integer|unique:funcionarios,codigo,' . $funcionario->id,
                'id_perfil' => 'required|exists:perfis,id',
                'nome_conjuge' => 'nullable|string',
                'fone_conjuge' => 'nullable|string',
                'nr_dependentes' => 'nullable|integer',
                'email_empresa' => 'nullable|email',
                'senha_email' => 'nullable|string',
                'status' => 'required|in:Ativo,Inativo',
                'data_admissao' => 'nullable|date',
                'data_demissao' => 'nullable|date|after_or_equal:data_admissao',
                'setor_id' => 'nullable|exists:setores,id',
                'funcao_id' => 'nullable|exists:funcoes,id',
                'nr_folha' => 'nullable|string',
                'nr_horas_mes' => 'nullable|integer',
                'tipo_contrato' => 'required|in:Não informado,CLT,PJ,Autônomo',
            ];

        }

        return $request->validate($rules);
    }
}