<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Informes;
use App\Models\Projeto;

class InformesController extends Controller
{
    public function index($projeto)
    {
        if (Projeto::where('id', $projeto)->exists()) {
            if (Informes::where('id_projeto', $projeto)->exists()) {
                $informes = Informes::where('id_projeto', $projeto)->get();
                //dd($informes);
                return response($informes, 200);
            } else {
                return response()->json([
                    "message" => "Nenhum informe para este projeto."
                    ], 404);
            }
            
        }else {
            return response()->json([
                "message" => "Projeto não encontrado."
                ], 404);
        }
    }

}
