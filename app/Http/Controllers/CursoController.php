<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        return view('cursos.index');
    }

    public function data(Request $request)
    {
        $columns = ['id', 'nome_impressao1', 'grau_academico', 'status'];
        $total = Curso::count();
        $query = Curso::query();

        // busca global
        if ($search = $request->input('search.value')) {
            $query->where(function ($q) use ($search) {
                $q->where('nome_impressao1', 'like', "%{$search}%")
                    ->orWhere('nome_reduzido', 'like', "%{$search}%");
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

        // montar data
        $data = $pageData->map(function ($item) {
            return [
                'id' => $item->id,
                'nome' => $item->nome_impressao1,
                'grau_academico' => $item->grau_academico,
                'status' => $item->status,
                'actions' => view('cursos.partials.actions', compact('item'))->render(),
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
        return view('cursos.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data['id_estrutura'] = session('estrutura_id');
        Curso::create($data);
        return redirect()->route('cursos.index')->with('success', 'Curso criado!');
    }

    public function show(Curso $curso)
    {
        return view('cursos.show', compact('curso'));
    }

    public function edit(Curso $curso)
    {
        return view('cursos.edit', compact('curso'));
    }

    public function update(Request $request, Curso $curso)
    {
        $data = $this->validateData($request);
        $data['id_estrutura'] = session('estrutura_id');
        $curso->update($data);
        return redirect()->route('cursos.index')->with('success', 'Curso atualizado!');
    }

    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect()->route('cursos.index')->with('success', 'Curso removido.');
    }


    protected function validateData(Request $request, $id = null)
    {
        $rules = [
            'nome_impressao1' => 'required|string|max:255',
            'nome_impressao2' => 'nullable|string|max:255',
            'nome_impressao3' => 'nullable|string|max:255',
            'nome_reduzido' => 'nullable|string|max:50',
            'grau_academico' => 'required|in:BACHARELADO,LICENCIATURA,TECNÓLOGO,MESTRADO,DOUTORADO',
            'status' => 'required|in:ATIVO,INATIVO',
            'regime_funcionamento' => 'required|in:PRESENCIAL,EaD,HÍBRIDO',
            'modalidade' => 'required|in:Presencial,EaD,Híbrido',
            'codigo_emec' => 'nullable|string|max:50',
            'link_emec' => 'nullable|url',
        ];

        return $request->validate($rules);
    }
}
