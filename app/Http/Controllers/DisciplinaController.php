<?php
namespace App\Http\Controllers;

use App\Models\Disciplina;
use App\Models\DisciplinaBase;
use App\Models\EtapaPeriodoLetivo;
use App\Models\Modulo;
use App\Models\Professor;
use App\Models\AreaConhecimento;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    public function index()
    {
        return view('disciplinas.index');
    }

    public function data(Request $request)
    {
        $query = Disciplina::with(['base', 'etapa', 'modulo']);
        $total = $query->count();

        if ($search = $request->input('search.value')) {
            $query->whereHas('base', fn($q) => $q->where('nome', 'like', "%{$search}%"))
                ->orWhere('descricao', 'like', "%{$search}%");
        }
        $filtered = $query->count();

        if ($order = $request->input('order.0')) {
            $cols = ['id', 'descricao', 'base', 'etapa', 'modulo'];
            // colunas custom ficam sem order
        }

        $data = $query->skip($request->start)
            ->take($request->length)
            ->get()
            ->map(fn($item) => [
                'id' => $item->id,
                'descricao' => $item->descricao,
                'base' => $item->base->nome,
                'etapa' => $item->etapa->descricao,
                'modulo' => $item->modulo->descricao,
                'actions' => view('disciplinas.partials.actions', compact('item'))->render(),
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
        $bases = DisciplinaBase::pluck('nome', 'id');
        $etapas = EtapaPeriodoLetivo::pluck('descricao', 'id');
        $modulos = Modulo::pluck('descricao', 'id');
        $professores = Professor::with('funcionario.perfil')->get()->pluck('funcionario.perfil.nome', 'id');
        $areas = AreaConhecimento::pluck('descricao', 'id');
        return view('disciplinas.create', compact('bases', 'etapas', 'modulos', 'professores', 'areas'));
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
        Disciplina::create($data);
        return redirect()->route('disciplinas.index')
            ->with('success', 'Disciplina criada!');
    }

    public function show(Disciplina $disciplina)
    {
        $bases = DisciplinaBase::pluck('nome', 'id');
        $etapas = EtapaPeriodoLetivo::pluck('descricao', 'id');
        $modulos = Modulo::pluck('descricao', 'id');
        $professores = Professor::with('funcionario.perfil')->get()->pluck('funcionario.perfil.nome', 'id');
        $areas = AreaConhecimento::pluck('descricao', 'id');
        return view('disciplinas.show', compact('disciplina', 'bases', 'etapas', 'modulos', 'professores', 'areas'));
    }

    public function edit(Disciplina $disciplina)
    {
        $bases = DisciplinaBase::pluck('nome', 'id');
        $etapas = EtapaPeriodoLetivo::pluck('descricao', 'id');
        $modulos = Modulo::pluck('descricao', 'id');
        $professores = Professor::with('funcionario.perfil')->get()->pluck('funcionario.perfil.nome', 'id');
        $areas = AreaConhecimento::pluck('descricao', 'id');
        return view('disciplinas.edit', compact('disciplina', 'bases', 'etapas', 'modulos', 'professores', 'areas'));
    }

    public function update(Request $request, Disciplina $disciplina)
    {
        $data = $this->validateData($request);

        if ($data->fails()) {
            return redirect()->back()
                ->withErrors($data)
                ->withInput();
        }
        $data = $data->getData();
        $data['id_estrutura'] = session('id_estrutura');
        $disciplina->update($data);
        return redirect()->route('disciplinas.index')->with('success', 'Disciplina atualizada!');
    }

    public function destroy(Disciplina $disciplina)
    {
        $disciplina->delete();
        return redirect()->route('disciplinas.index')->with('success', 'Disciplina removida!');
    }


    protected function validateData(Request $request, $origem = "create", $setor = null)
    {
        $rules = [
            'id_disciplina_base' => 'required|exists:disciplinas_base,id',
            'etapa_id_periodo_letivo' => 'required|exists:etapas_periodos_letivos,id',
            'id_modulo' => 'required|exists:modulos,id',
            'descricao' => 'required|string',
            'nome_reduzido' => 'required|string',
            'modalidade' => 'required|in:Presencial,EaD',
            'id_professor_padrao' => 'nullable|exists:professores,id',
            'codigo_mec' => 'nullable|string',
            'codigo_inep' => 'nullable|string',
            'id_area_conhecimento' => 'nullable|exists:area_conhecimentos,id',
            'ch_padrao' => 'integer',
            'ch_cobrada' => 'integer',
            'ch_teorica' => 'integer',
            'ch_pratica' => 'integer',
            'ch_corrida' => 'numeric',
            'ch_extensao' => 'integer',
            'ch_presencial' => 'integer',
            'ch_ead' => 'integer',
            'qtd_aulas' => 'integer',
            'creditos' => 'numeric',
            'utiliza_freq_resumida' => 'boolean',
            'avaliacao' => 'in:Por Nota,Conceito',
            'tipo_avaliacao' => 'string',
            'obrigatoriedade' => 'in:Obrigatória,Optativa',
            'complementaridade' => 'in:Não Informado,Sim,Não',
            'id_area_avaliacao' => 'nullable|exists:area_conhecimentos,id',
            'disciplina_tcc' => 'boolean',
            // 'nao_apresentar_nota' => 'boolean',
            // 'reprovar_por_frequencia' => 'boolean',
            // 'nao_apresentar_frequencia' => 'boolean',
            // 'nao_contabilizar_reprovacao' => 'boolean',
            // 'nao_enviar_educacenso' => 'boolean',
            // 'nao_validar_conflito' => 'boolean',
            // 'nao_contar_minimo' => 'boolean',
            'ter_cursado_pct' => 'numeric'
        ];

        return $request->validate($rules);
    }
}