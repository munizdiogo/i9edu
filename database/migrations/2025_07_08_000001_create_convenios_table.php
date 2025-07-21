<?php
// database/migrations/2024_07_08_000000_create_convenios_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConveniosTable extends Migration
{
    public function up()
    {
        Schema::create('convenios', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->enum('modalidade', ['Bolsa', 'Financiamento'])->default('Bolsa');
            $table->string('tipo_financiamento')->nullable();

            $table->unsignedBigInteger('plano_conta_id')->nullable();
            $table->foreign('plano_conta_id')->references('id')->on('plano_contas');

            $table->decimal('valor', 10, 2)->default(0);
            $table->enum('tipo', ['Percentual', 'Fixo'])->default('Percentual');
            $table->boolean('perde_convenio')->default(false);
            $table->enum('status', ['Ativo', 'Inativo'])->default('Ativo');

            // Data Limite para Desconto
            $table->enum('pagamento_ate', ['Data de Vencimento', 'Data Fixa'])->default('Data de Vencimento');
            $table->string('dia_limite')->nullable();
            $table->enum('tipo_vencimento', ['Dia Fixo', 'Data de Vencimento'])->nullable();

            // Vigência
            $table->date('inicio')->nullable();
            $table->date('fim')->nullable();

            // Instrução bancária
            $table->text('instrucao_bancaria')->nullable();

            $table->timestamps();

            $table->unsignedBigInteger('id_estrutura')->default(0)->index();

        });
    }

    public function down()
    {
        Schema::dropIfExists('convenios');
    }
}
