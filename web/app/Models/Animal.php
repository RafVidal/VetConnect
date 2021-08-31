<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Animal extends Model
{
    use HasFactory;

    use SoftDeletes;

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
