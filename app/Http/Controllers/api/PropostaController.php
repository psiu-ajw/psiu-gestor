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
            return response()->json($proposta, 200);
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

    public function tabuleiro($id)
    {
        
        $propostas = Proposta::where('projeto_id', $id)->get();
        if (sizeof($propostas) == 0) {
            return response()->json(["message" => "Nenhuma proposta para este projetop"], 200);
        }
        
        $itens = [];

        foreach ($propostas[0]->projeto->itens as $item) {
            array_push($itens, [    "item_nome" => $item->item_nome,
                                    "imagem" => $item->imagem,
                                    'quantidade' => 0, 
                                    'pontuacao_item' => $item->pivot->pontuacao_item]);
        }

        foreach ($propostas as $proposta) {
            $i = 0;
            foreach ($itens as $item) {
                foreach ($proposta->itens as $itemProposta):
                    if($itemProposta->item_nome == $item["item_nome"]){
                        $itens[$i]['quantidade']++;
                    }
                endforeach;
                $i++;
            }
            
            
        }

        usort($itens, function($a, $b)
        {
            return strcmp($b['quantidade'], $a['quantidade']);
        });

        $itensTabuleiro = [];
        array_push($itensTabuleiro, array_shift($itens));


        foreach ($itens as $item) {
            $total = array_sum(array_column($itensTabuleiro, "pontuacao_item")) + $item["pontuacao_item"];
            if ($total <=  $propostas[0]->projeto->pontuacao && $item['quantidade'] > 0) {
                array_push($itensTabuleiro, $item);
            }
        }
        
        return response($itensTabuleiro, 200);
    }
}
