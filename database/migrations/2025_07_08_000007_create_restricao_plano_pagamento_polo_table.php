<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestricaoPlanoPagamentoPoloTable extends Migration
{
    public function up()
    {
        Schema::create('restricao_plano_pagamento_polo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restricao_id');
            $table->unsignedBigInteger('polo_id');
            $table->timestamps();

            $table->foreign('restricao_id')
                ->references('id')->on('restricoes_plano_pagamento')->onDelete('cascade');
            $table->foreign('polo_id')
                ->references('id')->on('polos')->onDelete('cascade');
            $table->unique(['restricao_id', 'polo_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('restricao_plano_pagamento_polo');
    }
}