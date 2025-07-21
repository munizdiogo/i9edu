<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuponsTable extends Migration
{
    public function up()
    {
        Schema::create('cupons', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->string('descricao')->nullable();
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->unsignedBigInteger('id_convenio')->nullable();
            $table->enum('status', ['ATIVO', 'INATIVO'])->default('ATIVO');
            $table->integer('quantidade_maxima')->default(0);
            $table->boolean('criar_convenio_pagador')->default(false);
            $table->boolean('validar_matricula_ativa')->default(false);
            $table->unsignedBigInteger('plano_conta_id')->nullable();
            $table->timestamps();

            $table->foreign('id_convenio')->references('id')->on('convenios')->onDelete('set null');
            $table->foreign('plano_conta_id')->references('id')->on('plano_contas')->onDelete('set null');

            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cupons');
    }
}