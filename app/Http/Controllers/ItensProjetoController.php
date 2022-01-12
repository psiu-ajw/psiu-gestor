<?php

namespace App\Http\Controllers;

use App\Models\Itens;
use App\Models\ItensProjeto;
use App\Models\Projeto;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class ItensProjetoController extends Controller
{
    public function edit($id)
    {
        $itemProjeto = ItensProjeto::find($id);
        return view ('itensProjeto/edit', ['itemProjeto' => $itemProjeto]);
    }
    
    public function update(Request $request)
    {
        $itemProjeto = ItensProjeto::find($request->id);
        $itemProjeto->pontuacao_item =  $request->pontuacao_item;
        $itemProjeto->update();
        return redirect()->action(
            [ProjetoController::class, 'show'], ['id' => $itemProjeto->id_projeto]
        )->with('status', 'Item editado com sucesso!!!');
    }
    
    public function create($id)
    {
        $projeto = Projeto::find($id);
        $projetoItens = [];
        foreach ($projeto->itens as $item) {
            array_push($projetoItens, $item->id);
        }
        $itens = Itens::select("*")->whereNotIn('id', $projetoItens)->get();
        if(sizeof($itens) == 0){
            return redirect()->action(
                [ProjetoController::class, 'show'], ['id' => $projeto->id]
            )->with('alert', 'Todos os ítens disponíveis já foram adicionados a este projeto.');
        }
        return view ('ItensProjeto/create', ['itens' => $itens, 'projeto' => $projeto]);

    }

    public function store(Request $request)
    {
        $itemProjeto = new ItensProjeto();
        $itemProjeto->id_item = $request->item_id;
        $itemProjeto->id_projeto = $request->projeto_id;
        $itemProjeto->pontuacao_item = $request->pontuacao;

        $itemProjeto->save();
        return redirect()->action(
            [ProjetoController::class, 'show'], ['id' => $itemProjeto->id_projeto]
        )->with('status', 'Item adicionado com sucesso!!!');
    }

    public function destroy($id)
    {   
        $itemProjeto = ItensProjeto::find($id);
        $itemProjeto->delete();
        return redirect()->action(
            [ProjetoController::class, 'show'], ['id' => $itemProjeto->id_projeto]
        )->with('status', 'Item excluído com sucesso!!!');
    }
}
