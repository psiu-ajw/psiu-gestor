<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Community;
use Illuminate\Http\Request;

class ComunidadeController extends Controller
{

    public function index()
    {
        return Community::all();
    }


    public function show($id)
    {
        //
    }

}
