<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];


    public function projetos()
    {
        return $this->hasMany(Projeto::class);
    }
}
