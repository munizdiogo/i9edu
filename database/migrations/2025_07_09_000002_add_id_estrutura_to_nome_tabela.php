<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('convenios', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('alunos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('alunos_curso_admissao', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('area_conhecimentos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('cupons', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('cursos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('cursos_matriz_captacao', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('curso_plano_pagamento', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('disciplinas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('disciplinas_base', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('documentos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('editais_processo_seletivo', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('etapas_periodos_letivos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('funcionarios', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('funcoes', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('grade_disciplinas_matrizes', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('grupo_contas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('liberacoes_cupons_curso', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('liberacoes_cupons_polos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('matriculas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('matrizes_curriculares', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('matriz_captacao', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('modulos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('parcelas_plano_pagamento', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('periodos_letivos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('planos_pagamento', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('plano_contas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('polos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('polos_matriz_captacao', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('polo_plano_pagamento', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('professores', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('requerimentos_assuntos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('requerimentos_departamentos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('requerimentos_solicitacoes', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('requerimentos_status', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('restricao_plano_pagamento_curso', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('restricao_plano_pagamento_turma', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('restricoes_plano_pagamento', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('setores', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('turmas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('contratos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
        Schema::table('transacoes', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('convenios', function (Blueprint $table) {
            //
        });
    }
};
