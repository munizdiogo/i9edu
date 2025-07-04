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
        Schema::create('requerimentos_solicitacoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_assunto');
            $table->unsignedBigInteger('id_aluno');
            $table->unsignedBigInteger('id_matricula');
            $table->unsignedBigInteger('id_polo');
            $table->unsignedBigInteger('id_curso')->nullable();
            $table->unsignedBigInteger('id_status');
            $table->text('observacao')->nullable();
            $table->boolean('permite_disciplina')->default(false);
            $table->timestamps();

            $table->foreign('id_assunto')->references('id')->on('requerimentos_assuntos');
            $table->foreign('id_aluno')->references('id')->on('alunos');
            $table->foreign('id_matricula')->references('id')->on('matriculas');
            $table->foreign('id_polo')->references('id')->on('polos');
            $table->foreign('id_curso')->references('id')->on('cursos');
            $table->foreign('id_status')->references('id')->on('requerimentos_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requerimentos_solicitacoes');
    }
};
