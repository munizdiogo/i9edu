<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('requerimentos_assuntos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_requerimento_departamento')->constrained('requerimentos_departamentos')->onDelete('cascade');
            $table->string('descricao');
            $table->decimal('valor', 10, 2)->default(0);
            $table->boolean('sem_valor')->default(false);
            $table->integer('prazo_dias')->default(0);
            $table->integer('quantidade_gratuita')->default(0);
            $table->boolean('permite_portal')->default(false);
            $table->boolean('visualizar_portal')->default(false);
            $table->boolean('bloquear_inadimplente')->default(false);
            $table->boolean('vincular_matricula')->default(false);
            $table->boolean('nao_permitir_se_ja_existe')->default(false);
            $table->boolean('obrigatorio_anexo')->default(false);
            $table->boolean('informar_disciplinas')->default(false);
            $table->boolean('mudanca_curso')->default(false);
            $table->enum('status', ['ATIVO', 'INATIVO'])->default('ATIVO');
            $table->enum('tipo_assunto', ['POLO', 'ALUNO', 'TODOS'])->default('TODOS');
            $table->text('observacoes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('requerimentos_assuntos');
    }
};
