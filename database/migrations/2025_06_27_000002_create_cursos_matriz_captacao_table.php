<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('cursos_matriz_captacao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_matriz_captacao')->constrained('matriz_captacao')->cascadeOnDelete();
            $table->foreignId('id_curso')->constrained('cursos')->cascadeOnDelete();
            $table->enum('status', ['Ativo', 'Inativo'])->default('Ativo');
            $table->enum('modalidade', ['Presencial', 'EaD'])->default('EaD');
            $table->integer('quantidade_vagas')->default(0);
            $table->timestamps();

            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
    }
    public function down()
    {
        Schema::dropIfExists('cursos_matriz_captacao');
    }
};