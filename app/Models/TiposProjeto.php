<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TiposProjeto extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nome_projeto'];

    public function projetos()
    {
        return $this->hasMany(Projeto::class);
    }
}
