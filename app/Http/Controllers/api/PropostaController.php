<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Itens;
use App\Models\ItensProposta;
use App\Models\Proposta;
use Illuminate\Http\Request;

class PropostaController extends Controller
{
    
    public function store(Request $request)
    {
        $proposta = new Proposta();
        $proposta->morador_id = $request->input('morador_id');
        $proposta->projeto_id = $request->input('projeto_id');
        
        if( $proposta->save() ){
            foreach(explode(",", $request->itens) as $item)
            {   $itens_proposta =  new ItensProposta();
                $itens_proposta->proposta_id = $proposta->id;
                $itens_proposta->itens_id = $item;
                $itens_proposta->save();
            }
            return response()->json(["proposta" => $proposta, "message" => "Proposta cadastrada com sucesso"], 200);
        }else{
            return response()->json(["message" => "Não foi possível cadastrar a proposta."], 404);
        }
    }

    public function show($id) {
        if (Proposta::where('id', $id)->exists()) {
            $proposta = Proposta::find($id);
            $proposta->itens;
            return response($proposta, 200);
          } else {
            return response([], 200);
          }
      }

}
