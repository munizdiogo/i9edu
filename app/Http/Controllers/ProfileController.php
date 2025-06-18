<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::latest()->paginate(15);
        return view('profiles.index', compact('profiles'));
    }

    public function create()
    {
        return view('profiles.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);

        // Tratamento de upload de foto
        if ($request->hasFile('photo')) {
            $data['photo_url'] = $request->file('photo')->store('profiles', 'public');
        }

        Profile::create($data);
        return redirect()->route('profiles.index')->with('success', 'Perfil criado com sucesso!');
    }

    public function show(Profile $profile)
    {
        return view('profiles.show', compact('profile'));
    }

    public function edit(Profile $profile)
    {
        return view('profiles.edit', compact('profile'));
    }

    public function update(Request $request, Profile $profile)
    {
        $data = $this->validateData($request, $profile->id);

        if ($request->hasFile('photo')) {
            // Deleta foto antiga
            if ($profile->photo_url) {
                Storage::disk('public')->delete($profile->photo_url);
            }
            $data['photo_url'] = $request->file('photo')->store('profiles', 'public');
        }

        $profile->update($data);
        return redirect()->route('profiles.index')->with('success', 'Perfil atualizado com sucesso!');
    }

    public function destroy(Profile $profile)
    {
        if ($profile->photo_url) {
            Storage::disk('public')->delete($profile->photo_url);
        }
        $profile->delete();
        return redirect()->route('profiles.index')->with('success', 'Perfil removido.');
    }

    protected function validateData(Request $request, $id = null)
    {
        $uniqueEmail = 'unique:profiles,email' . ($id ? ",$id" : '');
        $rules = [
            'type' => 'required|in:fisica,juridica',
            'email' => "required|email|$uniqueEmail",
            // 'profile_role' => 'required|in:aluno,docente,tecnico,parceiro,outro',
            'photo' => 'nullable|image|max:2048',
            'logradouro' => 'nullable|string',
            'numero' => 'nullable|string',
            'cep' => 'nullable|string',
            'cidade' => 'nullable|string',
            'bairro' => 'nullable|string',
            'complemento' => 'nullable|string',
            'ddi' => 'nullable|string',
            'fone' => 'nullable|string',
            'celular' => 'nullable|string',
            'fax' => 'nullable|string',
            'fone_comercial' => 'nullable|string',
        ];

        if ($request->type === 'fisica') {
            $uniqueCpf = 'unique:profiles,cpf' . ($id ? ",$id" : '');
            $rules += [
                'nome' => 'required|string|max:255',
                'sobrenome' => 'required|string|max:255',
                'cpf' => "required|string|size:11|$uniqueCpf",
                // 'data_nascimento' => 'required|date',
                'rg' => 'nullable|string',
                'orgao_expedidor' => 'nullable|string',
                'uf_expedidor' => 'nullable|string|size:2',
                'passaporte' => 'nullable|string',
                'sexo' => 'nullable|in:M,F',
                'estado_civil' => 'nullable|in:solteiro,casado,divorciado',
            ];
        } else {
            $uniqueCnpj = 'unique:profiles,cnpj' . ($id ? ",$id" : '');
            $rules += [
                'razao_social' => 'required|string|max:255',
                'nome_fantasia' => 'required|string|max:255',
                'cnpj' => "required|string|size:14|$uniqueCnpj",
                'inscricao_estadual' => 'nullable|string',
                'inscricao_municipal' => 'nullable|string',
            ];
        }


        return $request->validate($rules);
    }
}
