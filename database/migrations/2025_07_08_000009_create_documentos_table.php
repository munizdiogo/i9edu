<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('nome_exibicao')->nullable();
            $table->enum('status', ['Ativo', 'Inativo'])->default('Ativo');
            $table->enum('tipo', ['Matrícula', 'Contrato', 'Outro'])->default('Matrícula');
            $table->string('template_path')->nullable();
            $table->boolean('usar_jasper')->default(false);
            $table->boolean('permitir_docx')->default(false);
            $table->boolean('obrigatorio_informar_data')->default(false);
            $table->boolean('processar_historico_disciplinas')->default(false);
            $table->timestamps();

            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('documentos');
    }
}