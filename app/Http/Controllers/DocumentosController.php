<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class DocumentosController extends Controller
{
    public function index()
    {
        return view('documentos.index');
    }

    public function data(Request $request)
    {
        $query = Documento::query();
        $total = $query->count();

        if ($search = $request->input('search.value')) {
            $query->where('titulo', 'like', "%{$search}%")
                ->orWhere('nome_exibicao', 'like', "%{$search}%");
        }
        $filtered = $query->count();

        $data = $query->skip($request->start)
            ->take($request->length)
            ->get()
            ->map(fn($item) => [
                'id' => $item->id,
                'titulo' => $item->titulo,
                'nome_exibicao' => $item->nome_exibicao,
                'tipo' => $item->tipo,
                'status' => $item->status,
                'template' => $item->template,
                'actions' => view('documentos.partials.actions', compact('item'))->render(),
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
        return view('documentos.create');
    }

    public function store(Request $request)
    {
        $data = $request->validateData($request, "create");
        $data['id_estrutura'] = session('estrutura_id');

        $data = $request->except(['template']);
        if ($request->hasFile('template')) {
            $data['template_path'] = $request->file('template')->store('documentos');
        }

        $data['usar_jasper'] = $request->has('usar_jasper');
        $data['permitir_docx'] = $request->has('permitir_docx');
        $data['obrigatorio_informar_data'] = $request->has('obrigatorio_informar_data');
        $data['processar_historico_disciplinas'] = $request->has('processar_historico_disciplinas');

        Documento::create($data);

        return redirect()->route('documentos.index')->with('success', 'Documento cadastrado com sucesso!');
    }

    public function edit(Documento $documento)
    {
        return view('documentos.edit', compact('documento'));
    }

    public function update(Request $request, Documento $documento)
    {
        $data = $request->validateData($request, "update");
        $data['id_estrutura'] = session('estrutura_id');

        $data = $request->except(['template']);
        if ($request->hasFile('template')) {
            if ($documento->template_path && Storage::exists($documento->template_path)) {
                Storage::delete($documento->template_path);
            }
            $data['template_path'] = $request->file('template')->store('documentos');
        }

        $data['usar_jasper'] = $request->has('usar_jasper');
        $data['permitir_docx'] = $request->has('permitir_docx');
        $data['obrigatorio_informar_data'] = $request->has('obrigatorio_informar_data');
        $data['processar_historico_disciplinas'] = $request->has('processar_historico_disciplinas');

        $documento->update($data);

        return redirect()->route('documentos.index')->with('success', 'Documento atualizado com sucesso!');
    }

    public function show(Documento $documento)
    {
        return view('documentos.show', compact('documento'));
    }

    public function destroy(Documento $documento)
    {
        if ($documento->template_path && Storage::exists($documento->template_path)) {
            Storage::delete($documento->template_path);
        }
        $documento->delete();
        return response()->json(['success' => true]);
    }

    protected function validateData(Request $request, $id = null)
    {
        $rules = [
            'titulo' => 'required|string|max:255',
            'nome_exibicao' => 'nullable|string|max:255',
            'status' => 'required|in:Ativo,Inativo',
            'tipo' => 'required|in:Matrícula,Contrato,Outro',
            'template' => 'nullable|file|mimes:doc,docx',
        ];

        return $request->validate($rules);
    }
}