<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposta extends Model
{
    use HasFactory;

    protected $fillable = [
        'morador_id',
        'projeto_id',
    ];

    public function itens()
    {
        return $this->belongsToMany(Itens::class, 'itens_propostas');
    }

    public function projeto()
    {
        return $this->belongsTo(Projeto::class);
    }
}
