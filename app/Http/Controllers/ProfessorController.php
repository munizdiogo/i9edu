<?php
namespace App\Http\Controllers;

use App\Models\Professor;
use App\Models\Funcionario;
use App\Models\Graduacao;
use App\Models\Titulacao;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function index()
    {
        return view('professores.index');
    }

    public function data(Request $r)
    {
        $q = Professor::with('funcionario');
        $total = $q->count();
        if ($s = $r->input('search.value')) {
            $q->whereHas('funcionario', fn($q) => $q->where('nome', 'like', "%{$s}%"));
        }
        $filtered = $q->count();
        $data = $q->skip($r->start)->take($r->length)->get()->map(fn($p) => [
            'id' => $p->id,
            'funcionario' => $p->funcionario->nome,
            'tipo_docente' => $p->tipo_docente,
            'situacao_docente' => $p->situacao_docente,
            'actions' => view('professores.partials.actions', compact('p'))->render(),
        ]);
        return response()->json([
            'draw' => intval($r->draw),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $data
        ]);
    }

    public function create()
    {
        $funcionarios = Funcionario::pluck('nome', 'id');
        $graduacoes = Graduacao::pluck('descricao', 'id');
        $titulacoes = Titulacao::pluck('descricao', 'id');
        return view('professores.create', compact('funcionarios', 'graduacoes', 'titulacoes'));
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'funcionario_id' => 'required|exists:funcionarios,id',
            'graduacao_id' => 'nullable|exists:graduacoes,id',
            'titulacao_principal_id' => 'nullable|exists:titulacoes,id',
            'tipo_docente' => 'in:Não possui,Docente,Tutor EAD,Docente/Tutor EAD',
            'regime_trabalho' => 'in:Não possui,CLT,Estagiário,Outros',
            'situacao_docente' => 'in:Não possui,Em Exercício,Afastado para qualificação,Afastado outros motivos,Tratamento saúde',
            'id_inep' => 'nullable|string',
            'registro_docente' => 'nullable|string',
            'nis' => 'nullable|string',
            'tipo_ensino_medio' => 'nullable|string',
            'pos_graduacao' => 'nullable|string',
            'tipo_contrato' => 'in:Não possui,CLT,PJ,Outro',
            'tipo_vinculo' => 'in:Não possui,CLT,PJ,Outro',
            'cod_urania' => 'nullable|string',
            'atuacao_formacao_especifica' => 'boolean',
            'atuacao_pesquisa' => 'boolean',
            'atuacao_extensao' => 'boolean',
            'atuacao_grad_presencial' => 'boolean',
            'atuacao_pos_grad_presencial' => 'boolean',
            'atuacao_gestao_plano' => 'boolean',
            'atuacao_grad_distancia' => 'boolean',
            'atuacao_pos_grad_distancia' => 'boolean',
            'atuacao_bolsa_pesquisa' => 'boolean',
        ]);
        Professor::create($data);
        return redirect()->route('professores.index')->with('success', 'Professor criado!');
    }

    public function edit(Professor $professor)
    {
        $funcionarios = Funcionario::pluck('nome', 'id');
        $graduacoes = Graduacao::pluck('descricao', 'id');
        $titulacoes = Titulacao::pluck('descricao', 'id');
        return view('professores.edit', compact('professor', 'funcionarios', 'graduacoes', 'titulacoes'));
    }

    public function update(Request $r, Professor $professor)
    {
        $data = $r->validate([]);
        $professor->update($data);
        return redirect()->route('professores.index')->with('success', 'Professor atualizado!');
    }

    public function destroy(Professor $professor)
    {
        $professor->delete();
        return redirect()->route('professores.index')->with('success', 'Professor removido!');
    }
}