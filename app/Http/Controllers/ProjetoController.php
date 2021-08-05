<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use App\Models\TiposProjeto;
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
        $itens = TiposProjeto::all();
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

        
        $projeto =  new Projeto();
        $projeto->nome_projeto = $request->nome_projeto;
        $projeto->area_projeto = $request->area_projeto;
        $projeto->pontuacao = $request->pontuacao;
        $projeto->tipo_projeto_id = $request->item_id;
        $projeto->financiador = $request->financiador;
        //dd($projeto);
        $projeto->save();

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
