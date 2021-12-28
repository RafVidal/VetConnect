<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veterinario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'atende_domiciliar',
        'telefone',
        'estado',
        'CEP',
        'cidade',
        'bairro',
        'rua',
        'numero',
        'complemento',
    ];
    protected $table = 'veterinario';

    public function users(){
        return $this->hasOne(User::class, 'veterinario_id', 'id');
    }
}
