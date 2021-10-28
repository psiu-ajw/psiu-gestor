<?php

namespace App\Http\Controllers;

use App\Models\Etapa;
use App\Models\Projeto;
use Illuminate\Http\Request;

class EtapaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etapas = Etapa::all();
        foreach($etapas as $etapa) $etapa->projeto = Projeto::find($etapa->id_projeto);
        return view ('etapas/index')->with('etapas', $etapas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projetos = Projeto::all();
        return view ('etapas/create', ['projetos' => $projetos]);
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
            'id_projeto' => 'required',
            'titulo' => 'required',
            'descricao' => 'required'
        ]);
        
        $etapa = new Etapa();
        $etapa->id_projeto = $request->id_projeto;
        $etapa->titulo = $request->titulo;
        $etapa->descricao = $request->descricao;
        $etapa->andamento = $request->andamento;
        $etapa->save();
        
        return redirect()->route('etapas')->with(['status' => "Etapa cadastrada com sucessso!!"]);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $etapa = Etapa::find($id);
        $projetos = Projeto::all();
        return view ('etapas/edit', ['projetos' => $projetos, 'etapa' => $etapa]);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $etapa = Etapa::findOrFail($request->id);
        $etapa->update($request->all());

        return redirect()->route('etapas')->with('status', 'Etapa editada com sucesso!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $etapa = Etapa::find($id);
        $etapa->delete();
        return redirect()->route('etapas');
    }
}
