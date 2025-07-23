<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PoloController;

Route::middleware('guest')->group(function () {
    // Registro
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);

    // Login
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);

    // Esqueci Senha
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

    // Redefinir Senha
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
});

// Logout
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


// Dashboard
Route::middleware(['auth', 'estrutura'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/', function () {
        return view('dashboard');
    })->name('index');
});


// Perfil
use App\Http\Controllers\PerfilController;

Route::middleware(['auth', 'estrutura'])->group(function () {
    Route::get('perfis/data', [PerfilController::class, 'data'])
        ->name('perfis.data');
    Route::resource('perfis', PerfilController::class)->parameters(['perfis' => 'perfil']);
    ;
});


// Polos
Route::middleware(['auth', 'estrutura'])->group(function () {
    // endpoint AJAX para o DataTable
    Route::get('polos/data', [PoloController::class, 'data'])->name('polos.data');
    Route::resource('polos', PoloController::class);
});


// Cursos
use App\Http\Controllers\CursoController;

Route::middleware(['auth', 'estrutura'])->group(function () {
    Route::get('cursos/data', [CursoController::class, 'data'])->name('cursos.data');
    Route::resource('cursos', CursoController::class);
});


// Matrizes Curriculares
use App\Http\Controllers\MatrizCurricularController;

Route::middleware(['auth', 'estrutura'])->group(function () {
    Route::get('matrizes/data', [MatrizCurricularController::class, 'data'])->name('matrizes.data');
    Route::resource('matrizes', MatrizCurricularController::class)->parameters(['matrizes' => 'matriz']);
    ;
});


// Turmas
use App\Http\Controllers\TurmaController;

Route::middleware(['auth', 'estrutura'])->group(function () {
    Route::get('turmas/data', [TurmaController::class, 'data'])->name('turmas.data');
    Route::resource('turmas', TurmaController::class);
});


// Perriodos Letivos
use App\Http\Controllers\PeriodoLetivoController;

Route::middleware(['auth', 'estrutura'])->group(function () {
    Route::get('periodos/data', [PeriodoLetivoController::class, 'data'])->name('periodos.data');
    Route::resource('periodos', PeriodoLetivoController::class);
});


// Alunos
use App\Http\Controllers\AlunoController;

Route::middleware(['auth', 'estrutura'])->group(function () {
    Route::get('alunos/data', [AlunoController::class, 'data'])->name('alunos.data');
    Route::resource('alunos', AlunoController::class);
    ;
});


// Aluno Curso Admissão
use App\Http\Controllers\AlunoCursoAdmissaoController as AdmissaoController;

Route::middleware(['auth', 'estrutura'])->group(function () {
    Route::get('admissoes/data', [AdmissaoController::class, 'data'])->name('admissoes.data');
    Route::resource('admissoes', AdmissaoController::class)->parameters(['admissoes' => 'admissao']);
});


// Editais Processo Seletivo
use App\Http\Controllers\EditalProcessoSeletivoController as EditalController;

Route::middleware(['auth', 'estrutura'])->group(function () {
    Route::get('editais/data', [EditalController::class, 'data'])->name('editais.data');
    Route::resource('editais', EditalController::class)->parameters(['editais' => 'edital']);
});


// Matrículas
use App\Http\Controllers\MatriculaController;

Route::middleware(['auth', 'estrutura'])->group(function () {
    Route::get('matriculas/data', [MatriculaController::class, 'data'])
        ->name('matriculas.data');
    Route::resource('matriculas', MatriculaController::class);
});



//  Área de Conhecimento
use App\Http\Controllers\AreaConhecimentoController;

Route::middleware(['auth', 'estrutura'])->group(function () {
    Route::get('area_conhecimentos/data', [AreaConhecimentoController::class, 'data'])->name('area_conhecimentos.data');
    Route::resource('area_conhecimentos', AreaConhecimentoController::class);
});



// Etapas Período Letivo
use App\Http\Controllers\EtapaPeriodoLetivoController;

