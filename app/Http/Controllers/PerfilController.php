<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class PerfilController extends Controller
{
    public function index()
    {
        $perfis = Perfil::latest()->paginate(15);
        return view('perfis.index', compact('perfis'));
    }


    public function data(Request $request)
    {
        $columns = ['id', 'tipo_cadastro', 'cpf', 'name', 'email'];
        $total = Perfil::count();

        $query = Perfil::query();

        // search
        if ($search = $request->input('search.value')) {
            $query->where(function ($q) use ($search) {
                $q->where('email', 'like', "%{$search}%")
                    ->orWhere('nome', 'like', "%{$search}%")
                    ->orWhere('cpf', 'like', "%{$search}%")
                    ->orWhere('sobrenome', 'like', "%{$search}%")
                    ->orWhere('razao_social', 'like', "%{$search}%");
            });
        }
        $filtered = $query->count();

        // ordering
        if (($order = $request->input('order.0'))) {
            $col = $columns[$order['column']];
            $dir = $order['dir'];
            $query->orderBy($col, $dir);
        }

        // paging
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $perfis = $query->skip($start)->take($length)->get();

        // prepare data
        $data = $perfis->map(function ($item) {
            return [
                'id' => $item->id,
                'tipo_cadastro' => $item->tipo_cadastro == 'fisica' ? 'Física' : 'Jurídica',
                'cpf' => $item->tipo_cadastro == 'fisica' ? $item->cpf : $item->cnpj,
                'name' => $item->tipo_cadastro == 'fisica'
                    ? "{$item->nome} {$item->sobrenome}"
                    : $item->razao_social,
                'email' => $item->email,
                'actions' => view('perfis.partials.actions', compact('item'))->render(),
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
        return view('perfis.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);

        if ($data->fails()) {
            return redirect()->back()
                ->withErrors($data)
                ->withInput();
        }

        // Tratamento de upload de foto
        if ($request->hasFile('photo')) {
            $data['photo_url'] = $request->file('photo')->store('perfis', 'public');
        }

        Perfil::create($data);
        return redirect()->route('perfis.index')->with('success', 'Perfil criado com sucesso!');
    }

    public function show(Perfil $perfil)
    {
        return view('perfis.show', compact('perfil'));
    }

    public function edit(Perfil $perfil)
    {
        return view('perfis.edit', compact('perfil'));
    }

    public function update(Request $request, Perfil $perfil)
    {
        $data = $this->validateData($request, $perfil->id);

        if ($request->hasFile('photo')) {
            // Deleta foto antiga
            if ($perfil->photo_url) {
                Storage::disk('public')->delete($perfil->photo_url);
            }
            $data['photo_url'] = $request->file('photo')->store('perfis', 'public');
        }

        $perfil->update($data);
        return redirect()->route('perfis.index')->with('success', 'Perfil atualizado com sucesso!');
    }

    public function destroy(Perfil $perfil)
    {
        if ($perfil->photo_url) {
            Storage::disk('public')->delete($perfil->photo_url);
        }
        $perfil->delete();
        return redirect()->route('perfis.index')->with('success', 'Perfil removido.');
    }


    protected function validateData(Request $request, $id = null)
    {
        $dados = $request->all();

        if (isset($dados['cpf'])) {
            $dados['cpf'] = preg_replace('/[^0-9]/', '', $dados['cpf']);
        }
        if (isset($dados['cnpj'])) {
            $dados['cnpj'] = preg_replace('/[^0-9]/', '', $dados['cnpj']);
        }

        $rules = [
            'tipo_cadastro' => 'required|in:fisica,juridica',
            'email' => 'required|email|unique:perfis,email',
            'photo' => 'nullable|image|max:2048',
            'cep' => 'nullable|string',
            'logradouro' => 'nullable|string',
            'numero' => 'nullable|string',
            'complemento' => 'nullable|string',
            'bairro' => 'nullable|string',
            'cidade' => 'nullable|string',
            'uf' => 'nullable|string',
            'pais' => 'nullable|string',
            'ddi' => 'nullable|string',
            'fone' => 'nullable|string',
            'celular' => 'nullable|string',
            'fax' => 'nullable|string',
            'fone_comercial' => 'nullable|string',
            'razao_social' => 'required|string|max:255',
        ];

        if ($dados['tipo_cadastro'] === 'fisica') {
            $rules += [
                'nome' => 'required|string|max:255',
                'sobrenome' => 'required|string|max:255',
                'cpf' => 'nullable|string|unique:perfis,cpf',
                // 'data_nascimento' => 'required|date',
                'rg' => 'nullable|string',
                'orgao_expedidor' => 'nullable|string',
                'uf_expedidor' => 'nullable|string|size:2',
                'passaporte' => 'nullable|string',
                'sexo' => 'nullable|in:M,F',
                'estado_civil' => 'nullable|in:solteiro,casado,divorciado',
            ];
        }
        if ($dados['tipo_cadastro'] === 'juridica') {
            $rules += [
                'razao_social' => 'required|string|max:255',
                'nome_fantasia' => 'required|string|max:255',
                'cnpj' => 'required|string|unique:perfis,cnpj',
                'inscricao_estadual' => 'nullable|string',
                'inscricao_municipal' => 'nullable|string'
            ];
        }

        return Validator::make($dados, $rules);

    }

}
