<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Itens extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['item_nome'];

    public function projetos()
    {
        return $this->hasMany(Projeto::class);
    }
}
