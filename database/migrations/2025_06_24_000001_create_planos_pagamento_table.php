<?php

// database/migrations/2025_06_24_000001_create_planos_pagamento_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanosPagamentoTable extends Migration
{
    public function up()
    {
        Schema::create('planos_pagamento', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->boolean('disponivel_todos_cursos')->default(false);
            $table->boolean('permite_cupom')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('planos_pagamento');
    }
}