Route::middleware(['auth', 'estrutura'])->group(function () {
    Route::get('etapas_periodos_letivos/data', [EtapaPeriodoLetivoController::class, 'data'])
        ->name('etapas_periodos_letivos.data');
    Route::resource('etapas_periodos_letivos', EtapaPeriodoLetivoController::class);
});


// Módulos
use App\Http\Controllers\ModuloController;

Route::middleware(['auth', 'estrutura'])->group(function () {
    Route::get('modulos/data', [ModuloController::class, 'data'])->name('modulos.data');
    Route::resource('modulos', ModuloController::class);
});


// ------

// Grade Disciplinas Matrizes
use App\Http\Controllers\GradeDisciplinasMatrizController;

Route::middleware(['auth', 'estrutura'])->group(function () {
    Route::get('grade_disciplinas_matrizes/data', [GradeDisciplinasMatrizController::class, 'data'])
        ->name('grade_disciplinas_matrizes.data');
    Route::resource('grade_disciplinas_matrizes', GradeDisciplinasMatrizController::class);
});


//  Disciplinas Base
use App\Http\Controllers\DisciplinaBaseController;

Route::middleware(['auth', 'estrutura'])->group(function () {
    Route::get('disciplinas_base/data', [DisciplinaBaseController::class, 'data'])
        ->name('disciplinas_base.data');
    Route::resource('disciplinas_base', DisciplinaBaseController::class);
});




// Disciplinas
// #Teste Permissão de acesso
use App\Http\Controllers\DisciplinaController;

Route::group(['permission' => ['permission:disciplinas.edit']], function () {
    Route::get('disciplinas/data', [DisciplinaController::class, 'data'])->name('disciplinas.data');
    Route::resource('disciplinas', DisciplinaController::class);
});



// Professores
use App\Http\Controllers\ProfessorController;

Route::middleware(['auth', 'estrutura'])->group(function () {
    Route::get('professores/data', [ProfessorController::class, 'data'])->name('professores.data');
    Route::resource('professores', ProfessorController::class)->parameters(['professores' => 'professor']);
});


//  Setores
use App\Http\Controllers\SetorController;

Route::middleware(['auth', 'estrutura'])->group(function () {
    Route::get('setores/data', [SetorController::class, 'data'])->name('setores.data');
    Route::resource('setores', SetorController::class)->parameters(['setores' => 'setor']);
});


// Funções
use App\Http\Controllers\FuncaoController;

Route::middleware(['auth', 'estrutura'])->group(function () {
    Route::get('funcoes/data', [FuncaoController::class, 'data'])->name('funcoes.data');
    Route::resource('funcoes', FuncaoController::class)->parameters(['funcoes' => 'funcao']);
});


// Funções
use App\Http\Controllers\FuncionarioController;

Route::middleware(['auth', 'estrutura'])->group(function () {
    Route::get('funcionarios/data', [FuncionarioController::class, 'data'])->name('funcionarios.data');
    Route::resource('funcionarios', FuncionarioController::class)->parameters(['funcionarios' => 'funcionario']);
});


//  Matriz Captação
use App\Http\Controllers\MatrizCaptacaoController;
use App\Http\Controllers\CursoMatrizCaptacaoController;
use App\Http\Controllers\PoloMatrizCaptacaoController;

Route::middleware(['auth', 'estrutura'])->group(function () {
    Route::get('matriz-captacao/data', [MatrizCaptacaoController::class, 'data'])->name('matriz_captacao.data');
    Route::resource('matriz-captacao', MatrizCaptacaoController::class)->parameters(['matriz-captacao' => 'matriz']);

    Route::get('matriz-captacao/{matriz}/cursos/data', [CursoMatrizCaptacaoController::class, 'data'])->name('matriz_captacao.cursos.data');
    Route::post('matriz-captacao/{matriz}/cursos', [CursoMatrizCaptacaoController::class, 'store'])->name('matriz_captacao.cursos.store');
    Route::delete('cursos-matriz-captacao/{curso}', [CursoMatrizCaptacaoController::class, 'destroy'])->name('matriz_captacao.cursos.destroy');

    Route::get('matriz-captacao/{matriz}/polos/data', [PoloMatrizCaptacaoController::class, 'data'])->name('matriz_captacao.polos.data');
    Route::post('matriz-captacao/{matriz}/polos', [PoloMatrizCaptacaoController::class, 'store'])->name('matriz_captacao.polos.store');
    Route::delete('polos-matriz-captacao/{polo}', [PoloMatrizCaptacaoController::class, 'destroy'])->name('matriz_captacao.polos.destroy');
});



