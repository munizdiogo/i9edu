<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('funcoes', function (Blueprint $table) {
            $table->id();
            $table->integer('codigo')->unique();
            $table->string('descricao');
            $table->enum('status', ['Ativo', 'Inativo'])->default('Ativo');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('funcoes');
    }
};