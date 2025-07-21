<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('setores', function (Blueprint $table) {
            $table->id();
            $table->integer('codigo')->unique();
            $table->string('descricao');
            $table->enum('tipo', [
                'NENHUM',
                'ADMINISTRATIVO',
                'ACADEMICO',
                'FINANCEIRO',
                'TI',
                'OUTRO'
            ])->default('NENHUM');
            $table->string('email')->nullable();
            $table->foreignId('funcionario_responsavel_id')
                ->nullable()
                ->nullOnDelete();
            $table->enum('status', ['ATIVO', 'INATIVO'])->default('ATIVO');
            $table->timestamps();

            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('setores');
    }
};