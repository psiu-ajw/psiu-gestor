<?php

namespace App\Http\Controllers;

use App\Models\Itens;
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
        $itens = Itens::all();
        return view ('listItens', ['itens' => $itens]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('createItem');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'item_nome' =>  'required|min:6',
        ]);



        $item = new Itens();
        $$item->nome_projeto = $request->item_nome;
        if(strlen($request->item_nome) < 6)
        {
            return redirect()->back()->withErros(['item_nome' => 'Numero de caracteres tem que ser maior que 6'])->withInput();
        }


        $tipoProjeto->save();
        return redirect(route('index.item'))->with(['status' => "Item Criado com sucesso!"]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tipos__projeto  $tipos__projeto
     * @return \Illuminate\Http\Response
     */
    public function show(Itens $item)
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
       $item = Itens::find($request->id);

       return view ('editItem', ['item' => $item]);
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
            'item_projeto' =>  'required|min:6'
        ]);
        //dd($request);
        $item = Itens::findOrFail($request->id);
        $item->update($request->all());



        return redirect()->route('index.item')->with('status', 'Item editado com sucesso!!!');
    }


    public function delete($id)
    {
        $item = Itens::find($id);
        $item->delete();
        return redirect()->route('index.item');
    }
}
