<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriaVeterinario extends Migration
{

    public function up()
    {
        Schema::create('veterinario', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('img_vet')->nullable();
            $table->string('nome', 45);
            $table->text('descricao');
            $table->string('atende_domiciliar');
            $table->string('telefone', 15);
            $table->string('estado', 2);
            $table->string('CEP', 10);
            $table->string('cidade', 45);
            $table->string('bairro', 45);
            $table->string('rua', 80);
            $table->string('numero', 5)->nullable();
            $table->string('complemento', 45)->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('veterinario');
        Schema::enableForeignKeyConstraints();
    }
}
