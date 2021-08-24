<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medicacao;
use \Carbon\Carbon;


class MedicacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $medicacao                      = new Medicacao;
        $medicacao->medicamento         = "Aprazolam";
        $medicacao->descricao           = "Para impedir movimentos repetitivos que provocam a lesão. ";
        $medicacao->dosagem             = "1 comprimido 2mg";
        $medicacao->intervalo           = 12;
        $medicacao->data_fim            = Carbon::createFromFormat('d/m/Y H:i', '24/12/2021 10:00');
        $medicacao->animal_id           = 1;
        $medicacao->veterinario_id      = 1;
        $medicacao->save();

    }
}
