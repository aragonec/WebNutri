<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {return view('index');});
Route::get('/faq', function () {return view('faq');});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/pacientes/{id}', function ($id) {
    return view('admin.pacientes')->with('id',$id);
});

Route::group(['prefix'=>'admin','as'=>'admin.usuarios'], function(){
//Route::get('/', function () {return view('admin.index');})->middleware('auth');
Route::get('/', [App\Http\Controllers\Admin\UsuariosController::class,'index']);
Route::get('/usuarios', [App\Http\Controllers\Admin\UsuariosController::class,'index']);
Route::post('/usuarios/edit', [App\Http\Controllers\Admin\UsuariosController::class,'edit']);
Route::get('/pacientes', function () {return view('admin.pacientes');})->middleware('auth');
Route::resource('usuarios', App\Http\Controllers\Admin\UsuariosController::class);
Route::resource('pacientes', App\Http\Controllers\Admin\PacientesController::class);
});

Auth::routes();