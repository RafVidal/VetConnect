<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriaCartaoDeVacinacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartao_de_vacinacao', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('data');
            $table->text('descricao');
            $table->timestamps();
            $table->unsignedBigInteger('vacina_id');
            $table->foreign('vacina_id')->references('id')->on('vacina');
            $table->unsignedBigInteger('animal_id');
            $table->foreign('animal_id')->references('id')->on('animal');
           
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
        Schema::dropIfExists('cartao_de_vacinacao');
        Schema::enableForeignKeyConstraints();
    }
}
