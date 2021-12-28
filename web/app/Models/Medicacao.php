<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'medicamento',
        'descricao',
        'dosagem',
        'intervalo',
        'data_fim',
    /*  'animal_id',
        'veterinario_id',
    */
    ];

    protected $table = 'medicacao';
    protected $dates = ['data_fim'];
    public $timestamps = false;

    public function _animal(){
        $this->hasOne('App\Models\Animal',
                        'id', 'animal_id');
    }

    public function _veterinario(){
        $this->hasOne('App\Models\Veterinario',
                        'id', 'veterinario_id');
    }
}
