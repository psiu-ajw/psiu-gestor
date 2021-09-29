<?php

namespace App\Http\Controllers;

use App\Models\Itens;
use App\Models\Projeto;
use App\Models\ItensProjeto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projetos = Projeto::all();
        return view ('Project/lista', ['projetos' => $projetos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $itens = Itens::all();
        //dd($itens);
        $financiadores = Projeto::FINANCIADOR_ENUM;
        return view ('Project/criarProjeto', ['itens' => $itens], ['financiadores' => $financiadores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'nome_projeto' =>  'required|min:6',
            'area_projeto' =>  'required'
            //'tipo_projeto_id' => 'required',
            //'financiador' => 'required',

        ]);

        //dd($request);

        $itens = Itens::all();

        $projeto =  new Projeto();
        $projeto->nome_projeto = $request->nome_projeto;
        $projeto->area_projeto = $request->area_projeto;
        $projeto->pontuacao = $request->pontuacao;
        $projeto->financiador = $request->financiador;
        //dd($projeto);
        $projeto->save();
        return view ('Project/insertItem', ['itens' => $itens], ['projeto' => $projeto]);

        //return redirect()->route('index.project')->with(['status' => "Projeto Criado com sucessso!!"]);

        //dd($request->itens_select);

        //return redirect()->route('index.project')->with(['status' => "Projeto Criado com sucessso!!"]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function insertItem (Request $request)
    {
        $pontuacao = 0;
        foreach($request->itens_select as $item_id) 
        {   $itens_projeto =  new ItensProjeto();
            $itens_projeto->id_projeto = $request->projeto_id;
            $itens_projeto->id_item = $item_id;
            
            $item = Itens::findOrFail($item_id);
            $projeto = Projeto::findOrFail($request->projeto_id);
            $pontuacao += $item->pontuacao_item;
            if ($projeto->pontuacao < $pontuacao) {
                //return redirect()->back()->withErros(['item_id' => 'Numero de caracteres tem que ser maior que 6'])->withInput();
                return redirect()->back()->withErrors([
                    "itens_select" => "Informe o tipo de cadastro."
                ])->withInput();
                //return view ('Project/insertItem', ['itens' => $itens], ['projeto' => $projeto]);
                
                //return false;
            }
            
            $itens_projeto->save();
        }

        return redirect()->route('index.project')->with(['status' => "Projeto Criado com sucessso!!"]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $projeto = Projeto::find($request->id);
        //dd($projeto);

        return view ('Project/editarProjeto', ['projeto' => $projeto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $projeto = Projeto::findOrFail($request->id);
        $projeto->update($request->all());

        return redirect()->route('index.project')->with('status', 'Projeto editado com sucesso!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $projeto = Projeto::find($id);
        //dd($projeto);
        $projeto->delete();

        return redirect()->route('index.project');
    }
}
