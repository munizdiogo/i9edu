<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunosCursoAdmissaoTable extends Migration
{
    public function up()
    {
        Schema::create('alunos_curso_admissao', function (Blueprint $table) {
            $table->bigIncrements('id');

            // vínculos
            $table->unsignedBigInteger('aluno_id');
            $table->unsignedBigInteger('matriz_curricular_id');
            $table->unsignedBigInteger('campus_polo_id')->nullable();
            $table->unsignedBigInteger('periodo_letivo_ingresso_id')->nullable();
            $table->unsignedBigInteger('turma_base_id')->nullable();
            $table->unsignedBigInteger('edital_processo_seletivo_id')->nullable();

            // Dados do curso
            $table->date('data_ingresso');
            $table->date('data_inicio_curso')->nullable();
            $table->date('data_conclusao')->nullable();
            $table->string('periodo_conclusao')->nullable();
            $table->enum('turno', ['Matutino', 'Vespertino', 'Noturno', 'Integral', 'EaD'])->default('EaD');
            $table->string('numero_matricula')->nullable();

            // Process o seletivo
            $table->unsignedBigInteger('forma_ingresso_id')->nullable();
            $table->unsignedBigInteger('instituicao_id')->nullable();
            $table->integer('classificacao')->nullable();
            $table->decimal('pontos', 5, 2)->nullable();
            $table->integer('vagas')->nullable();
            $table->integer('numero_chamada')->nullable();
            $table->date('data_vestibular')->nullable();
            $table->enum('procedencia_escola_publica', ['(1)Sim', '(2)Não Informado'])->default('(2)Não Informado');
            $table->decimal('nota_redacao', 5, 2)->nullable();
            $table->text('observacao')->nullable();

            // Estágio
            $table->date('data_estagio')->nullable();
            $table->integer('horas_estagio')->nullable();

            // Transferência
            $table->unsignedBigInteger('instituicao_transferencia_id')->nullable();

            $table->enum('status', ['ATIVO', 'INATIVO'])->default('ATIVO');
            $table->timestamps();

            // FKs
            $table->foreign('aluno_id')->references('id')->on('alunos')->onDelete('cascade');
            $table->foreign('matriz_curricular_id')->references('id')->on('matrizes_curriculares');
            $table->foreign('campus_polo_id')->references('id')->on('polos');
            $table->foreign('periodo_letivo_ingresso_id')->references('id')->on('periodos_letivos');
            $table->foreign('turma_base_id')->references('id')->on('turmas');
            $table->foreign('edital_processo_seletivo_id')->references('id')->on('editais_processo_seletivo');
            // outras FKs (forma_ingresso, instituicao, instituicao_transferencia) você cria conforme sua tabela de cadastros
        });
    }

    public function down()
    {
        Schema::dropIfExists('alunos_curso_admissao');
    }
}