<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Informes;
use App\Models\Projeto;

class InformesController extends Controller
{
    public function index()
    {
        //$informes = DB::table('informes')->get();
        $informes = Informes::join('projetos', 'informes.id_projeto', '=', 'projetos.id' )
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


    public function create()
    {
        // $projeto = DB::table('projetos')->pluck("nome_projeto","id");
        $projeto = Projeto::all();
        return view('informes.registra_informes',compact('projeto'));
    }

}
