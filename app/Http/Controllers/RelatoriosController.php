<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Carbon\Carbon;


class RelatoriosController extends Controller
{

    public function index()

    {

        return redirect()->away('https://psiu.aries.org.br/relatorio/relatorio.php');

    }

}