<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestricoesPlanoPagamentoTable extends Migration
{
    public function up()
    {
        Schema::create('restricoes_plano_pagamento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_plano_pagamento');
            $table->string('modalidade')->nullable();
            $table->timestamps();

            $table->foreign('id_plano_pagamento')->references('id')->on('planos_pagamento');
        });
    }

    public function down()
    {
        Schema::dropIfExists('restricoes_plano_pagamento');
    }
}
