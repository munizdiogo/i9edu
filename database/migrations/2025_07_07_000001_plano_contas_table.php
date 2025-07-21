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
            $table->unsignedBigInteger('id_grupo_conta')->nullable();
            $table->enum('natureza', ['ATIVO', 'PASSIVO', 'PATRIMONIO', 'RECEITA', 'DESPESA']);
            $table->timestamps();

            $table->foreign('id_grupo_conta')->references('id')->on('grupo_contas');

            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('plano_contas');
    }
};