//  Plano de `Pagamento
use App\Http\Controllers\PlanoPagamentoController;
use App\Http\Controllers\ParcelaPlanoPagamentoController;

Route::middleware(['auth', 'estrutura'])->group(function () {
    Route::get('planos/data', [PlanoPagamentoController::class, 'data'])->name('planos.data');
    Route::resource('planos_pagamento', PlanoPagamentoController::class);

    Route::get('planos_pagamento/{plano}/parcelas/data', [ParcelaPlanoPagamentoController::class, 'data'])
        ->name('planos.parcelas.data');

    Route::post('planos_pagamento/{plano}/parcelas', [ParcelaPlanoPagamentoController::class, 'store'])
        ->name('planos.parcelas.store');

    Route::put('planos_pagamento/{plano}/parcelas', [ParcelaPlanoPagamentoController::class, 'update'])
        ->name('planos.parcelas.update');

    Route::delete('parcelas_plano_pagamento/{r}', [ParcelaPlanoPagamentoController::class, 'destroy'])
        ->name('planos.parcelas.destroy');


});


//  Requerimentos
use App\Http\Controllers\RequerimentoDepartamentoController;

Route::middleware(['auth', 'estrutura'])->group(function () {
    Route::get('requerimentos_departamentos/data', [RequerimentoDepartamentoController::class, 'data'])->name('requerimentos_departamentos.data');
    Route::resource('requerimentos_departamentos', RequerimentoDepartamentoController::class)->parameters(['requerimentos_departamentos' => 'requerimento_departamento']);

});


use App\Http\Controllers\RequerimentoStatusController;

Route::middleware(['auth'])->group(function () {
    Route::get('requerimentos-status/data', [RequerimentoStatusController::class, 'data'])->name('requerimentos-status.data');
    Route::resource('requerimentos-status', RequerimentoStatusController::class)->parameters(['requerimentos-status' => 'requerimento-status']);
});

use App\Http\Controllers\RequerimentoAssuntoController;

Route::middleware(['auth'])->group(function () {
    Route::get('requerimentos_assuntos/data', [RequerimentoAssuntoController::class, 'data'])->name('requerimentos_assuntos.data');
    Route::resource('requerimentos_assuntos', RequerimentoAssuntoController::class)->parameters(['requerimentos_assuntos' => 'requerimento_assunto']);
});


use App\Http\Controllers\RequerimentoSolicitacaoController;
use App\Http\Controllers\Api\ApiAlunoController as ApiAlunoController;
use App\Http\Controllers\Api\ApiMatriculaController;
Route::middleware(['auth'])->group(function () {
    Route::get('requerimentos_solicitacoes/data', [RequerimentoSolicitacaoController::class, 'data'])->name('requerimentos_solicitacoes.data');
    Route::post('requerimentos_solicitacoes/upload', [RequerimentoSolicitacaoController::class, 'upload'])->name('requerimentos_solicitacoes.upload');
    Route::resource('requerimentos_solicitacoes', RequerimentoSolicitacaoController::class)->parameters(['requerimentos_solicitacoes' => 'requerimento_solicitacao']);
    // API PARA POPULAR CAMPOS - SELECT
    Route::get('api/alunos/{id}/matriculas', [ApiAlunoController::class, 'matriculas']);
    Route::get('api/matriculas/{id}/disciplinas', [ApiMatriculaController::class, 'disciplinas']);
});

// Grupo de Contas

use App\Http\Controllers\GrupoContaController;
Route::get('grupo-contas-data', [GrupoContaController::class, 'data'])->name('grupo-contas.data');
Route::resource('grupo-contas', GrupoContaController::class)->names('grupo-contas');



