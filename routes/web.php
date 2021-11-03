<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\EtapaController;
use App\Http\Controllers\InformesController;
use App\Http\Controllers\ProjetoController;
use App\Http\Controllers\ItensController;
use App\Http\Controllers\ItensProjetoController;
use App\Models\Itens;
use Illuminate\Support\Facades\Auth;

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
Auth::routes();

Route::get('/', function () {
    return redirect('login');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/user/destroy/{id}', [UserController::class, 'destroy'])->name('destroy');
    Route::get('register', function () { return view('user.register'); });
    Route::post('register', [UserController::class, 'register'])->name('register');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('edit');
    Route::post('user/save', [UserController::class, 'save'])->name('user.save');
    Route::get('/user/changepassword', function () {return view('user.changepassword');});
    Route::post('user/changepassword', [UserController::class, 'changepassword'])->name('user.changepassword');
    Route::get('community/create', function () { return view('communities.create'); });
    Route::post('community/create', [CommunityController::class, 'create'])->name('community.create');
    Route::get('communities', [CommunityController::class, 'index'])->name('communities');
    Route::get('community/destroy/{id}', [CommunityController::class, 'destroy'])->name('community.destroy');
    Route::get('community/edit/{id}', [CommunityController::class, 'edit'])->name('community.edit');
    Route::post('community/save', [CommunityController::class, 'save'])->name('community.save');
    /*Danilo - Rota Informes - INI */
    Route::get('informes/create', function () { return view('informes.create'); });
    Route::post('informes/create', [InformesController::class, 'create'])->name('informes.create');
    Route::get('informes', [InformesController::class, 'index'])->name('informes');
    Route::post('registra_informes', [InformesController::class, 'registra_informes'])->name('registra_informes');
    //Route::get('/informes/destroy/{id}', [InformesController::class, 'destroy'])->name('destroy');
    //Route::get('/informes/edit/{id}', [InformesController::class, 'edit'])->name('edit');
    //Route::post('informes/save', [InformesController::class, 'save'])->name('informes.save');
    Route::get('registra_informes', [InformesController::class, 'getProjetos'])->name('getProjetos');
    /*Danilo - Rota Informes - FIM */
    Route::get('/index/item', [ItensController::class,  'index'])->name('index.item');
    Route::get('/create/item', [ItensController::class,  'create'])->name('create.item');
    Route::post('/store/item', [ItensController::class,   'store'])->name('store.item');
    Route::get('/delete/item/{id}', [ItensController::class, 'delete'])->name('delete.item');
    Route::get('/edit/item/{id}', [ItensController::class, 'edit'])->name('edit.item');
    Route::post('/update', [ItensController::class, 'update'])->name('update.item');
    Route::get('/index/list', [ProjetoController::class,  'index'])->name('index.project');
    Route::get('/create', [ProjetoController::class,  'create'])->name('new.project');
    Route::post('/store/project', [ProjetoController::class,   'store'])->name('create.project');
    Route::get('/delete/projeto/{id}', [ProjetoController::class, 'delete'])->name('delete.project');
    Route::get('/edit/projeto/{id}', [ProjetoController::class, 'edit'])->name('edit.project');
    Route::post('/update/projeto', [ProjetoController::class, 'update'])->name('update.project');
    Route::post('/insert/item/{projeto_id}', [ProjetoController::class, 'insertItem'])->name('insert.item');
    // Mayllon: Feature Andamento
    Route::get('etapa/create', [EtapaController::class, 'create'])->name('etapa.create');
    Route::post('etapa/store', [EtapaController::class, 'store'])->name('etapa.store');
    Route::get('etapas', [EtapaController::class, 'index'])->name('etapas');
    Route::get('etapa/destroy/{id}', [EtapaController::class, 'destroy'])->name('etapa.destroy');
    Route::get('etapa/edit/{id}', [EtapaController::class, 'edit'])->name('etapa.edit');
    Route::post('etapa/update', [EtapaController::class, 'update'])->name('etapa.update');
    
    Route::get('projeto/show/{id}', [ProjetoController::class, 'show'])->name('projeto.show');
    Route::get('/item/projeto/edit/{id}', [ItensProjetoController::class, 'edit'])->name('item.projeto.edit');
    Route::get('/item/projeto/delete/{id}', [ItensProjetoController::class, 'destroy'])->name('item.projeto.delete');
    Route::post('/item/projeto/update', [ItensProjetoController::class, 'update'])->name('item.projeto.update');
});

