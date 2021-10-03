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
        $morador = new Morador();
        $morador->cpf =  sha1($request->input('cpf'));
        $morador->data_nascimento = $request->input('data_nascimento');
        $morador->sexo = $request->input('sexo');
        $morador->estado_civil = $request->input('estado_civil');
        $morador->cor_da_pele = $request->input('cor_da_pele');
        $morador->comunidade = $request->input('comunidade');

    
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
