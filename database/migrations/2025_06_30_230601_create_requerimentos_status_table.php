<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('requerimentos_status', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->string('cor')->nullable();
            $table->enum('status', ['Ativo', 'Inativo'])->default('Ativo');
            $table->boolean('email_encaminhamento_aluno')->default(false);
            $table->boolean('email_encaminhamento_setor')->default(false);
            $table->boolean('permite_encaminhar')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('requerimentos_status');
    }
};