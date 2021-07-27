<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TiposEvento extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nome_evento'];

    public function eventos()
    {
        return $this->hasMany(Evento::class);
    }
}
