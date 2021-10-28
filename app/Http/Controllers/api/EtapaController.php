<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Etapa;
use App\Models\Projeto;
use Illuminate\Http\Request;

class EtapaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($projeto)
    {
        if (Projeto::where('id', $projeto)->exists()) {
            if (Etapa::where('id_projeto', $projeto)->exists()) {
                $etapas = Etapa::where('id_projeto', $projeto)->get();
                return response($etapas, 200);
            } else {
                return response()->json([
                    "message" => "Nenhum etapa para este projeto."
                    ], 404);
            }
            
        }else {
            return response()->json([
                "message" => "Projeto não encontrado."
                ], 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
}
