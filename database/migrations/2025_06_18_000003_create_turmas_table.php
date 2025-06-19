<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurmasTable extends Migration
{
    public function up()
    {
        Schema::create('turmas', function (Blueprint $table) {
            $table->bigIncrements('id');
            // Relações principais
            $table->unsignedBigInteger('matriz_curricular_id');
            $table->unsignedBigInteger('periodo_letivo_id');
            $table->unsignedBigInteger('turma_base_id')->nullable();
            $table->unsignedBigInteger('centro_custo_id')->nullable(); // polo
            $table->unsignedBigInteger('professor_responsavel_id')->nullable();

            // Dados principais
            $table->string('nome');
            $table->string('nome_reduzido')->nullable();
            $table->string('descricao')->nullable();
            $table->string('identificador')->nullable();
            $table->string('parecer_descricao')->nullable();
            $table->enum('turno', ['Manhã', 'Tarde', 'Noite', 'EaD', 'Integral'])->default('EaD');
            $table->enum('status', ['ATIVA', 'INATIVA'])->default('ATIVA');

            // Configuração de Notas
            $table->decimal('media_periodo', 5, 2)->default(5);
            $table->decimal('media_minima', 5, 2)->default(5);
            $table->integer('freq_periodo')->default(75);
            $table->decimal('media_recuperacao', 5, 2)->default(5);
            $table->decimal('media_minima_rec', 5, 2)->default(5);
            $table->decimal('nota_minima', 5, 2)->default(0);
            $table->decimal('nota_maxima', 5, 2)->default(10);
            $table->boolean('ne_nota_exame')->default(false);
            $table->boolean('nf_nota_final')->default(false);

            // Info Complementares
            $table->string('cidade')->nullable();
            $table->date('data_inicio')->nullable();
            $table->date('data_termino')->nullable();
            $table->string('formato_venda')->nullable();
            $table->string('inep_id')->nullable();
            $table->string('seguro_escolar')->nullable();
            $table->date('fech_diario')->nullable();
            $table->date('data_limite_matriculas')->nullable();
            $table->date('data_abono_faltas')->nullable();
            $table->text('observacoes')->nullable();
            $table->boolean('nucleo_comum')->default(false);
            $table->boolean('acesso_biblioteca')->default(false);
            $table->boolean('acesso_blackboard')->default(false);
            $table->boolean('atendimento_online')->default(false);

            $table->timestamps();

            // FKs
            $table->foreign('matriz_curricular_id')->references('id')->on('matrizes_curriculares')->onDelete('set null');
            $table->foreign('periodo_letivo_id')->references('id')->on('periodos_letivos')->onDelete('set null');
            // $table->foreign('turma_base_id')->references('id')->on('turmas')->onDelete('set null');
            $table->foreign('centro_custo_id')->references('id')->on('polos')->onDelete('set null');
            $table->foreign('professor_responsavel_id')->references('id')->on('perfis')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('turmas');
    }
}

