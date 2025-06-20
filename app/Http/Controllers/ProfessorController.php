<?php
namespace App\Http\Controllers;

use App\Models\Professor;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function index()
    {
        return view('professores.index');
    }

    public function data(Request $request)
    {
        $q = Professor::with('funcionario');
        $total = $q->count();
        if ($s = $request->input('search.value')) {
            $q->whereHas('funcionario', fn($q) => $q->where('nome', 'like', "%{$s}%"));
        }
        $filtered = $q->count();
        $data = $q->skip($request->start)->take($request->length)->get()->map(fn($p) => [
            'id' => $p->id,
            'funcionario' => $p->funcionario->nome,
            'graduacao' => $p->graduacao,
            'titulacao_principal' => $p->titulacao_principal,
            'actions' => view('professores.partials.actions', compact('p'))->render(),
        ]);
        return response()->json([
            'draw' => intval($request->draw),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $data
        ]);
    }

    public function create()
    {
        $funcionarios = Funcionario::with('perfil')->get()->pluck('perfil.nome', 'id');
        $opcoesGrad = [
            'Extensão',
            'Pós-Graduação',
            'Graduação',
            'Mestrado',
            'Ensino Médio',
            'Ensino Técnico de Nível Médio',
            'Especializacao',
            'mba',
            'Doutorado',
            'Curso Livre'
        ];
        $opcoesTit = ['Mestre', 'Doutor', 'Especialista', 'Mestrado'];
        return view('professores.create', compact('funcionarios', 'opcoesGrad', 'opcoesTit'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        Professor::create($data);
        return redirect()->route('professores.index')->with('success', 'Professor criado!');
    }

    public function show(Professor $professor)
    {
        $funcionarios = with('perfil')->get()->pluck('perfil.nome', 'id');
        $opcoesGrad = [
            'Extensão',
            'Pós-Graduação',
            'Graduação',
            'Mestrado',
            'Ensino Médio',
            'Ensino Técnico de Nível Médio',
            'Especializacao',
            'mba',
            'Doutorado',
            'Curso Livre'
        ];
        $opcoesTit = ['Mestre', 'Doutor', 'Especialista', 'Mestrado'];
        return view('professores.show', compact('professor', 'funcionarios', 'opcoesGrad', 'opcoesTit'));
    }

    public function edit(Professor $professor)
    {
        $funcionarios = with('perfil')->get()->pluck('perfil.nome', 'id');
        $opcoesGrad = [
            'Extensão',
            'Pós-Graduação',
            'Graduação',
            'Mestrado',
            'Ensino Médio',
            'Ensino Técnico de Nível Médio',
            'Especializacao',
            'mba',
            'Doutorado',
            'Curso Livre'
        ];
        $opcoesTit = ['Mestre', 'Doutor', 'Especialista', 'Mestrado'];
        return view('professores.edit', compact('professor', 'funcionarios', 'opcoesGrad', 'opcoesTit'));
    }

    public function update(Request $request, Professor $professor)
    {
        $data = $this->validateData($request, "update", $professor);
        $professor->update($data);
        return redirect()->route('professores.index')->with('success', 'Professor atualizado!');
    }

    public function destroy(Professor $professor)
    {
        $professor->delete();
        return redirect()->route('professores.index')->with('success', 'Professor removido!');
    }


    protected function validateData(Request $request, $origem = "create", $professor = null)
    {
        $rules = [
            'funcionario_id' => 'required|exists:funcionarios,id',
            'graduacao' => 'required|in:Extensão,Pós-Graduação,Graduação,Mestrado,' .
                'Ensino Médio,Ensino Técnico de Nível Médio,' .
                'Especializacao,mba,Doutorado,Curso Livre',
            'titulacao_principal' => 'required|in:Mestre,Doutor,Especialista,Mestrado',
            'tipo_docente' => 'in:Não possui,Docente,Tutor EAD,Docente/Tutor EAD',
            'regime_trabalho' => 'in:Não possui,CLT,Estagiário,Outros',
            'situacao_docente' => 'in:Não possui,Em Exercício,Afastado para qualificação,' .
                'Afastado outros motivos,Tratamento saúde',
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
        ];

        return $request->validate($rules);
    }
}