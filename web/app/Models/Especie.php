<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    use HasFactory;

    protected $table = 'especie';

    public $timestamps = false;

    public function _animal(){
        $this->belongsTo('App\Models\Animal',
                            'id' /*chave local*/, 'especie_id'/*chave estrangeira na tabela destino*/);
    }
}
