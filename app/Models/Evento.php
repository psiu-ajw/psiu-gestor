<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evento extends Model
{
    use HasFactory, SoftDeletes;

    public const FINANCIADOR_ENUM = ['Prefeitura de Recife', 'Prefeitura de Olinda'];
    public const STATUS_ENUM = ['Ativo', 'Desativado'];

    protected $fillable = [
        'nome_evento',
        'area_evento',
        'pontuacao'
    ];

    public function tipos_evento()
    {
        return $this->belongsTo(TiposEvento::class, 'tipo_evento_id');
    }
}
