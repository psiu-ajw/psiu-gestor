<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommunityController;

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
    Route::get('community/create', function () { return view('communities.create'); })->name('community.create');
    Route::post('community/create', [CommunityController::class, 'create'])->name('community.create');
    Route::get('communities', [CommunityController::class, 'index'])->name('communities');
});