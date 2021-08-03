<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\CommunityController;
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
Auth::routes();

Route::get('/', function () {

    return view('auth.login');
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
    Route::post('community/create', [CommunityController::class, 'create'])->name('communities.create');
    Route::get('communities', [CommunityController::class, 'index'])->name('communities');
    Route::get('/index/item', [TiposProjetoController::class,  'index'])->name('index.item');
    Route::get('/create/item', [TiposProjetoController::class,  'create'])->name('typeProject');
    Route::post('/store/item', [TiposProjetoController::class,   'store'])->name('create.item');
    Route::get('/delete/item/{id}', [TiposProjetoController::class, 'delete'])->name('delete.item');
    Route::get('/edit/item/{id}', [TiposProjetoController::class, 'edit'])->name('edit.item');
    Route::post('/update', [TiposProjetoController::class, 'update'])->name('update.item');
    Route::get('/index/list', [ProjetoController::class,  'index'])->name('index.project');
    Route::get('/create', [ProjetoController::class,  'create'])->name('new.project');
    Route::post('/store/project', [ProjetoController::class,   'store'])->name('create.project');
    Route::get('/delete/projeto/{id}', [ProjetoController::class, 'delete'])->name('delete.project');
    Route::get('/edit/projeto/{id}', [ProjetoController::class, 'edit'])->name('edit.project');
    Route::post('/update/projeto', [ProjetoController::class, 'update'])->name('update.project');


});

