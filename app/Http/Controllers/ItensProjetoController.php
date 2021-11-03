<?php

namespace App\Http\Controllers;

use App\Models\ItensProjeto;
use Illuminate\Http\Request;

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
    
    
    public function destroy($id)
    {   
        $itemProjeto = ItensProjeto::find($id);
        $itemProjeto->delete();
        return redirect()->action(
            [ProjetoController::class, 'show'], ['id' => $itemProjeto->id_projeto]
        )->with('status', 'Item excluído com sucesso!!!');
    }
}
