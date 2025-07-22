<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestricaoPlanoPagamentoTurmaTable extends Migration
{
    public function up()
    {
        Schema::create('restricao_plano_pagamento_turma', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_restricao');
            $table->unsignedBigInteger('id_turma');
            $table->timestamps();

            $table->foreign('id_restricao')
                ->references('id')->on('restricoes_plano_pagamento')->onDelete('cascade');
            $table->foreign('id_turma')
                ->references('id')->on('turmas')->onDelete('cascade');
            $table->unique(['id_restricao', 'id_turma']);

            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('restricao_plano_pagamento_turma');
    }
}