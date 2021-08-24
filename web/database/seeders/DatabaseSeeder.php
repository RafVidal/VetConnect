<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(VeterinarioSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(EspecieSeeder::class);
        $this->call(AnimalSeeder::class);
        $this->call(MedicacaoSeeder::class);
        $this->call(VacinaSeeder::class);
        $this->call(CartaoDeVacinacaoSeeder::class);
        $this->call(AvaliacaoSeeder::class);
        $this->call(VeterinarioVacinaSeeder::class);
    }
}
