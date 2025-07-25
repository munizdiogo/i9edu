<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePolosTable extends Migration
{
    public function up()
    {
        Schema::create('polos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome')->nullable(false);
            $table->string('nome_impressao')->nullable();
            $table->string('email')->nullable();
            $table->string('cidade')->nullable();
            $table->string('logradouro')->nullable();
            $table->string('bairro')->nullable();
            $table->string('complemento')->nullable();
            $table->string('link_maps')->nullable();
            $table->string('sigla', 20)->nullable();
            $table->string('cnpj', 18)->nullable();
            $table->string('codigo_inep', 20)->nullable();
            $table->string('numero', 10)->nullable();
            $table->string('cep', 10)->nullable();
            $table->string('fones')->nullable();
            $table->enum('status', ['ATIVO', 'INATIVO'])->default('ATIVO');
            $table->enum('tipo_unidade', ['Campus', 'Polo'])->default('Polo');
            $table->enum('tipo_contrato', ['Exclusivo', 'Compartilhado'])->default('Exclusivo');
            $table->decimal('perc_comissao', 5, 2)->nullable();
            $table->boolean('nao_apresentar_atendimento')->default(false);
            $table->date('data_ativacao')->nullable();
            $table->date('data_inativacao')->nullable();
            $table->unsignedBigInteger('id_gestor')->nullable();
            $table->unsignedBigInteger('id_gestor_faturamento')->nullable();
            $table->unsignedBigInteger('id_supervisor')->nullable();
            $table->date('data_contrato_inicio')->nullable();
            $table->date('data_contrato_termino')->nullable();
            $table->timestamps();

            $table->foreign('id_gestor')->references('id')->on('perfis')->onDelete('set null');
            $table->foreign('id_gestor_faturamento')->references('id')->on('perfis')->onDelete('set null');
            $table->foreign('id_supervisor')->references('id')->on('perfis')->onDelete('set null');

            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('polos');
    }
}
