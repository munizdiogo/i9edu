<?php
// database/migrations/2025_06_24_000002_create_parcelas_plano_pagamento_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcelasPlanoPagamentoTable extends Migration
{
    public function up()
    {
        Schema::create('parcelas_plano_pagamento', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_plano_pagamento');
            $table->string('descricao');
            $table->string('quantidade_parcelas');
            $table->decimal('valor', 10, 2);
            $table->enum('calculo_vencimento', ['FIXO', 'DIAS_UTIL', 'DINAMICO'])->default('FIXO');
            $table->enum('tipo_parcela', ['NORMAL', 'MATRICULA', 'DESCONTO'])->default('NORMAL');
            $table->timestamps();

            $table->foreign('id_plano_pagamento')
                ->references('id')->on('planos_pagamento')
                ->onDelete('cascade');

            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('parcelas_plano_pagamento');
    }
}
