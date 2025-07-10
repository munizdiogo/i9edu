<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('etapas_periodos_letivos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->string('descricao');
            $table->enum('status', ['Ativo', 'Inativo'])->default('Ativo');
            $table->foreignId('periodo_letivo_id')
                ->constrained('periodos_letivos')
                ->onDelete('cascade');
            $table->timestamps();

            $table->unsignedBigInteger('id_estrutura')->default(1)->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('etapas_periodos_letivos');
    }
};