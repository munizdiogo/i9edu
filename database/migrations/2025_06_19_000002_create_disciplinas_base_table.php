<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisciplinasBaseTable extends Migration
{
    public function up()
    {
        Schema::create('disciplinas_base', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo')->unique();
            $table->enum('status', ['Ativo', 'Inativo'])->default('Ativo');
            $table->string('nome');
            $table->string('nome_reduzido')->nullable();
            $table->unsignedBigInteger('area_conhecimento_id')->nullable();
            $table->boolean('equivalencia_automatica')->default(false);
            // carga horária
            $table->integer('ch_padrao')->default(0);
            $table->integer('ch_cobrada')->default(0);
            $table->integer('ch_teorica')->default(0);
            $table->decimal('ch_corrida', 8, 2)->default(0);
            $table->integer('ch_extensao')->default(0);
            $table->integer('ch_presencial')->default(0);
            $table->integer('ch_ead')->default(0);
            $table->integer('ch_pratica')->default(0);
            $table->decimal('creditos', 5, 2)->default(0);
            $table->integer('qtd_aulas')->default(0);
            // avaliação
            $table->enum('avaliacao', ['Por Nota', 'Conceito'])->default('Por Nota');
            $table->string('tipo_avaliacao')->default('Disciplina');
            $table->enum('obrigatoriedade', ['Obrigatória', 'Optativa'])->default('Obrigatória');
            $table->enum('complementaridade', ['Não Informado', 'Sim', 'Não'])->default('Não Informado');
            $table->unsignedBigInteger('area_avaliacao_id')->nullable();
            $table->timestamps();

            // FKs
            $table->foreign('area_conhecimento_id')
                ->references('id')->on('area_conhecimentos')
                ->onDelete('set null');
            $table->foreign('area_avaliacao_id')
                ->references('id')->on('area_conhecimentos')
                ->onDelete('set null');

            $table->unsignedBigInteger('id_estrutura')->default(1)->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('disciplinas_base');
    }
}