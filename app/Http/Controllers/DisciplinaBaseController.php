<?php
namespace App\Http\Controllers;

use App\Models\DisciplinaBase;
use App\Models\AreaConhecimento;
use Illuminate\Http\Request;

class DisciplinaBaseController extends Controller
{
    public function index()
    {
        return view('disciplinas_base.index');
    }

    public function data(Request $request)
    {
        $columns = ['id', 'codigo', 'nome', 'status'];
        $query = DisciplinaBase::query();
        $totalRecords = $query->count();

        if ($search = $request->input('search.value')) {
            $query->where('codigo', 'like', "%{$search}%")
                ->orWhere('nome', 'like', "%{$search}%");
        }
        $filtered = $query->count();

        if ($order = $request->input('order.0')) {
            $col = $columns[$order['column']];
            $dir = $order['dir'];
            $query->orderBy($col, $dir);
        }

        $data = $query
            ->skip($request->start)
            ->take($request->length)
            ->get()
            ->map(fn($item) => [
                'id' => $item->id,
                'codigo' => $item->codigo,
                'nome' => $item->nome,
                'status' => $item->status,
                'actions' => view('disciplinas_base.partials.actions', compact('item'))->render(),
            ]);

        return response()->json([
            'draw' => intval($request->draw),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $filtered,
            'data' => $data
        ]);
    }

    public function create()
    {
        $areas = AreaConhecimento::pluck('descricao', 'id');
        return view('disciplinas_base.create', compact('areas'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request, "create");
        $data['id_estrutura'] = session('id_estrutura');
        DisciplinaBase::create($data);
        return redirect()->route('disciplinas_base.index')
            ->with('success', 'Disciplina Base criada!');
    }

    public function show(DisciplinaBase $disciplinas_base)
    {
        $areas = AreaConhecimento::pluck('descricao', 'id');
        return view('disciplinas_base.show', compact('disciplinas_base', 'areas'));
    }

    public function edit(DisciplinaBase $disciplinas_base)
    {
        $areas = AreaConhecimento::pluck('descricao', 'id');
        return view('disciplinas_base.edit', compact('disciplinas_base', 'areas'));
    }

    public function update(Request $request, DisciplinaBase $disciplinas_base)
    {
        $data = $this->validateData($request, "update", $disciplinas_base);
        $data['id_estrutura'] = session('id_estrutura');
        $disciplinas_base->update($data);
        return redirect()->route('disciplinas_base.index')
            ->with('success', 'Disciplina Base atualizada!');
    }

    public function destroy(DisciplinaBase $disciplinas_base)
    {
        $disciplinas_base->delete();
        return redirect()->route('disciplinas_base.index')
            ->with('success', 'Disciplina Base removida.');
    }


    protected function validateData(Request $request, $origem = "create", $disciplinas_base = null)
    {
        if ($origem == 'create') {
            $rules = [
                'codigo' => 'required|unique:disciplinas_base,codigo',
                'status' => 'required|in:Ativo,Inativo',
                'nome' => 'required|string',
                'nome_reduzido' => 'nullable|string',
                'id_area_conhecimento' => 'nullable|exists:area_conhecimentos,id',
                'equivalencia_automatica' => 'boolean',
                'ch_padrao' => 'integer',
                'ch_cobrada' => 'integer',
                'ch_teorica' => 'integer',
                'ch_corrida' => 'numeric',
                'ch_extensao' => 'integer',
                'ch_presencial' => 'integer',
                'ch_ead' => 'integer',
                'ch_pratica' => 'integer',
                'creditos' => 'numeric',
                'qtd_aulas' => 'integer',
                'avaliacao' => 'in:Por Nota,Conceito',
                'tipo_avaliacao' => 'required|string',
                'obrigatoriedade' => 'in:Obrigatória,Optativa',
                'complementaridade' => 'in:Não Informado,Sim,Não',
                'area_avaliacao_id' => 'nullable|exists:area_conhecimentos,id',
            ];

        } else {
            $rules = [
                'codigo' => 'required|unique:disciplinas_base,codigo,' . $disciplinas_base->id,
                'status' => 'required|in:Ativo,Inativo',
                'nome' => 'required|string',
                'nome_reduzido' => 'nullable|string',
                'id_area_conhecimento' => 'nullable|exists:area_conhecimentos,id',
                'equivalencia_automatica' => 'boolean',
                'ch_padrao' => 'integer',
                'ch_cobrada' => 'integer',
                'ch_teorica' => 'integer',
                'ch_corrida' => 'numeric',
                'ch_extensao' => 'integer',
                'ch_presencial' => 'integer',
                'ch_ead' => 'integer',
                'ch_pratica' => 'integer',
                'creditos' => 'numeric',
                'qtd_aulas' => 'integer',
                'avaliacao' => 'in:Por Nota,Conceito',
                'tipo_avaliacao' => 'required|string',
                'obrigatoriedade' => 'in:Obrigatória,Optativa',
                'complementaridade' => 'in:Não Informado,Sim,Não',
                'area_avaliacao_id' => 'nullable|exists:area_conhecimentos,id',
            ];

        }

        return $request->validate($rules);
    }
}