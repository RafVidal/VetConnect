<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriaMedicacao extends Migration
{

    public function up()
    {
        Schema::create('medicacao', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('medicamento', 45);
            $table->text('descricao');
            $table->string('dosagem', 50);
            $table->integer('intervalo');
            $table->datetime('data_fim');
            /*$table->unsignedBigInteger('animal_id');
            $table->foreign('animal_id')->references('id')->on('animal');
            $table->unsignedBigInteger('veterinario_id');
            $table->foreign('veterinario_id')->references('id')->on('users');
            */
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('medicacao');
        Schema::enableForeignKeyConstraints();
    }
}
