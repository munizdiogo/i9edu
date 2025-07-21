<?php

// database/migrations/2025_06_18_000000_create_cursos_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->bigIncrements('id');
            // Dados do curso
            $table->string('nome');
            $table->string('nome_impressao1');
            $table->string('nome_impressao2')->nullable();
            $table->string('nome_impressao3')->nullable();
            $table->string('nome_reduzido', 50)->nullable();
            $table->enum('grau_academico', ['BACHARELADO', 'LICENCIATURA', 'TECNÓLOGO', 'MESTRADO', 'DOUTORADO']);
            $table->enum('status', ['ATIVO', 'INATIVO'])->default('ATIVO');
            $table->enum('regime_funcionamento', ['PRESENCIAL', 'EaD', 'HÍBRIDO'])->default('PRESENCIAL');
            $table->enum('modalidade', ['Presencial', 'EaD', 'Híbrido'])->default('Presencial');
            $table->string('codigo_emec')->nullable();
            $table->string('link_emec')->nullable();
            // timestamps
            $table->timestamps();

            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}

