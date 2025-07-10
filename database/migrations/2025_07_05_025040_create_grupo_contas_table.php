<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('grupo_contas', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->string('sigla')->nullable();
            $table->integer('nivel')->default(1);
            $table->string('ordem')->nullable();
            $table->enum('tipo_resultado', ['VALOR', 'PERCENTUAL'])->default('VALOR');
            $table->enum('operacao', ['(+)', '(-)'])->default('(+)');
            $table->boolean('eh_dre')->default(false);
            $table->boolean('mensalidade')->default(false);
            $table->boolean('apresentar_relatorio')->default(false);
            $table->timestamps();

            $table->unsignedBigInteger('id_estrutura')->default(1)->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupo_contas');
    }
};
