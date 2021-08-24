<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Avaliacao;

class AvaliacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $avaliacao                             = new Avaliacao;
        $avaliacao->cliente_id                 = 1;
        $avaliacao->veterinario_id             = 1;
        $avaliacao->avaliacao                  = '5';
        $avaliacao->descricao                  = 'Veterinario muito bom!!';
        $avaliacao->save();
    }
}
