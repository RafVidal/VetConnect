<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;
use App\Models\User;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Cria o veterinário
        $cliente                            = new Cliente;
        $cliente->nome                      = 'Cliente de testes';
        $cliente->telefone                  = '(37) 988122456';
        $cliente->estado                    = 'MG';
        $cliente->CEP                   = '98765-123';
        $cliente->cidade                    = 'Lagoa da Prata';
        $cliente->bairro                    = 'Cidade Jardim';
        $cliente->rua                       = 'Alameda dos Bentivis';
        $cliente->save();

        //Cria o usuário para o veterinário
        $user                               = new User;
        $user->email                        = 'cliente@email.com';
        $user->password                     = bcrypt('cliente!senha');
        $user->cliente_id                   = $cliente->id;
        $user->veterinario                  = false;
        $user->cliente                      = true;
        $user->save();
    }
}
