<?php
// database/migrations/2025_06_24_000004_create_polo_plano_pagamento_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoloPlanoPagamentoTable extends Migration
{
    public function up()
    {
        Schema::create('polo_plano_pagamento', function (Blueprint $table) {
            $table->unsignedBigInteger('id_plano_pagamento');
            $table->unsignedBigInteger('id_polo');
            $table->primary(['id_plano_pagamento', 'id_polo']);

            $table->foreign('id_plano_pagamento')
                ->references('id')->on('planos_pagamento')
                ->onDelete('cascade');
            $table->foreign('id_polo')
                ->references('id')->on('polos')
                ->onDelete('cascade');

            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('polo_plano_pagamento');
    }
}
