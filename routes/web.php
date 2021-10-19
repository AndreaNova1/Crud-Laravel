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
//rutas utilizadas para la paginas principal y el form
Route::get('/', function () {
    return view('usuarios.listar');
});

//formulario usuarios
Route::get('/form','UserController@userform');
//Guardar usuarios
Route::post('/save','UserController@save')->name('save');