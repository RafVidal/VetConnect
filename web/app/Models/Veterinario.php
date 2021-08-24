<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veterinario extends Model
{
    //use HasFactory;

    protected $table = 'veterinario';

    public function _user(){
        $this->belongsTo('App\Models\User',
                            'id' /*chave local*/, 'veterinario_id'/*chave estrangeira na tabela destino*/);
    }
}
