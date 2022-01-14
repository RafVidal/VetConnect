<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriaAvaliacao extends Migration
{
    public function up()
    {
        Schema::create('avaliacao', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('cliente');
            $table->unsignedBigInteger('veterinario_id');
            $table->foreign('veterinario_id')->references('id')->on('users');
            $table->boolean('avaliacao');
            $table->string('descricao',200);
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('avaliacao');
        Schema::enableForeignKeyConstraints();
    }
}
