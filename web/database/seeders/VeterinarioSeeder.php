<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Veterinario;
use App\Models\User;

class VeterinarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Cria o veterinário
        $veterinario                        = new Veterinario;
        $veterinario->nome                  = 'Veterinário de testes';
        $veterinario->CEP                   = '12345-987';
        $veterinario->descricao             = 'Olá, eu sou um veterinário criado para testar a aplicação!!';
        $veterinario->atende_domiciliar     = true;
        $veterinario->telefone              = '(37) 988352002';
        $veterinario->estado                = 'MG';
        $veterinario->cidade                = 'Lagoa da Prata';
        $veterinario->bairro                = 'Centro';
        $veterinario->rua                   = 'Afonso Pena';
        $veterinario->save();

        //Cria o usuário para o veterinário
        $user                               = new User;
        $user->email                        = 'veterinario@email.com';
        $user->password                     = bcrypt('veterinario!senha');
        $user->veterinario_id               = $veterinario->id;
        $user->veterinario                  = true;
        $user->cliente                      = false;
        $user->save();

    }
}
