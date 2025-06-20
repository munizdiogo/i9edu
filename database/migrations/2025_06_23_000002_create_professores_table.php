<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('professores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('funcionario_id')->constrained('funcionarios')->onDelete('cascade');
            $table->foreignId('graduacao_id')->nullable()->constrained('graduacoes')->nullOnDelete();
            $table->foreignId('titulacao_principal_id')->nullable()->constrained('titulacoes')->nullOnDelete();
            $table->enum('tipo_docente', ['Não possui', 'Docente', 'Tutor EAD', 'Docente/Tutor EAD'])->default('Não possui');
            $table->enum('regime_trabalho', ['Não possui', 'CLT', 'Estagiário', 'Outros'])->default('Não possui');
            $table->enum('situacao_docente', ['Não possui', 'Em Exercício', 'Afastado para qualificação', 'Afastado outros motivos', 'Tratamento saúde'])->default('Não possui');
            $table->string('id_inep')->nullable();
            $table->string('registro_docente')->nullable();
            $table->string('nis')->nullable();
            $table->string('tipo_ensino_medio')->nullable();
            $table->string('pos_graduacao')->nullable();
            $table->enum('tipo_contrato', ['Não possui', 'CLT', 'PJ', 'Outro'])->default('Não possui');
            $table->enum('tipo_vinculo', ['Não possui', 'CLT', 'PJ', 'Outro'])->default('Não possui');
            $table->string('cod_urania')->nullable();
            // flags de atuação
            $table->boolean('atuacao_formacao_especifica')->default(false);
            $table->boolean('atuacao_pesquisa')->default(false);
            $table->boolean('atuacao_extensao')->default(false);
            $table->boolean('atuacao_grad_presencial')->default(false);
            $table->boolean('atuacao_pos_grad_presencial')->default(false);
            $table->boolean('atuacao_gestao_plano')->default(false);
            $table->boolean('atuacao_grad_distancia')->default(false);
            $table->boolean('atuacao_pos_grad_distancia')->default(false);
            $table->boolean('atuacao_bolsa_pesquisa')->default(false);
            // timestamps
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('professores');
    }
};