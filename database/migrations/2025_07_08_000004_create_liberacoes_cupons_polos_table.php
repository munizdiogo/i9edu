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
            $table->unsignedBigInteger('cupom_id');
            $table->unsignedBigInteger('polo_id');
            $table->integer('quantidade_disponivel')->default(0);
            $table->timestamps();

            $table->foreign('cupom_id')->references('id')->on('cupons')->onDelete('cascade');
            $table->foreign('polo_id')->references('id')->on('polos')->onDelete('cascade');
            $table->unique(['cupom_id', 'polo_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('liberacoes_cupons_polos');
    }
}
