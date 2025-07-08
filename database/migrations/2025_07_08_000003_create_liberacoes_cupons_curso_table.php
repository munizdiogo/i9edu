<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiberacoesCuponsCursoTable extends Migration
{
    public function up()
    {
        Schema::create('liberacoes_cupons_curso', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cupom_id');
            $table->unsignedBigInteger('curso_id');
            $table->integer('quantidade_disponivel')->default(0);
            $table->timestamps();

            $table->foreign('cupom_id')->references('id')->on('cupons')->onDelete('cascade');
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
            $table->unique(['cupom_id', 'curso_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('liberacoes_cupons_curso');
    }
}