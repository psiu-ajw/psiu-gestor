<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Community;

class CommunityController extends Controller
{

    public function index()
    {
        return Community::all();
    }


    public function show($id) {
        if (Community::where('id', $id)->exists()) {
            $comunidade = Community::find($id);
            $comunidade->projetos;
            return response($comunidade, 200);
          } else {
            return response()->json([
              "message" => "Comunidade não encontrada"
            ], 404);
          }
      }

}
