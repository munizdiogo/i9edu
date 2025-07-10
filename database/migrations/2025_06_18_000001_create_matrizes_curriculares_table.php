<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatrizesCurricularesTable extends Migration
{
    public function up()
    {
        Schema::create('matrizes_curriculares', function (Blueprint $table) {
            $table->bigIncrements('id');
            // Dados principais
            $table->string('nome');
            $table->string('nome_reduzido')->nullable();
            $table->unsignedBigInteger('curso_id');
            $table->unsignedBigInteger('centro_custo_id')->nullable();
            $table->string('habilitacao')->nullable();
            $table->date('data_habilitacao')->nullable();
            $table->enum('status', ['ATIVO', 'INATIVO'])->default('ATIVO');
            $table->enum('modalidade', ['Presencial', 'EaD', 'Híbrido'])->default('Presencial');
            $table->string('inep_id')->nullable();
            $table->date('data_curriculo')->nullable();
            // Configuração de Horas
            $table->integer('tipo_horas_atividades')->default(0);
            $table->integer('min_hr_aula')->default(0);
            $table->decimal('creditos', 5, 2)->default(0);
            $table->integer('carga_horaria')->default(0);
            $table->integer('ch_teorica')->default(0);
            $table->integer('ch_presencial')->default(0);
            $table->integer('ch_ativ_exigidas')->default(0);
            $table->integer('ch_ativ_extensao')->default(0);
            $table->integer('ch_itinerario')->default(0);
            $table->integer('ch_tcc')->default(0);
            $table->integer('ch_estagio')->default(0);
            $table->integer('ch_pratica')->default(0);
            $table->integer('ch_ead')->default(0);
            // Configuração de Notas
            $table->decimal('media_periodo', 5, 2)->default(5);
            $table->decimal('media_minima', 5, 2)->default(5);
            $table->integer('freq_periodo')->default(75);
            $table->decimal('media_recuperacao', 5, 2)->default(5);
            $table->decimal('media_minima_rec', 5, 2)->default(5);
            $table->string('freq_recuperacao')->nullable();
            $table->decimal('nota_minima', 5, 2)->default(0);
            $table->decimal('nota_maxima', 5, 2)->default(10);
            // Configuração de Prazo
            $table->enum('prazo_em', ['Anos', 'Semestres'])->default('Anos');
            $table->integer('prazo_inicial')->default(8);
            $table->integer('prazo_maximo')->default(14);
            $table->string('periodicidade')->default('Semestral');
            $table->boolean('possivel_trancar_1periodo')->default(false);
            $table->timestamps();

            // FKs
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
            $table->foreign('centro_custo_id')->references('id')->on('polos')->onDelete('set null');

            $table->unsignedBigInteger('id_estrutura')->default(1)->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('matrizes_curriculares');
    }
}