// Plano de Contas
use App\Http\Controllers\PlanoContaController;

Route::get('plano-contas/data', [PlanoContaController::class, 'data'])->name('plano-contas.data');
Route::resource('plano-contas', PlanoContaController::class)->parameters(['plano-contas' => 'plano-conta']);


// Convênios
use App\Http\Controllers\ConvenioController;
Route::middleware(['auth'])->group(function () {
    Route::get('convenios-data', [ConvenioController::class, 'data'])->name('convenios.data');
    Route::resource('convenios', ConvenioController::class);
});



// Cupom
use App\Http\Controllers\CupomController;
Route::get('cupons/data', [CupomController::class, 'data'])->name('cupons.data');
Route::resource('cupons', CupomController::class)->parameters(['cupons' => 'cupom']);

// >> Liberações Cursos
Route::prefix('cupons')->group(function () {
    Route::get('{cupom}/cursos/data', [CupomController::class, 'cursosData'])->name('cupons.cursos.data');
    Route::post('{cupom}/cursos/adicionar', [CupomController::class, 'adicionarCurso'])->name('cupons.cursos.adicionar');
    Route::delete('{cupom}/cursos/{curso}/remover', [CupomController::class, 'removerCurso'])->name('cupons.cursos.remover');
    Route::delete('cupons/{cupom}/cursos/remover-todos', [CupomController::class, 'removerTodosCursos'])->name('cupons.cursos.remover_todos');
});
// >> Liberações Polos
Route::prefix('cupons')->group(function () {
    // ... outras rotas ...
    Route::get('{cupom}/polos/data', [CupomController::class, 'polosData'])->name('cupons.polos.data');
    Route::post('{cupom}/polos/adicionar', [CupomController::class, 'adicionarPolo'])->name('cupons.polos.adicionar');
    Route::delete('{cupom}/polos/{polo}/remover', [CupomController::class, 'removerPolo'])->name('cupons.polos.remover');
    Route::delete('cupons/{cupom}/polos/remover-todos', [CupomController::class, 'removerTodosPolos'])->name('cupons.polos.remover_todos');
});


// Restrições de Plano de Pagamento
use App\Http\Controllers\RestricaoPlanoPagamentoController;
Route::get('restricoes_plano_pagamento/data', [RestricaoPlanoPagamentoController::class, 'data'])->name('restricoes_plano_pagamento.data');
Route::resource('restricoes_plano_pagamento', RestricaoPlanoPagamentoController::class)->parameters(['restricoes_plano_pagamento' => 'restricao']);


// Documentos
use App\Http\Controllers\DocumentosController;
use App\Http\Controllers\DocumentoController;

Route::resource('documentos', DocumentosController::class);
Route::get('documentos-data', [DocumentosController::class, 'data'])->name('documentos.data');


// Estruturas
use App\Http\Controllers\EstruturaController;

Route::resource('estruturas', EstruturaController::class);
Route::post('estruturas/selecionar', [EstruturaController::class, 'selecionar'])->name('estruturas.selecionar');


// Gerenciamento das Permissões de acesso
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionsController;

// CRUD de Roles
Route::resource('roles', RolesController::class);

// Tela para GERENCIAR PERMISSÕES de uma Role (ex: roles/1/permissions)
Route::get('roles/{role}/permissions', [RolesController::class, 'permissions'])->name('roles.permissions');
Route::put('roles/{role}/permissions', [RolesController::class, 'updatePermissions'])->name('roles.permissions.update');
Route::resource('permissions', RolesController::class);


//  Tela Transacoes
use App\Http\Controllers\TransacaoController;
Route::resource('transacoes', TransacaoController::class);
Route::get('transacoes-data', [TransacaoController::class, 'data'])->name('transacoes.data');


// Tela de Contratos
use App\Http\Controllers\ContratoController;
Route::resource('contratos', ContratoController::class);
Route::get('contratos-data', [ContratoController::class, 'data'])->name('contratos.data');