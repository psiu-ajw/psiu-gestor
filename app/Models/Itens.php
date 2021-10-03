<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Itens extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['item_nome'];


    public function Itensprojeto()
    {
        return $this->hasMany(Itens::class, 'id_item');
    }

    public function projetos()
    {
        return $this->belongsToMany(Projeto::class);
    }
}
