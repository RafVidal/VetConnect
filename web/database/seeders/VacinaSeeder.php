<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vacina;

class VacinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vacina                             = new Vacina;
        $vacina->nome                       = 'Vacina teste';
        $vacina->descricao                  = 'Vacina para testes';
        $vacina->obrigatoria                = true;
        $vacina->save();
    }
}
