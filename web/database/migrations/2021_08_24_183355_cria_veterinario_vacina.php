<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriaVeterinarioVacina extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veterinario_vacina', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('veterinario_id');
            $table->foreign('veterinario_id')->references('id')->on('users');
            $table->unsignedBigInteger('vacina_id');
            $table->foreign('vacina_id')->references('id')->on('vacina');
            $table->boolean('em_estoque');

        });
    }

    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('veterinario_vacina');
        Schema::enableForeignKeyConstraints();
    }
}
