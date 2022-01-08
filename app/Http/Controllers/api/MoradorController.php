<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Morador;
use App\Http\Resources\Morador as MoradorResource;
use App\Models\Projeto;
use App\Models\Proposta;
use Illuminate\Support\Facades\DB;

class MoradorController extends Controller
{
    public function index()
    {
        return Morador::all();
    }

    public function store(Request $request){

        $morador = new Morador();
        
        if(Morador::where('cpf', sha1($request->input('cpf')))->exists()){
            $morador = Morador::where('cpf', sha1($request->input('cpf')))->first();
            $morador->comunidade->projetos;
            if(Proposta::where('morador_id', $morador->id)->exists()){
                $morador->proposta->itens;
            }
            return response()->json(["morador" => $morador, "message" => "CPF já cadastrado"], 200);
        }else{
            $morador->cpf =  sha1($request->input('cpf'));
            $morador->data_nascimento = $request->input('data_nascimento');
            $morador->estado_civil = $request->input('estado_civil');
            $morador->raca = $request->input('raca');
            $morador->bairro_comunidade = $request->input('bairro_comunidade');
            
            if( $morador->save() ){
                $morador->comunidade->projetos;
                return response()->json(["morador" => $morador, "message" => "Cadastro realizado com sucesso"], 200);
            }else{
                return response()->json(["message" => "Não foi possível cadastrar o morador."], 404);
            }
        }
        
    }

    public function get2(Request $request){
        if(Morador::where('id', $request->input('id'))->exists()){
            $morador = Morador::find($request->id);
            $morador->comunidade->projetos;
            if(Proposta::where('morador_id', $morador->id)->exists()){
                $morador->proposta->itens;
            }
            return response()->json(["morador" => $morador, "message" => "CPF já cadastrado"], 200);
        }else{
            return response()->json(["message" => "Morador não encontrado."], 404);
        }
    }

    public function get($id)
    {
        if(Morador::where('id', $id)->exists()){
            $morador = Morador::find($id);
            $morador->comunidade->projetos;
            if(Proposta::where('morador_id', $morador->id)->exists()){
                $morador->proposta->itens;
            }
            return response()->json(["morador" => $morador, "message" => "CPF já cadastrado"], 200);         
        }else {
            return response()->json(["message" => "Morador não encontrado."], 404);
        }
    }
}
