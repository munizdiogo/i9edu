<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditaisProcessoSeletivoTable extends Migration
{
    public function up()
    {
        Schema::create('editais_processo_seletivo', function (Blueprint $table) {
            $table->bigIncrements('id');
            // Dados básicos
            $table->string('descricao');
            $table->unsignedBigInteger('periodo_letivo_id');
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->date('visivel_ate')->nullable();
            $table->enum('modalidade', ['Presencial', 'EaD', 'Híbrido'])->default('EaD');
            $table->enum('status', ['Aberto', 'Fechado'])->default('Aberto');
            // Enade
            $table->decimal('nota_minima_enade', 8, 2)->nullable();
            $table->integer('enade_ano_inicio')->nullable();
            $table->integer('enade_ano_fim')->nullable();
            $table->timestamps();

            // FKs
            $table->foreign('periodo_letivo_id')
                ->references('id')->on('periodos_letivos')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('editais_processo_seletivo');
    }
}