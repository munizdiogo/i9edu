<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Ex: disciplinas.view, disciplinas.edit
            $table->string('label'); // Ex: Visualizar Disciplinas
            $table->string('collection'); // Ex: Disciplinas, Inscrições, Instituições
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
