<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informes extends Model
{
    use HasFactory;
    protected $fillable = ['id_projeto', 'txt_informe'];
}
