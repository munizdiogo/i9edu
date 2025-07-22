<?php

namespace App\Http\Controllers;

use App\Models\Polo;
use App\Models\Perfil;
use Illuminate\Http\Request;

class PoloController extends Controller
{
    public function index()
    {
        $polos = Polo::all();
        return view('polos.index', compact('polos'));
    }

    public function data(Request $request)
    {
        $columns = ['id', 'nome', 'cidade', 'status'];
        $total = Polo::count();

        $query = Polo::query();

        // filtro global
        if ($search = $request->input('search.value')) {
            $query->where(function ($q) use ($search) {
                $q->where('nome', 'like', "%{$search}%")
                    ->orWhere('cidade', 'like', "%{$search}%");
            });
        }
        $filtered = $query->count();

        // ordenação
        if ($order = $request->input('order.0')) {
            $col = $columns[$order['column']];
            $dir = $order['dir'];
            $query->orderBy($col, $dir);
        }

        // paginação
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $pageData = $query->skip($start)->take($length)->get();

        // monta JSON
        $data = $pageData->map(function ($item) {
            return [
                'id' => $item->id,
                'nome' => $item->nome,
                'cidade' => $item->cidade,
                'status' => $item->status,
                'actions' => view('polos.partials.actions', ['item' => $item])->render(),
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
        $perfis = Perfil::all();
        return view('polos.create', compact('perfis'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data['id_estrutura'] = session('id_estrutura');
        Polo::create($data);
        return redirect()->route('polos.index')->with('success', 'Polo criado com sucesso!');
    }

    public function show(Polo $polo)
    {
        $perfis = Perfil::all();
        return view('polos.show', compact('polo', 'perfis'));
    }

    public function edit(Polo $polo)
    {
        $perfis = Perfil::all();
        return view('polos.edit', compact('polo', 'perfis'));
    }

    public function update(Request $request, Polo $polo)
    {
        $data = $this->validateData($request);
        $data['id_estrutura'] = session('id_estrutura');
        $polo->update($data);
        return redirect()->route('polos.index')->with('success', 'Polo atualizado com sucesso!');
    }

    public function destroy(Polo $polo)
    {
        $polo->delete();
        return redirect()->route('polos.index')->with('success', 'Polo removido.');
    }


    protected function validateData(Request $request, $id = null)
    {
        $rules = [
            'nome' => 'required|string|max:255',
            'nome_impressao' => 'nullable|string|max:255',
            'email' => 'nullable|email',
            'cidade' => 'nullable|string',
            'logradouro' => 'nullable|string',
            'bairro' => 'nullable|string',
            'complemento' => 'nullable|string',
            'link_maps' => 'nullable|url',
            'sigla' => 'nullable|string|max:20',
            'cnpj' => 'nullable|string|max:18',
            'codigo_inep' => 'nullable|string|max:20',
            'numero' => 'nullable|string|max:10',
            'cep' => 'nullable|string|max:10',
            'fones' => 'nullable|string',
            'status' => 'required|in:ATIVO,INATIVO',
            'tipo_unidade' => 'required|in:Campus,Polo',
            'tipo_contrato' => 'required|in:Exclusivo,Compartilhado',
            'perc_comissao' => 'nullable|numeric',
            'nao_apresentar_atendimento' => 'boolean',
            'data_ativacao' => 'nullable|date',
            'data_inativacao' => 'nullable|date',
            'id_gestor' => 'nullable|exists:perfis,id',
            'id_gestor_faturamento' => 'nullable|exists:perfis,id',
            'id_supervisor' => 'nullable|exists:perfis,id',
            'data_contrato_inicio' => 'nullable|date',
            'data_contrato_termino' => 'nullable|date',
        ];


        return $request->validate($rules);
    }




}