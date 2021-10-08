<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\Projeto;
use App\Models\Itens;
use App\Models\ItensProjeto;
use Illuminate\Http\Request;

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
        $comunidades = Community::all();
        $financiadores = Projeto::FINANCIADOR_ENUM;
        return view ('Project/criarProjeto', ['itens' => $itens, 'comunidades' => $comunidades], ['financiadores' => $financiadores]);
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
            'nome_projeto' =>  'required',
            //'area_projeto' =>  'required'
            //'tipo_projeto_id' => 'required',
            //'financiador' => 'required',

        ]);


        $projeto =  new Projeto();
        $projeto->nome_projeto = $request->nome_projeto;
        $projeto->community_id = $request->community_id;
        $projeto->pontuacao = $request->pontuacao;
        $projeto->financiador = $request->financiador;
        //dd($projeto);

        //dd($request->itens_select);

        $projeto->save();

        foreach($request->itens_select as $item_id)

        {   $itens_projeto =  new ItensProjeto();
            $itens_projeto->id_projeto = $projeto->id;
            $itens_projeto->id_item = $item_id;
            $itens_projeto->save();
        }



        return redirect()->route('index.project')->with(['status' => "Projeto Criado com sucessso!!"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function show(Projeto $projeto)
    {
        //
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
        $comunidades = Community::all();
        //dd($projeto);
        return view ('Project/editarProjeto', ['projeto' => $projeto, 'comunidades' => $comunidades]);
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
