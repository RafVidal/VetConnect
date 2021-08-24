<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriaMedicacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicacao', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('medicacao', 45);
            $table->integer('intervalo');
            $table->text('descricao');
            $table->datetime('data_fim');
            $table->unsignedBigInteger('animal_id');
            $table->foreign('animal_id')->references('id')->on('animal');
            $table->unsignedBigInteger('veterinario_id');
            $table->foreign('veterinario_id')->references('id')->on('veterinario');
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
        Schema::dropIfExists('medicacao');
        Schema::enableForeignKeyConstraints();
    }
}
