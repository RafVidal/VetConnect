<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CartaoDeVacinacao;

class CartaoDeVacinacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cartao                             = new CartaoDeVacinacao;
        $cartao ->data                      = '2000/12/12';
        $cartao ->descricao                 = 'Cartao de vacinacao para teste no banco';
        $cartao ->vacina_id                 = 1;
        $cartao ->animal_id                 = 1;
        $cartao ->save();
    }
}
