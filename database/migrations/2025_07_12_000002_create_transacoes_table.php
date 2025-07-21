<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('transacoes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_matricula');
            $table->unsignedBigInteger('id_pagador'); // Pode ser o responsável financeiro (perfil/aluno)
            $table->unsignedBigInteger('id_contrato')->nullable();
            $table->unsignedBigInteger('id_plano_pagamento')->nullable();
            $table->unsignedBigInteger('id_convenio')->nullable();
            $table->unsignedBigInteger('id_plano_conta')->nullable();
            $table->unsignedBigInteger('id_parcela_plano_pagamento')->nullable();

            $table->string('descricao')->nullable();
            $table->string('tipo_ref')->nullable(); // MATRÍCULA, PARCELA, ETC
            $table->string('referencia')->nullable();

            $table->date('data_emissao')->nullable();
            $table->date('data_vencimento');
            $table->date('data_pagamento')->nullable();

            $table->decimal('valor', 10, 2);
            $table->decimal('valor_pago', 10, 2)->nullable();
            $table->decimal('descontos', 10, 2)->nullable();
            $table->decimal('encargos', 10, 2)->nullable();
            $table->decimal('devedor', 10, 2)->nullable();
            $table->decimal('pago', 10, 2)->nullable();
            $table->decimal('pago_enc', 10, 2)->nullable();

            $table->string('situacao')->default('ABERTO'); // PAGO, ABERTO, etc
            $table->string('origem')->nullable(); // MENSALIDADE, PARCELA etc
            $table->boolean('nf')->default(false); // Nota Fiscal
            $table->boolean('ac')->default(false); // AC (campo do seu sistema, exemplo: Adiantamento de crédito)
            $table->string('status')->default('ativo'); // Ativo/Inativo/Cancelado

            $table->string('competencia')->nullable(); // Ex: 06/2025
            $table->boolean('dre')->default(false);
            $table->boolean('mensalidade')->default(false);
            $table->boolean('relatorio')->default(false);

            $table->unsignedBigInteger('id_estrutura'); // Multi-tenancy

            $table->timestamps();

            // Indexes e Foreign Keys
            $table->foreign('id_matricula')->references('id')->on('matriculas');
            $table->foreign('id_pagador')->references('id')->on('perfis');
            $table->foreign('id_contrato')->references('id')->on('contratos');
            $table->foreign('id_plano_pagamento')->references('id')->on('planos_pagamento');
            $table->foreign('id_convenio')->references('id')->on('convenios');
            $table->foreign('id_plano_conta')->references('id')->on('plano_contas');
            $table->foreign('id_parcela_plano_pagamento')->references('id')->on('parcelas_plano_pagamento');
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transacoes');
    }
};
