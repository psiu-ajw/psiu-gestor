<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etapa extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_projeto', 
        'titulo',
        'descricao',
        'andamento',
    ];

    public function projeto()
    {
        return $this->belongsTo(Projeto::class);
    }

}
