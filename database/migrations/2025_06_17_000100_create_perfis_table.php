<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfisTable extends Migration
{
    public function up()
    {
        Schema::create('perfis', function (Blueprint $table) {
            $table->bigIncrements('id');

            // Tipo de perfil
            $table->enum('tipo_cadastro', ['fisica', 'juridica']);

            // Campos Pessoa Física
            $table->string('nome')->nullable();
            $table->string('sobrenome')->nullable();
            $table->string('social_name')->nullable();
            $table->date('data_nascimento')->nullable();
            $table->string('cpf', 14)->unique()->nullable();
            $table->string('rg')->nullable();
            $table->string('orgao_expedidor')->nullable();
            $table->string('uf_expedidor', 2)->nullable();
            $table->string('passaporte')->nullable();
            $table->enum('sexo', ['M', 'F'])->nullable();
            $table->enum('estado_civil', ['solteiro', 'casado', 'divorciado'])->nullable();

            // Campos Pessoa Jurídica
            $table->string('razao_social')->nullable();
            $table->string('nome_fantasia')->nullable();
            $table->string('cnpj', 18)->unique()->nullable();
            $table->string('inscricao_estadual')->nullable();
            $table->string('inscricao_municipal')->nullable();

            // Campos comuns
            $table->string('email')->unique();
            $table->enum('tipo_perfil', ['aluno', 'docente', 'tecnico', 'parceiro', 'outro'])->default('aluno');
            $table->string('photo_url')->nullable();

            // Endereço
            $table->string('cep')->nullable();
            $table->string('logradouro')->nullable();
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('uf', 2)->nullable();
            $table->string('pais')->nullable();

            // Contato
            $table->string('ddi', 5)->nullable();
            $table->string('fone')->nullable();
            $table->string('celular')->nullable();
            $table->string('fax')->nullable();
            $table->string('fone_comercial')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('perfis');
    }
}

