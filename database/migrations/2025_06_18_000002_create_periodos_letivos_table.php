<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodosLetivosTable extends Migration
{
    public function up()
    {
        Schema::create('periodos_letivos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descricao');
            $table->string('nome_impressao');
            $table->date('data_inicio');
            $table->date('data_termino');
            $table->integer('ano');
            $table->integer('dias_letivos')->nullable();
            $table->string('tipo')->nullable();
            $table->enum('semestre', ['Anual', 'Semestral'])->default('Anual');
            $table->boolean('periodo_especial')->default(false);
            $table->boolean('periodo_atual')->default(false);
            $table->enum('situacao', ['ABERTO', 'FECHADO'])->default('ABERTO');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('periodos_letivos');
    }
}