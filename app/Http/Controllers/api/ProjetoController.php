<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Projeto;


class ProjetoController extends Controller
{

    public function index()
    {
        return Projeto::all();
    }

    public function show($id) {
        if (Projeto::where('id', $id)->exists()) {
            $projeto = Projeto::find($id);
            $projeto->itens;
            return response($projeto, 200);
          } else {
            return response()->json([
              "message" => "Projeto não encontrado"
            ], 404);
          }
      }
}
