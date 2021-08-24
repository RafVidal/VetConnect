<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $table = 'animal';

    public function _cliente(){
        $this->hasOne('App/Models/Cliente',
                'id', 'cliente_id');
    }
    public function _especie(){
        $this->hasOne('App/Models/Especie',
                'id', 'especie_id');
    }
}
