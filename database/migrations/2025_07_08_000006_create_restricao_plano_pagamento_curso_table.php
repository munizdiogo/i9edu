<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestricaoPlanoPagamentoCursoTable extends Migration
{
    public function up()
    {
        Schema::create('restricao_plano_pagamento_curso', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restricao_id');
            $table->unsignedBigInteger('id_curso');
            $table->timestamps();

            $table->foreign('restricao_id')
                ->references('id')->on('restricoes_plano_pagamento')->onDelete('cascade');
            $table->foreign('id_curso')
                ->references('id')->on('cursos')->onDelete('cascade');
            $table->unique(['restricao_id', 'id_curso']);

            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('restricao_plano_pagamento_curso');
    }
}
