<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VeterinarioVacina extends Model
{
    use HasFactory;

    protected $table = 'veterinario_vacina';

    public $timestamps = false;

    public function _veterinario(){
        $this->hasOne('App\Models\Veterinario',
                        'id', 'veterinario_id');
    }

    public function _vacina(){
        $this->hasOne('App\Models\Vacina',
                        'id', 'vacina_id');
    }

}
