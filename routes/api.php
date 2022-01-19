<?php

use App\Http\Controllers\api\CommunityController;
use App\Http\Controllers\api\EtapaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\MoradorController;
use App\Http\Controllers\api\ProjetoController;
use App\Http\Controllers\api\InformesController;
use App\Http\Controllers\api\ItensController;
use App\Http\Controllers\api\PropostaController;

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

// Mayllon: API
Route::get('moradores', [MoradorController::class, 'index']);
Route::post('morador', [MoradorController::class, 'store']);
Route::get('morador/{id}', [MoradorController::class, 'get']);
Route::post('proposta', [PropostaController::class, 'store']);
Route::get('proposta/{id}', [PropostaController::class, 'show']);
Route::get('projetos', [ProjetoController::class, 'index']);
Route::get('projeto/{id}', [ProjetoController::class, 'show']);
Route::get('informes/{id}', [InformesController::class, 'index']);
Route::get('comunidades', [CommunityController::class, 'index']);
Route::get('comunidade/{id}', [CommunityController::class, 'show']);
Route::get('etapas/{projeto}', [EtapaController::class, 'index']);
Route::get('itens/{projeto}', [ItensController::class, 'index']);
Route::get('tabuleiro/{id}', [PropostaController::class, 'tabuleiro']);
