<?php

namespace App\Http\Controllers;

//use App\Models\Community;
use App\Models\Community;
use App\Models\Projeto;
use App\Models\Itens;
use App\Models\Projetos;
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

        $projeto =  new Projeto();
        $projeto->nome_projeto = $request->nome_projeto;
        $projeto->community_id = $request->community_id;
        $projeto->pontuacao = $request->pontuacao;
        $projeto->financiador = $request->financiador;
        $projeto->save();
        if($request->itens_select){
            foreach($request->itens_select as $item_id) {
                $itens_projeto = new ItensProjeto();
                $itens_projeto->id_projeto = $projeto->id;
                $itens_projeto->id_item = $item_id;
                $itens_projeto->pontuacao_item = 0;
                $itens_projeto->save();
            }
            $itens = ItensProjeto::where('id_projeto', '=', $projeto->id)
                ->join('itens', 'itens_projetos.id_item', '=', 'itens.id')->get();
            $arrayPoint = [];
    
            return view ('Project/insertPointItem', ['itens' => $itens], ['projeto' => $projeto->id], ['array' => $arrayPoint]);
        }
        return view ('Project/show', ['projeto' => $projeto]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function insertItem (Request $request)
    {
        $count = 0;
        $itemProjeto = ItensProjeto::where('id_projeto', '=', $request->id)->get();
        foreach ($itemProjeto as $item) {
            foreach ($request->pontuacao_item as $point) {
                $item->pontuacao_item = $request->pontuacao_item[$item->id_item][0];
                $item->update();
                $count++;
            }
        }
        return redirect()->route('index.project')->with('status', 'Projeto editado com sucesso!!!');

    }

    public function insertPointItem (Request $request)
    {
        $id = $_GET['projeto_id'];
        $itemProjeto = ItensProjeto::findOrFail();
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

    public function show($id){
        $projeto = Projeto::find($id);
        $projeto->comunidade;
        $projeto->itens;
        return view ('Project/show', ['projeto' => $projeto]);
    }
}
