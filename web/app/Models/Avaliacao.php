<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;

    protected $table = 'avaliacao';

    public function _cliente(){
        $this->hasOne('App\Models\Cliente',
                        'id', 'cliente_id');
    }

    public function _veterinario(){
        $this->hasOne('App\Models\Veterinario',
                        'id', 'veterinario_id');
    }
}
