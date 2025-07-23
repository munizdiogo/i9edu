<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use App\Models\Aluno;
use App\Models\AlunoCursoAdmissao;
use App\Models\Perfil;
use Illuminate\Http\Request;

class AlunoController extends Controller
{

    public function index()
    {
        return view('alunos.index');
    }

    public function data(Request $request)
    {
        $cols = ['id', 'ra', 'nome', 'status'];
        $total = Aluno::count();
        $query = Aluno::with(['perfil', 'admissao']);

        if ($s = $request->input('search.value')) {
            $query->where('ra', 'like', "%{$s}%")
                ->orWhereHas('perfil', function ($q) use ($s) {
                    $q->where('nome', 'like', "%{$s}%");
                });
        }

        $filtered = $query->count();

        if ($order = $request->input('order.0')) {
            $col = $cols[$order['column']];
            $dir = $order['dir'];

            if ($col === 'nome') {
                $query->join('perfis', 'alunos.id_perfil', '=', 'perfis.id')
                    ->orderBy('perfis.nome', $dir);
            } else {
                $query->orderBy($col, $dir);
            }
        }

        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $page = $query->skip($start)->take($length)->get();

        $data = $page->map(function ($item) {
            return [
                'id' => $item->id,
                'ra' => $item->ra,
                'nome' => $item->perfil->nome,
                'status' => $item->status,
                'actions' => view('alunos.partials.actions', compact('item'))->render(),
            ];
        });

        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $data,
        ]);
    }

    public function create()
    {
        $perfis = Perfil::pluck('nome', 'id');
        return view('alunos.create', compact('perfis'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);

        if ($data->fails()) {
            return redirect()->back()
                ->withErrors($data)
                ->withInput();
        }
        $data = $data->getData();
        $data['id_estrutura'] = session('id_estrutura');
        dd($data);

        Aluno::create($data);
        return redirect()->route('alunos.index')
            ->with('success', 'Aluno criado!');
    }

    public function show(Aluno $aluno)
    {
        $perfis = Perfil::pluck('nome', 'id');
        $admissoes = AlunoCursoAdmissao::where('id_aluno', $aluno->id)->get();
        return view('alunos.show', compact('aluno', 'perfis', 'admissoes'));
    }

    public function edit(Aluno $aluno)
    {
        $perfis = Perfil::pluck('nome', 'id');
        // $aluno = Aluno::with(['perfil', 'admissao'])->get();
        return view('alunos.edit', compact('aluno', 'perfis'));
    }

    public function update(Request $request, Aluno $aluno)
    {
        $data = $this->validateData($request);

        if ($data->fails()) {
            return redirect()->back()
                ->withErrors($data)
                ->withInput();
        }
        $data = $data->getData();

        $data['id_estrutura'] = session('id_estrutura');

        $aluno->update($data);
        return redirect()->route('alunos.index')
            ->with('success', 'Aluno atualizado!');
    }

    public function destroy(Aluno $aluno)
    {
        $aluno->delete();
        return redirect()->route('alunos.index')
            ->with('success', 'Aluno removido.');
    }


    protected function validateData(Request $request, $id = null)
    {
        $dados = $request->all();

        $rules = [
            'id_perfil' => 'required|exists:perfis,id',
            // 'ra' => 'required|string|unique:alunos,ra',
            'ra' => 'required|string',
            'ra_est' => 'nullable|string',
            'id_inep' => 'nullable|string',
            'email_institucional' => 'nullable|email',
            'cpf' => 'nullable|string',
            'rg' => 'nullable|string',
            'orgao_expedidor' => 'nullable|string',
            'data_expedicao' => 'nullable|date',
            'data_nascimento' => 'nullable|date',
            'sexo' => 'nullable|in:Masculino,Feminino,Outro',
            'estado_civil' => 'nullable|in:Solteiro(a),Casado(a),Divorciado(a),Viúvo(a)',
            'nacionalidade' => 'nullable|string',
            'naturalidade' => 'nullable|string',
            'religiao' => 'nullable|string',
            'telefone' => 'nullable|string',
            'celular' => 'nullable|string',
            'status' => 'required|in:ATIVO,INATIVO',
        ];

        return Validator::make($dados, $rules);
    }
}
