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

        $animais = [
            [
                "id"=> 1,
                "nome"=> "Farofa",
                "especie_id"=> 1,
                "raca"=> "Labrador",
                "sexo"=> 1,
                "cor"=> "Marrom",
                "nascimento"=> "2000-12-10",
                "cliente_id"=> 1,
            ],
            [
                "id"=> 2,
                "nome"=> "Laila",
                "especie_id"=> 1,
                "raca"=> "Pastor Alemão",
                "sexo"=> 0,
                "cor"=> "Preta",
                "nascimento"=> "2015-04-12",
                "cliente_id"=> 2,
            ],
            [
                "id"=> 3,
                "nome"=> "Bombom",
                "especie_id"=> 1,
                "raca"=> "Pinscher Tremedera",
                "sexo"=> 1,
                "cor"=> "Preto",
                "nascimento"=> "2010-08-25",
                "cliente_id"=> 4,
            ],
            [
                "id"=> 4,
                "nome"=> "Brida",
                "especie_id"=> 1,
                "raca"=> "Vira-Lata",
                "sexo"=> 0,
                "cor"=> "Bege",
                "nascimento"=> "2006-12-22",
                "cliente_id"=> 2,
            ],
            [
                "id"=> 5,
                "nome"=> "Kira",
                "especie_id"=> 1,
                "raca"=> "Labrador",
                "sexo"=> 0,
                "cor"=> "Branco",
                "nascimento"=> "2014-10-12",
                "cliente_id"=> 2,
            ],
            [
                "id"=> 6,
                "nome"=> "Jonas",
                "especie_id"=> 1,
                "raca"=> "Dobberman",
                "sexo"=> 1,
                "cor"=> "Preto",
                "nascimento"=> "2009-09-25",
                "cliente_id"=> 2,
            ],
            [
                "id"=> 7,
                "nome"=> "Thor",
                "especie_id"=> 1,
                "raca"=> "Boxer",
                "sexo"=> 1,
                "cor"=> "Marrom",
                "nascimento"=> "2009-11-02",
                "cliente_id"=> 2,
            ],
            [
                "id"=> 8,
                "nome"=> "Melancia",
                "especie_id"=> 1,
                "raca"=> "Pitbull",
                "sexo"=> 0,
                "cor"=> "Branca",
                "nascimento"=> "2019-12-23",
                "cliente_id"=> 2,
            ]
        ];
        foreach($animais as $ani){
            $animal                            = new Animal;
            $animal->nome                      = $ani['nome'];
            $animal->especie_id                = $ani['especie_id'];
            $animal->raca                      = $ani['raca'];
            $animal->sexo                      = $ani['sexo'];
            $animal->cor                       = $ani['cor'];
            $animal->nascimento                = $ani['nascimento'];
            $animal->cliente_id                =  1;
            $animal->save();
        }
    }
}
