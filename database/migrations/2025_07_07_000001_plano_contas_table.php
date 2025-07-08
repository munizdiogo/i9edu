<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('plano_contas', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->string('codigo');
            $table->enum('operacao', ['Soma', 'Subtração']);
            $table->enum('status', ['Ativo', 'Inativo'])->default('Ativo');
            $table->enum('tipo_conta', ['Sintética', 'Analítica']);
            $table->unsignedBigInteger('grupo_conta_id')->nullable();
            $table->enum('natureza', ['ATIVO', 'PASSIVO', 'PATRIMONIO', 'RECEITA', 'DESPESA']);
            $table->timestamps();

            $table->foreign('grupo_conta_id')->references('id')->on('grupo_contas');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('plano_contas');
    }
};
