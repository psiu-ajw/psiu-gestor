<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Morador extends Model
{
    use HasFactory;

    protected $fillalbe = ['cpf', 'data_nascimento', 'estado_civil', 'raca', 'bairro_comunidade'];

    public function comunidades()
    {
        return $this->belongsTo(Community::class, 'comunidade');
    }
}
