<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Informes;

class InformesController extends Controller
{
    public function index()
    {
        //$informes = DB::table('informes')->get();
        $informes = Informes::join('projetos', 'informes.id_projeto', '=', 'projeto.id' )
        ->get(['informes.*', 'projetos.nome_projeto']);

        return view('informes.index')->with(['informes' => $informes]);
    }
    
    protected function registra_informes(Request $request)
    {
        Informes::create([
            'id_projeto' => $request['projeto'],
            'txt_informe' => $request['txt_informe'],
        ]);
        return redirect()->action([InformesController::class, 'index'])->with('status', 'Informe cadastrado com sucesso!');
    }


    public function destroy($id)
    {

        $id_projeto = Informes::findOrFail($id);
        $id_projeto->delete();
        return redirect()->action([InformesController::class, 'index'])->with('status', 'Informe excluído com sucesso!');
    }
    public function edit($id) {
        $informes = Informes::findOrFail($id);
        return view('informes.edit')->with(['informes' => $informes]);
    }


    protected function save(Request $request)
    {
        $informes = Informes::findOrFail($request['id']);
        $informes->txt_informe = $request['txt_informe'];
        $informes->save();
        return redirect()->action([InformesController::class, 'index'])->with('status', 'Informe atualizado com sucesso!');
    }


    public function getProjetos()
    {
        $projeto = DB::table('projeto')->pluck("nm_projeto","id_projeto");
        return view('informes.registra_informes',compact('projeto'));
    }

}
