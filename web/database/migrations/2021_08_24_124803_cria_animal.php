<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriaAnimal extends Migration
{

    public function up()
    {
        Schema::create('animal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('img_pet')->nullable();
            $table->string('nome', 45);
            $table->string('especie', 45);
            /*$table->unsignedBigInteger('especie_id');
            $table->foreign('especie_id')->references('id')->on('especie');
            */
            $table->string('raca')->nullable();
            $table->string('sexo');
            $table->string('cor', 45);
            $table->string('nascimento');
            /*$table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('cliente');
            */
            $table->timestamps();
            $table->softDeletes();
;
        });
    }

    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('animal');
        Schema::enableForeignKeyConstraints();
    }
}
