<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartaoDeVacinacao extends Model
{
    use HasFactory;

    protected $table = 'cartao_de_vacinacao';

    public function _vacina(){
        $this->hasOne('App\Models\Vacina',
                        'id', 'vacina_id');
    }

    public function _animal(){
        $this->hasOne('App\Models\Animal',
                        'id', 'animal_id');
    }

}
