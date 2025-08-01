<?php

namespace App\Http\Controllers;

use App\Models\EditalProcessoSeletivo;
use App\Models\PeriodoLetivo;
use Illuminate\Http\Request;

class EditalProcessoSeletivoController extends Controller
{
    public function index()
    {
        return view('editais.index');
    }

    public function data(Request $request)
    {
        $cols = ['id', 'descricao', 'periodo', 'data_inicio', 'data_fim', 'status'];
        $total = EditalProcessoSeletivo::count();
        $query = EditalProcessoSeletivo::with('periodoLetivo');

        if ($s = $request->input('search.value')) {
            $query->where('descricao', 'like', "%{$s}%");
        }

        $filtered = $query->count();

        if ($order = $request->input('order.0')) {
            $col = $cols[$order['column']];
            $dir = $order['dir'];
            if ($col === 'periodo') {
                $query->join('periodos_letivos', 'editais_processo_seletivo.id_periodo_letivo', '=', 'periodos_letivos.id')
                    ->orderBy('periodos_letivos.descricao', $dir);
            } else {
                $query->orderBy($col, $dir);
            }
        }

        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $page = $query->skip($start)->take($length)->get();

        $data = $page->map(function ($item) {

            $data_inicio = date_create($item->data_inicio);
            $data_fim = date_create($item->data_fim);
            return [
                'id' => $item->id,
                'descricao' => $item->descricao,
                'periodo' => $item->periodoLetivo->descricao,
                'data_inicio' => $data_inicio->format('d/m/Y'),
                'data_fim' => $data_fim->format('d/m/Y'),
                'status' => $item->status,
                'actions' => view('editais.partials.actions', ['item' => $item])->render(),
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
        $periodos = PeriodoLetivo::pluck('descricao', 'id');
        return view('editais.create', compact('periodos'));
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

        EditalProcessoSeletivo::create($data);
        return redirect()->route('editais.index')->with('success', 'Edital criado!');
    }

    public function show(EditalProcessoSeletivo $edital)
    {
        $periodos = PeriodoLetivo::pluck('descricao', 'id');
        return view('editais.show', compact('edital', 'periodos'));
    }

    public function edit(EditalProcessoSeletivo $edital)
    {
        $periodos = PeriodoLetivo::pluck('descricao', 'id');
        return view('editais.edit', compact('edital', 'periodos'));
    }

    public function update(Request $request, EditalProcessoSeletivo $edital)
    {
        $data = $this->validateData($request);

        if ($data->fails()) {
            return redirect()->back()
                ->withErrors($data)
                ->withInput();
        }
        $data = $data->getData();
        $data['id_estrutura'] = session('id_estrutura');

        $edital->update($data);
        return redirect()->route('editais.index')->with('success', 'Edital atualizado!');
    }

    public function destroy(EditalProcessoSeletivo $edital)
    {
        $edital->delete();
        return redirect()->route('editais.index')->with('success', 'Edital removido.');
    }

    protected function validateData(Request $request, $id = null)
    {
        $rules = [
            'descricao' => 'required|string|max:255',
            'id_periodo_letivo' => 'required|exists:periodos_letivos,id',
            'data_inicio' => 'required|date|before_or_equal:data_fim',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
            'visivel_ate' => 'nullable|date|after_or_equal:data_inicio',
            'modalidade' => 'required|in:Presencial,EaD,Híbrido',
            'status' => 'required|in:Aberto,Fechado',
            'nota_minima_enade' => 'nullable|numeric',
            'enade_ano_inicio' => 'nullable|integer',
            'enade_ano_fim' => 'nullable|integer',
        ];

        return $request->validate($rules);
    }

}