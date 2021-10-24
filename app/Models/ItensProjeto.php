<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItensProjeto extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillalbe = ['id_item', 'id_projeto', 'pontuacao_item'];

    public function projetos()
    {
        return $this->belongsTo(Projeto::class, 'id_projeto');
    }

    public function itens()
    {
        return $this->belongsTo(Itens::class, 'id_item');
    }
}
