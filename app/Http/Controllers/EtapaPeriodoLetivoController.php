<?php
namespace App\Http\Controllers;

use App\Models\EtapaPeriodoLetivo;
use App\Models\PeriodoLetivo;
use Illuminate\Http\Request;

class EtapaPeriodoLetivoController extends Controller
{
    public function index()
    {
        return view('etapas_periodos_letivos.index');
    }

    public function data(Request $request)
    {
        $query = EtapaPeriodoLetivo::with('periodoLetivo');
        $total = $query->count();

        if ($search = $request->input('search.value')) {
            $query->where('codigo', 'like', "%{$search}%")
                ->orWhere('descricao', 'like', "%{$search}%");
        }
        $filtered = $query->count();

        if ($order = $request->input('order.0')) {
            $cols = ['id', 'codigo', 'descricao', 'status'];
            $query->orderBy($cols[$order['column']], $order['dir']);
        }

        $data = $query
            ->skip($request->start)
            ->take($request->length)
            ->get()
            ->map(fn($item) => [
                'id' => $item->id,
                'codigo' => $item->codigo,
                'descricao' => $item->descricao,
                'status' => $item->status,
                'periodo' => $item->periodoLetivo->descricao,
                'actions' => view('etapas_periodos_letivos.partials.actions', compact('item'))->render(),
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
        $periodos = PeriodoLetivo::pluck('descricao', 'id');
        return view('etapas_periodos_letivos.create', compact('periodos'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request, "create");
        $data['id_estrutura'] = session('id_estrutura');
        EtapaPeriodoLetivo::create($data);
        return redirect()->route('etapas_periodos_letivos.index')
            ->with('success', 'Etapa criada!');
    }

    public function show(EtapaPeriodoLetivo $etapas_periodos_letivo)
    {
        $periodos = PeriodoLetivo::pluck('descricao', 'id');
        return view('etapas_periodos_letivos.show', compact('etapas_periodos_letivo', 'periodos'));
    }

    public function edit(EtapaPeriodoLetivo $etapas_periodos_letivo)
    {
        $periodos = PeriodoLetivo::pluck('descricao', 'id');
        return view('etapas_periodos_letivos.edit', compact('etapas_periodos_letivo', 'periodos'));
    }

    public function update(Request $request, EtapaPeriodoLetivo $etapas_periodos_letivo)
    {
        $data = $this->validateData($request, "update", $etapas_periodos_letivo);
        $data['id_estrutura'] = session('id_estrutura');
        $etapas_periodos_letivo->update($data);
        return redirect()->route('etapas_periodos_letivos.index')
            ->with('success', 'Etapa atualizada!');
    }

    public function destroy(EtapaPeriodoLetivo $etapas_periodos_letivo)
    {
        $etapas_periodos_letivo->delete();
        return redirect()->route('etapas_periodos_letivos.index')
            ->with('success', 'Etapa removida!');
    }


    protected function validateData(Request $request, $origem = "create", $etapas_periodos_letivo = null)
    {
        if ($origem == 'create') {
            $rules = [
                'codigo' => 'required|unique:etapas_periodos_letivos,codigo',
                'descricao' => 'required|string',
                'status' => 'required|in:Ativo,Inativo',
                'periodo_letivo_id' => 'required|exists:periodos_letivos,id',
            ];

        } else {
            $rules = [
                'codigo' => 'required|unique:etapas_periodos_letivos,codigo,' . $etapas_periodos_letivo->id,
                'descricao' => 'required|string',
                'status' => 'required|in:Ativo,Inativo',
                'periodo_letivo_id' => 'required|exists:periodos_letivos,id',
            ];

        }

        return $request->validate($rules);
    }
}