<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('modulos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->string('descricao');
            $table->string('nome_reduzido');
            $table->integer('ordem')->default(0);
            $table->enum('status', ['Ativo', 'Inativo'])->default('Ativo');
            $table->foreignId('prox_id_modulo')->nullable()
                ->constrained('modulos')
                ->nullOnDelete();
            $table->timestamps();

            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('modulos');
    }
};