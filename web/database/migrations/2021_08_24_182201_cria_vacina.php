<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriaVacina extends Migration
{

    public function up()
    {
        Schema::create('vacina', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 45);
            $table->string('idade_animal', 45);
            $table->text('descricao');
            $table->string('obrigatoria');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('vacina');
        Schema::enableForeignKeyConstraints();
    }
}
