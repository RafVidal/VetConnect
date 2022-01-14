<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vacina;

class VacinaSeeder extends Seeder
{

    public function run()
    {
        $vacina                             = new Vacina;
        $vacina->nome                       = 'V8 ou V10';
        $vacina->idade_animal               = '6 a 8 semanas';
        $vacina->descricao                  = 'Previne Leptospirose, Cinomose, Hepatite Infecciona Canina, entre outras...';
        $vacina->obrigatoria                = true;
        $vacina->save();

        $vacina                             = new Vacina;
        $vacina->nome                       = 'V8 ou V10';
        $vacina->idade_animal               = '12 semanas';
        $vacina->descricao                  = 'Previne Leptospirose, Cinomose, Hepatite Infecciona Canina, entre outras...';
        $vacina->obrigatoria                = true;
        $vacina->save();

        $vacina                             = new Vacina;
        $vacina->nome                       = 'Gripe Canina';
        $vacina->idade_animal               = '12 semanas';
        $vacina->descricao                  = 'Previne Adenovírus Canino Tipo 2, Parainfluenenza Canina e Bordetella bronchiseptica.';
        $vacina->obrigatoria                = true;
        $vacina->save();

        $vacina                             = new Vacina;
        $vacina->nome                       = 'Giardíase';
        $vacina->idade_animal               = '12 semanas';
        $vacina->descricao                  = 'Animais em canis,criadores ou locais com muitos cães que vivem em ambiente mais úmido.';
        $vacina->obrigatoria                = true;
        $vacina->save();

        $vacina                             = new Vacina;
        $vacina->nome                       = 'V8 ou V10';
        $vacina->idade_animal               = '16 semanas';
        $vacina->descricao                  = 'Última dose de reforço';
        $vacina->obrigatoria                = true;
        $vacina->save();

        $vacina                             = new Vacina;
        $vacina->nome                       = 'Gripe Canina';
        $vacina->idade_animal               = '16 semanas';
        $vacina->descricao                  = 'Dose de reforço da vacina injetável, a intrasanal é aplicada em dose única';
        $vacina->obrigatoria                = true;
        $vacina->save();

        $vacina                             = new Vacina;
        $vacina->nome                       = 'Giardíase';
        $vacina->idade_animal               = '16 semanas';
        $vacina->descricao                  = 'Segunda dose de reforço.';
        $vacina->obrigatoria                = true;
        $vacina->save();

        $vacina                             = new Vacina;
        $vacina->nome                       = 'Anti-Rábica';
        $vacina->idade_animal               = '16 semanas';
        $vacina->descricao                  = 'Contra a raiva.';
        $vacina->obrigatoria                = true;
        $vacina->save();

    }
}
