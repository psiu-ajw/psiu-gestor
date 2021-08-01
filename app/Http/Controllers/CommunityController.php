<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Community;

class CommunityController extends Controller
{
    public function index()
    {
        $communities = DB::table('communities')->get();

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
}
