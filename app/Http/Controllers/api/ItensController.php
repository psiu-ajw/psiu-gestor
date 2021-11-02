<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Itens;
use App\Models\Projeto;
use Illuminate\Http\Request;

class ItensController extends Controller
{
    public function index($projeto)
    {
        if (Projeto::where('id', $projeto)->exists()) {
            $projeto = Projeto::find($projeto);
            return response($projeto->itens, 200);
        }else {
            return response()->json([
                "message" => "Projeto não encontrado."
                ], 404);
        }
    }
}
