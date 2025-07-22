<?php


namespace App\Http\Controllers;

use App\Models\Estrutura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EstruturaController extends Controller
{
    public function index()
    {
        $estruturas = Estrutura::orderBy('descricao')->paginate(15);
        return view('estruturas.index', compact('estruturas'));
    }

    public function create()
    {
        return view('estruturas.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request, "create");
        Estrutura::create($data);
        return redirect()->route('estruturas.index')->with('success', 'Estrutura criada com sucesso!');
    }

    public function edit(Estrutura $estrutura)
    {
        return view('estruturas.edit', compact('estrutura'));
    }

    public function update(Request $request, Estrutura $estrutura)
    {
        $data = $this->validateData($request, "update");
        $estrutura->update($data);
        return redirect()->route('estruturas.index')->with('success', 'Estrutura atualizada com sucesso!');
    }

    public function destroy(Estrutura $estrutura)
    {
        $estrutura->delete();
        return redirect()->route('estruturas.index')->with('success', 'Estrutura removida com sucesso!');
    }

    // Selecionar estrutura ativa (opcional)
    public function selecionar(Request $request)
    {
        $estrutura = Estrutura::find($request->id_estrutura);
        $request->validate(['id_estrutura' => 'required|exists:estruturas,id']);
        Session::put('id_estrutura', $request->id_estrutura);
        Session::put('estrutura_descricao', $estrutura->descricao);
        return redirect()->back()->with('success', 'Estrutura selecionada!');
    }

    protected function validateData(Request $request, $origem = "create", $etapas_periodos_letivo = null)
    {
        if ($origem == 'create') {
            $rules = [
                'descricao' => 'required|string|max:255',
                'nome_fantasia' => 'required|string|max:255',
                'nome_comercial' => 'required|string|max:255',
                'nome_complementar' => 'nullable|string|max:255',
                'nome_reduzido' => 'nullable|string|max:255',
                'nome_portal_diplomados' => 'nullable|string|max:255',
                'cnpj' => 'required|string|max:25',
                'inscricao_estadual' => 'nullable|string|max:30',
                'inscricao_municipal' => 'nullable|string|max:30',
                'telefone' => 'nullable|string|max:30',
                'status' => 'required|in:Ativo,Inativo',
                'modelo_negocio' => 'nullable|string|max:255',
            ];

        } else {
            $rules = [
                'descricao' => 'required|string|max:255',
                'nome_fantasia' => 'required|string|max:255',
                'nome_comercial' => 'required|string|max:255',
                'nome_complementar' => 'nullable|string|max:255',
                'nome_reduzido' => 'nullable|string|max:255',
                'nome_portal_diplomados' => 'nullable|string|max:255',
                'cnpj' => 'required|string|max:25',
                'inscricao_estadual' => 'nullable|string|max:30',
                'inscricao_municipal' => 'nullable|string|max:30',
                'telefone' => 'nullable|string|max:30',
                'status' => 'required|in:Ativo,Inativo',
                'modelo_negocio' => 'nullable|string|max:255',
            ];

        }

        return $request->validate($rules);
    }
}