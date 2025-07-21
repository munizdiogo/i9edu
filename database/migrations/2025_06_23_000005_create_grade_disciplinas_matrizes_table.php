<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('grade_disciplinas_matrizes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_matriz_curricular')
                ->constrained('matrizes_curriculares')
                ->onDelete('cascade');
            $table->foreignId('id_disciplina')
                ->constrained('disciplinas')
                ->onDelete('cascade');
            $table->timestamps();

            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('grade_disciplinas_matrizes');
    }
};
