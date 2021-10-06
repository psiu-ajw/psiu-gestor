<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\MoradorController;
use App\Http\Controllers\api\ProjetoController;
use App\Http\Controllers\api\InformesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('moradores', [MoradorController::class, 'index']);
Route::post('morador', [MoradorController::class, 'store']);
Route::get('projetos', [ProjetoController::class, 'index']);
Route::get('projeto/{id}', [ProjetoController::class, 'show']);
Route::get('informes/{id}', [InformesController::class, 'index']);
