<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiberacoesCuponsPolosTable extends Migration
{
    public function up()
    {
        Schema::create('liberacoes_cupons_polos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cupom');
            $table->unsignedBigInteger('id_polo');
            $table->integer('quantidade_disponivel')->default(0);
            $table->timestamps();

            $table->foreign('id_cupom')->references('id')->on('cupons')->onDelete('cascade');
            $table->foreign('id_polo')->references('id')->on('polos')->onDelete('cascade');
            $table->unique(['id_cupom', 'id_polo']);

            $table->unsignedBigInteger('id_estrutura')->default(0)->index();
        });
    }

    public function down()
    {
        Schema::dropIfExists('liberacoes_cupons_polos');
    }
}
