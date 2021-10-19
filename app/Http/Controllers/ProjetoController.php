<?php

namespace App\Http\Controllers;

//use App\Models\Community;
use App\Models\Projeto;
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

        //dd($request);

        $itens = Itens::all();

        $projeto =  new Projeto();
        $projeto->nome_projeto = $request->nome_projeto;
        $projeto->community_id = $request->community_id;
        $projeto->pontuacao = $request->pontuacao;
        $projeto->financiador = $request->financiador;
        //dd($projeto);
        $projeto->save();
        return view ('Project/insertItem', ['itens' => $itens], ['projeto' => $projeto]);

        //return redirect()->route('index.project')->with(['status' => "Projeto Criado com sucessso!!"]);

        //dd($request->itens_select);

        $projeto->save();

        foreach($request->itens_select as $item_id)

        {   $itens_projeto =  new ItensProjeto();
            $itens_projeto->id_projeto = $projeto->id;
            $itens_projeto->id_item = $item_id;
            $itens_projeto->save();
        }


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
        if($request == null ) {
            return redirect()->back()->withErrors([
                "itens_select" => "Informe um item."
            ])->withInput();
        }
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
