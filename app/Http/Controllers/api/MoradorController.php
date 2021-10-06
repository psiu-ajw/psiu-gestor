<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Morador;
use App\Http\Resources\Morador as MoradorResource;

class MoradorController extends Controller
{
    public function index()
    {
        return Morador::all();
    }

    public function store(Request $request){

        if(Morador::where('cpf', sha1($request->input('cpf')))->exists()){
            return response()->json(["message" => "CPF já cadastrado."], 404);
        }
        

        $morador = new Morador();
        $morador->cpf =  sha1($request->input('cpf'));
        $morador->data_nascimento = $request->input('data_nascimento');
        $morador->estado_civil = $request->input('estado_civil');
        $morador->raca = $request->input('raca');
        $morador->bairro_comunidade = $request->input('bairro_comunidade');

    
        if( $morador->save() ){
          return new MoradorResource( $morador );
        }
      }

    
    public function show($id)
    {
        //
    }
    
    public function update(Request $request, $id)
    {
        //
    }

}
