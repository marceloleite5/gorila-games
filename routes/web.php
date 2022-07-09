<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\BannersController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MessagesController;
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

//Route::get('/', function () {
//    return view('index');
//});

Route::get('/', [HomeController::class, 'index']);



Route::get('/dashboard/games', [GamesController::class, 'index'])->middleware('auth');
Route::get('/dashboard/games/create', [GamesController::class, 'create'])->middleware('auth');
Route::any('games', [GamesController::class, 'store'])->middleware('auth');
Route::get('dashboard/games/edit/{id}',[GamesController::class, 'edit'])->middleware('auth');
Route::put('dashboard/games/update/{id}',[GamesController::class, 'update'])->middleware('auth');
Route::delete('/dashboard/games/{id}',[GamesController::class, 'destroy'])->middleware('auth');

Route::get('/dashboard/banners', [BannersController::class, 'index'])->middleware('auth');
Route::get('/dashboard/banners/create', [BannersController::class, 'create'])->middleware('auth');
Route::any('banners', [BannersController::class, 'store'])->middleware('auth');
Route::get('dashboard/banners/edit/{id}',[BannersController::class, 'edit'])->middleware('auth');
Route::put('dashboard/banners/update/{id}',[BannersController::class, 'update'])->middleware('auth');
Route::delete('/dashboard/banners/{id}',[BannersController::class, 'destroy'])->middleware('auth');

Route::get('/dashboard/categorias', [CategoriasController::class, 'index'])->middleware('auth');
Route::get('/dashboard/categorias/create', [CategoriasController::class, 'create'])->middleware('auth');
Route::any('categorias', [CategoriasController::class, 'store'])->middleware('auth');
Route::get('dashboard/categorias/edit/{id}',[CategoriasController::class, 'edit'])->middleware('auth');
Route::put('dashboard/categorias/update/{id}',[CategoriasController::class, 'update'])->middleware('auth');
Route::delete('dashboard/categorias/{id}',[CategoriasController::class, 'destroy'])->middleware('auth');

Route::get('/dashboard/users', [UsersController::class, 'index'])->middleware('auth');
Route::get('/dashboard/users/create', [UsersController::class, 'create'])->middleware('auth');
Route::any('users', [UsersController::class, 'store'])->middleware('auth');
Route::get('dashboard/users/edit/{id}',[UsersController::class, 'edit'])->middleware('auth');
Route::put('dashboard/users/update/{id}',[UsersController::class, 'update'])->middleware('auth');
Route::delete('dashboard/users/{id}',[UsersController::class, 'destroy'])->middleware('auth');
Route::get("/logout",[UsersController::class,"show"])->name("logout");

Route::get('/dashboard/messages', [MessagesController::class, 'index'])->middleware('auth');
Route::delete('dashboard/messages/{id}',[MessagesController::class, 'destroy'])->middleware('auth');
Route::get('/contatos/contato',[MessagesController::class,'create']);
Route::any('contatos', [MessagesController::class, 'store']);

Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware('auth');


//Route::group(['middleware' => ['auth']], function() {
    /**
    * Logout Route
    */
 //   Route::get('/logout', 'HomeController@perform')->name('logout.perform');
 //});

//Route::middleware([
//    'auth:sanctum',
//    config('jetstream.auth_session'),
//    'verified'
//])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard.index');
//    })->name('dashboard');
//});
