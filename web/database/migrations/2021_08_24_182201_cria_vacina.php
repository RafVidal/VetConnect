<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriaVacina extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacina', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 45);
            $table->text('descricao');
            $table->boolean('obrigatoria');
            $table->unsignedBigInteger('especie_id');
            $table->foreign('especie_id')->references('id')->on('especie');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('vacina');
        Schema::enableForeignKeyConstraints();
    }
}
