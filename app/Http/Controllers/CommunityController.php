<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Community;

class CommunityController extends Controller
{
    public function index()
    {
        $communities = Community::all();

        return view('communities.index')->with(['communities' => $communities]);
    }
    
    protected function create(Request $request)
    {
        Community::create([
            'name' => $request['name'],
            'description' => $request['description'],
        ]);
        return redirect()->action([CommunityController::class, 'index'])->with('status', 'Comunidade cadastrada com sucesso!');
    }

    public function destroy($id)
    {
        $community = Community::findOrFail($id);
        $community->delete();
        return redirect()->action([CommunityController::class, 'index'])->with('status', 'Comunidade excluída com sucesso!');
    }

    public function edit($id) {
        $community = Community::findOrFail($id);
        return view('communities.edit')->with(['community' => $community]);
    }

    protected function save(Request $request)
    {
        $community = Community::findOrFail($request['id']);
        $community->name = $request['name'];
        $community->description = $request['description'];
        
        $community->save();
        return redirect()->action([CommunityController::class, 'index'])->with('status', 'Comunidade atualizada com sucesso!');
    }

}
