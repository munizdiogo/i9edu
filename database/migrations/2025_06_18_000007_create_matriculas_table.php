<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatriculasTable extends Migration
{
    public function up()
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_aluno_curso_admissao');
            $table->unsignedBigInteger('id_turma');
            $table->unsignedBigInteger('id_contrato')->nullable();
            $table->date('data_matricula');
            $table->date('data_ocorrencia')->nullable();
            $table->enum('status', [
                'ATIVA',
                'AGUARDANDO',
                'APROVADO',
                'APROVADO_PARCIALMENTE',
                'CANCELADA',
                'DESISTENTE',
                'INFREQUENTE',
                'REENQUADRADA'
            ])->default('ATIVA');
            $table->timestamps();

            // chaves estrangeiras
            $table->foreign('id_aluno_curso_admissao')
                ->references('id')->on('alunos_curso_admissao')
                ->onDelete('cascade');
            $table->foreign('id_turma')
                ->references('id')->on('turmas');

            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('matriculas');
    }
}
