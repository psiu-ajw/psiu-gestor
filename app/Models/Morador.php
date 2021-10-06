<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Morador extends Model
{
    use HasFactory;

    protected $fillalbe = ['cpf', 'data_nascimento', 'sexo', 'estado_civil', 'cor_da_pele', 'comunidade'];

    public function comunidades()
    {
        return $this->belongsTo(Community::class, 'comunidade');
    }
}
