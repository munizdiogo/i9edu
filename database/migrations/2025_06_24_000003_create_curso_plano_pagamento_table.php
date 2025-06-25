<?php

// database/migrations/2025_06_24_000003_create_curso_plano_pagamento_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursoPlanoPagamentoTable extends Migration
{
    public function up()
    {
        Schema::create('curso_plano_pagamento', function (Blueprint $table) {
            $table->unsignedBigInteger('plano_pagamento_id');
            $table->unsignedBigInteger('curso_id');
            $table->primary(['plano_pagamento_id', 'curso_id']);

            $table->foreign('plano_pagamento_id')
                ->references('id')->on('planos_pagamento')
                ->onDelete('cascade');
            $table->foreign('curso_id')
                ->references('id')->on('cursos')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('curso_plano_pagamento');
    }
}
