<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Projeto extends Model
{
    use HasFactory, SoftDeletes;

    public const FINANCIADOR_ENUM = ['Prefeitura de Recife', 'Prefeitura de Olinda'];
    public const STATUS_ENUM = ['Ativo', 'Desativado '];

    protected $fillable = [
        'nome_projeto',
        'area_projeto',
        'pontuacao'
    ];

    public function Itensprojeto()
    {
        return $this->hasMany(Itens::class, 'id_projeto');
    }

    public function itens()
    {
        return $this->belongsToMany(Itens::class, 'itens_projetos', 'id_projeto', 'id_item');
    }
}
