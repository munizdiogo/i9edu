<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('disciplinas', function (Blueprint $table) {
            $table->id();
            // relacionamentos
            $table->foreignId('disciplina_base_id')->constrained('disciplinas_base')->onDelete('cascade');
            $table->foreignId('etapa_periodo_letivo_id')->constrained('etapas_periodos_letivos')->onDelete('cascade');
            $table->foreignId('id_modulo')->constrained('modulos')->onDelete('cascade');
            // dados principais
            $table->string('descricao');
            $table->string('nome_reduzido');
            $table->enum('modalidade', ['Presencial', 'EaD'])->default('EaD');
            $table->foreignId('professor_padrao_id')->nullable()->constrained('professores')->nullOnDelete();
            $table->string('codigo_mec')->nullable();
            $table->string('codigo_inep')->nullable();
            $table->foreignId('area_conhecimento_id')->nullable()->constrained('area_conhecimentos')->nullOnDelete();
            // carga horária
            $table->integer('ch_padrao')->default(0);
            $table->integer('ch_cobrada')->default(0);
            $table->integer('ch_teorica')->default(0);
            $table->integer('ch_pratica')->default(0);
            $table->decimal('ch_corrida', 8, 2)->default(0);
            $table->integer('ch_extensao')->default(0);
            $table->integer('ch_presencial')->default(0);
            $table->integer('ch_ead')->default(0);
            $table->integer('qtd_aulas')->default(0);
            $table->decimal('creditos', 5, 2)->default(0);
            $table->boolean('utiliza_freq_resumida')->default(false);
            // avaliação
            $table->enum('avaliacao', ['Por Nota', 'Conceito'])->default('Por Nota');
            $table->string('tipo_avaliacao')->default('Disciplina');
            $table->enum('obrigatoriedade', ['Obrigatória', 'Optativa'])->default('Obrigatória');
            $table->enum('complementaridade', ['Não Informado', 'Sim', 'Não'])->default('Não Informado');
            $table->foreignId('area_avaliacao_id')->nullable()->constrained('area_conhecimentos')->nullOnDelete();
            // opções extras
            $table->boolean('disciplina_tcc')->default(false);
            $table->boolean('nao_apresentar_nota')->default(false);
            $table->boolean('reprovar_por_frequencia')->default(false);
            $table->boolean('nao_apresentar_frequencia')->default(false);
            $table->boolean('nao_contabilizar_reprovacao')->default(false);
            $table->boolean('nao_enviar_educacenso')->default(false);
            // rematrícula
            $table->boolean('nao_validar_conflito')->default(false);
            $table->boolean('nao_contar_minimo')->default(false);
            $table->decimal('ter_cursado_pct', 5, 2)->nullable();
            // timestamps
            $table->timestamps();

            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('disciplinas');
    }
};