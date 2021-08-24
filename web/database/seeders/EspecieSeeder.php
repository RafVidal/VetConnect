<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Especie;

class EspecieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $especie                            = new Especie;
        $especie->nome                      = 'Especie de testes';
        $especie->descricao                 = 'Características da espécie!!';
        $especie->save();
    }
}
