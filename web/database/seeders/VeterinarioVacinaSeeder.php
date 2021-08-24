<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VeterinarioVacina;

class VeterinarioVacinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vetvac                             = new VeterinarioVacina;
        $vetvac ->veterinario_id            = 1;
        $vetvac ->vacina_id                 = 1;
        $vetvac ->em_estoque                = true;
        $vetvac->save();
    }
}
