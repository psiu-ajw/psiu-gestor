<?php

namespace App\Http\Controllers;

use App\Models\TiposProjeto;
use Illuminate\Http\Request;

class TiposProjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoProjeto = TiposProjeto::all();
        return view ('listProject', ['tipoProjeto' => $tipoProjeto]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('createTypeProject');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request);

        $request->validate([
            'nome_projeto' =>  'required|min:6'
        ]);

        $tipoProjeto = new TiposProjeto;
        $tipoProjeto->nome_projeto = $request->nome_projeto;
        if(strlen($request->nome_projeto) < 6)
        {
            return redirect()->back()->withErros(['nome_projeto' => 'Numero de caracteres tem que ser maior que 6'])->withInput();
        }


        $tipoProjeto->save();
        return redirect(route('index.item'))->with(['mensagem' => "Item Criado com sucesso!"]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tipos__projeto  $tipos__projeto
     * @return \Illuminate\Http\Response
     */
    public function show(TiposProjeto $tiposProjeto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tipos__projeto  $tipos__projeto
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
       $item = TiposProjeto::find($request->id);
    
       return view ('editItemProject', ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tipos__projeto  $tipos__projeto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'nome_projeto' =>  'required|min:6'
        ]);
        //dd($request);
        $item = TiposProjeto::findOrFail($request->id);
        $item->update($request->all());

      

        return redirect()->route('index.item')->with('mensagem', 'Item editado com sucesso!!!');
    }

  
    public function delete($id)
    {  
        $item = TiposProjeto::find($id);
        $item->delete();
        return redirect()->route('index.item');
    }
}
