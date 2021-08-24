<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Animal;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $animal                            = new Animal;
        $animal->nome                      = 'Cliente de testes';
        $animal->especie_id                =  1;
        $animal->raca                      = 'Labrador';
        $animal->sexo                      =  1;
        $animal->cor                       = 'Marrom';
        $animal->nascimento                = '2000/12/10';
        $animal->cliente_id                =  1;
        $animal->save();
    }
}
