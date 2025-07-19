<?php

namespace App\Http\Controllers;

use App\Models\PeriodoLetivo;
use Illuminate\Http\Request;

class PeriodoLetivoController extends Controller
{
    public function index()
    {
        return view('periodos.index');
    }

    public function data(Request $request)
    {
        $columns = ['id', 'descricao', 'data_inicio', 'data_termino', 'ano', 'situacao'];
        $total = PeriodoLetivo::count();
        $query = PeriodoLetivo::query();

        if ($search = $request->input('search.value')) {
            $query->where('descricao', 'like', "%{$search}%")
                ->orWhere('nome_impressao', 'like', "%{$search}%");
        }

        $filtered = $query->count();

        if ($order = $request->input('order.0')) {
            $col = $columns[$order['column']];
            $dir = $order['dir'];
            $query->orderBy($col, $dir);
        }

        $start = $request->input('start', 0);
        $length = $request->input('length', 10);

        $page = $query->skip($start)->take($length)->get();
        $data = $page->map(function ($item) {
            $data_inicio = date_create($item->data_inicio);
            $data_termino = date_create($item->data_termino);
            return [
                'id' => $item->id,
                'descricao' => $item->descricao,
                'data_inicio' => $data_inicio->format('d/m/Y'),
                'data_termino' => $data_termino->format('d/m/Y'),
                'ano' => $item->ano,
                'situacao' => $item->situacao,
                'actions' => view('periodos.partials.actions', compact('item'))->render(),
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
        return view('periodos.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data['id_estrutura'] = session('estrutura_id');

        PeriodoLetivo::create($data);
        return redirect()->route('periodos.index')->with('success', 'Período Letivo criado!');
    }

    public function show(PeriodoLetivo $periodo)
    {
        return view('periodos.show', compact('periodo'));
    }

    public function edit(PeriodoLetivo $periodo)
    {
        return view('periodos.edit', compact('periodo'));
    }

    public function update(Request $request, PeriodoLetivo $periodo)
    {
        $data = $this->validateData($request);
        $data['id_estrutura'] = session('estrutura_id');

        $periodo->update($data);
        return redirect()->route('periodos.index')->with('success', 'Período Letivo atualizado!');
    }

    public function destroy(PeriodoLetivo $periodo)
    {
        $periodo->delete();
        return redirect()->route('periodos.index')->with('success', 'Período Letivo removido.');
    }


    protected function validateData(Request $request, $id = null)
    {
        $rules = [
            'descricao' => 'required|string|max:255',
            'nome_impressao' => 'required|string|max:255',
            'data_inicio' => 'required|date',
            'data_termino' => 'required|date|after_or_equal:data_inicio',
            'ano' => 'required|integer',
            // 'dias_letivos' => 'nullable|integer',
            // 'tipo' => 'nullable|string|max:100',
            // 'semestre' => 'required|in:Anual,Semestral',
            // 'periodo_especial' => 'boolean',
            // 'periodo_atual' => 'boolean',
            // 'situacao' => 'required|in:ABERTO,FECHADO',
        ];


        return $request->validate($rules);
    }

}