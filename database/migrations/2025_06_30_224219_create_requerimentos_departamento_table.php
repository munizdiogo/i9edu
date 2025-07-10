<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('requerimentos_departamentos', function (Blueprint $table) {
            $table->id();
            // $table->foreignId(column: 'usuario_id')->constrained('users')->onDelete('cascade');
            $table->string('descricao');
            $table->enum('status', ['Ativo', 'Inativo'])->default('Ativo');
            $table->enum('tipo', ['Aluno', 'Polo', 'Funcionario']);
            $table->timestamps();

            $table->unsignedBigInteger('id_estrutura')->default(1)->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requerimentos_departamentos');
    }
};
