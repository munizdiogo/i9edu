<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunosTable extends Migration
{
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->bigIncrements('id');

            // vínculo com Perfil
            $table->unsignedBigInteger('perfil_id');

            // dados de matrícula / identificação
            $table->string('ra')->unique();
            $table->string('ra_est')->nullable();
            $table->string('id_inep')->nullable();
            $table->string('email_institucional')->nullable();

            // dados de pessoa física
            $table->string('cpf')->nullable();
            $table->string('rg')->nullable();
            $table->string('orgao_expedidor')->nullable();
            $table->date('data_expedicao')->nullable();
            $table->date('data_nascimento')->nullable();
            $table->enum('sexo', ['Masculino', 'Feminino', 'Outro'])->nullable();
            $table->enum('estado_civil', ['Solteiro(a)', 'Casado(a)', 'Divorciado(a)', 'Viúvo(a)'])->nullable();
            $table->string('nacionalidade')->nullable();
            $table->string('naturalidade')->nullable();
            $table->string('religiao')->nullable();

            // contato
            $table->string('telefone')->nullable();
            $table->string('celular')->nullable();

            // status
            $table->enum('status', ['ATIVO', 'INATIVO'])->default('ATIVO');

            $table->timestamps();

            // FK
            $table->foreign('perfil_id')->references('id')->on('perfis')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('alunos');
    }
}
