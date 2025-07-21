<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosTable extends Migration
{
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_perfil')->constrained('perfis');
            $table->foreignId('id_curso')->constrained('cursos');
            $table->foreignId('id_matricula')->nullable()->constrained('matriculas');
            $table->foreignId('id_turma')->nullable()->constrained('turmas');
            $table->foreignId('id_periodo_letivo')->constrained('periodos_letivos');
            $table->foreignId('id_plano_pagamento')->constrained('planos_pagamento');
            $table->string('status', 20)->default('PENDENTE');
            $table->string('descricao')->nullable();
            $table->date('data_aceite')->nullable();
            $table->date('data_inicio_vigencia')->nullable();
            $table->date('data_fim_vigencia')->nullable();
            $table->string('cancelado_por')->nullable();
            $table->text('observacao')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contratos');
    }
}