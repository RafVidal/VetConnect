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
        $especie->nome                      = 'Cachorro';
        $especie->descricao                 = '';
        $especie->save();

        $especie                            = new Especie;
        $especie->nome                      = 'Gato';
        $especie->descricao                 = '';
        $especie->save();

        $especie                            = new Especie;
        $especie->nome                      = 'Furão';
        $especie->descricao                 = '';
        $especie->save();

        $especie                            = new Especie;
        $especie->nome                      = 'Pássaro';
        $especie->descricao                 = '';
        $especie->save();

        $especie                            = new Especie;
        $especie->nome                      = 'Réptil';
        $especie->descricao                 = '';
        $especie->save();

        $especie                            = new Especie;
        $especie->nome                      = 'Roedor';
        $especie->descricao                 = '';
        $especie->save();

        $especie                            = new Especie;
        $especie->nome                      = 'Outra';
        $especie->descricao                 = '';
        $especie->save();
    }
}
