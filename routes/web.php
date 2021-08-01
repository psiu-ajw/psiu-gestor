<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjetoController;
use App\Http\Controllers\TiposProjetoController;
use App\Models\TiposProjeto;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
//Route::get('/index', [TiposProjetoController::class,  'index'])->name('index');
Route::get('/index', [TiposProjetoController::class,  'index'])->name('index');
Route::get('/create', [TiposProjetoController::class,  'create'])->name('typeProject');
Route::post('/store', [TiposProjetoController::class,   'store'])->name('create.project');