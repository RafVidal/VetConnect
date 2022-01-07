<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartaoDeVacinacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'descricao',
        'data',
    /*  'animal_id',
        'veterinario_id',
    */
    ];

    protected $table = 'cartao_de_vacinacao';
    public $timestamps = false;

    public function _vacina(){
        $this->hasOne('App\Models\Vacina',
                        'id', 'vacina_id');
    }

    public function _animal(){
        $this->hasOne('App\Models\Animal',
                        'id', 'animal_id');
    }

}
