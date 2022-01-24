<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'img_pet',
        'nome',
        'especie',
        'raca',
        'sexo',
        'cor',
        'nascimento',
        'cliente_id',
    ];

    protected $table = 'animal';
    public $timestamps = false;

    public function cliente(){
        return $this->hasOne(Cliente::class, 'id', 'cliente_id');
    }
}
