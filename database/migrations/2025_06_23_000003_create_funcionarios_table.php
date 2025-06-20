<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->integer('codigo')->unique();
            // FK para Perfil
            $table->foreignId('perfil_id')->constrained('perfis')->cascadeOnDelete();
            $table->string('nome_conjuge')->nullable();
            $table->string('fone_conjuge')->nullable();
            $table->integer('nr_dependentes')->default(0);
            $table->string('email_empresa')->nullable();
            $table->string('senha_email')->nullable();
            $table->enum('status', ['Ativo', 'Inativo'])->default('Ativo');
            $table->date('data_admissao')->nullable();
            $table->date('data_demissao')->nullable();
            // FK para Setor e Função
            $table->foreignId('setor_id')->nullable()->constrained('setores')->nullOnDelete();
            $table->foreignId('funcao_id')->nullable()->constrained('funcoes')->nullOnDelete();
            $table->string('nr_folha')->nullable();
            $table->integer('nr_horas_mes')->nullable();
            $table->enum('tipo_contrato', ['Não informado', 'CLT', 'PJ', 'Autônomo'])->default('Não informado');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('funcionarios');
    }
};