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
            $table->unsignedBigInteger('id_plano_pagamento');
            $table->unsignedBigInteger('id_curso');
            $table->primary(['id_plano_pagamento', 'id_curso']);

            $table->foreign('id_plano_pagamento')
                ->references('id')->on('planos_pagamento')
                ->onDelete('cascade');
            $table->foreign('id_curso')
                ->references('id')->on('cursos')
                ->onDelete('cascade');

            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('curso_plano_pagamento');
    }
}
