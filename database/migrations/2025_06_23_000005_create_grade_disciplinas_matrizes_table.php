<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('grade_disciplinas_matrizes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('matriz_curricular_id')
                ->constrained('matrizes_curriculares')
                ->onDelete('cascade');
            $table->foreignId('disciplina_id')
                ->constrained('disciplinas')
                ->onDelete('cascade');
            $table->timestamps();

            $table->unsignedBigInteger('id_estrutura')->default(1)->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('grade_disciplinas_matrizes');
    }
};
