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
        $vacina->nome                       = 'V8 ou V10';
        $vacina->descricao                  = '6 a 8 semanas/ Previni Leptospirose, Cinomose, Hepatite Infecciona Canina, entre outras...';
        $vacina->obrigatoria                = true;
        $vacina->save();

        $vacina                             = new Vacina;
        $vacina->nome                       = 'V8 ou V10';
        $vacina->descricao                  = '12 semanas/ Previni Leptospirose, Cinomose, Hepatite Infecciona Canina, entre outras...';
        $vacina->obrigatoria                = true;
        $vacina->save();

        $vacina                             = new Vacina;
        $vacina->nome                       = 'Gripe Canina';
        $vacina->descricao                  = '12 semanas/ Previni Adenovírus Canino Tipo 2, Parainfluenenza Canina e Bordetella bronchiseptica.';
        $vacina->obrigatoria                = true;
        $vacina->save();

        $vacina                             = new Vacina;
        $vacina->nome                       = 'Giardíase';
        $vacina->descricao                  = '12 semanas/ Animais em canis,criadores ou locais com muitos cães que vivem em ambiente mais úmido.';
        $vacina->obrigatoria                = true;
        $vacina->save();

        $vacina                             = new Vacina;
        $vacina->nome                       = 'V8 ou V10';
        $vacina->descricao                  = '16 semanas/ Última dose de reforço';
        $vacina->obrigatoria                = true;
        $vacina->save();

        $vacina                             = new Vacina;
        $vacina->nome                       = 'Gripe Canina';
        $vacina->descricao                  = '16 semanas/ Dose de reforço da vacina injetável, a intrasanal é aplicada em dose única';
        $vacina->obrigatoria                = true;
        $vacina->save();

        $vacina                             = new Vacina;
        $vacina->nome                       = 'Giardíase';
        $vacina->descricao                  = '16 semanas/ Segunda dose de reforço.';
        $vacina->obrigatoria                = true;
        $vacina->save();

        $vacina                             = new Vacina;
        $vacina->nome                       = 'Anti-Rábica';
        $vacina->descricao                  = '16 semanas/ Contra a raiva.';
        $vacina->obrigatoria                = true;
        $vacina->save();

    }
}
