<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstruturasTable extends Migration
{
    public function up()
    {
        Schema::create('estruturas', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->enum('status', ['Ativo', 'Inativo'])->default('Ativo');
            $table->string('nome_fantasia');
            $table->string('nome_comercial');
            $table->string('nome_complementar')->nullable();
            $table->string('nome_reduzido')->nullable();
            $table->string('nome_portal_diplomados')->nullable();
            $table->string('cnpj', 30)->nullable();
            $table->string('inscricao_estadual')->nullable();
            $table->string('inscricao_municipal')->nullable();
            $table->string('fone', 30)->nullable();
            $table->string('modelo_negocio')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('estruturas');
    }
}
