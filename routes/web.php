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

//Listado de Usuarios
Route::get('/', 'UserController@listar');
//Formulario de Usuarios
Route::get('/form','UserController@userform');
//Guardar Usuarios
Route::post('/save','UserController@save')->name('save');
//Eliminar Usuarios
Route::delete('/delete/{id}','UserController@delete')->name('delete');
//Formulario para editar usuarios
Route::get('/editform/{id}','UserController@editform')->name('editform');
//Edicion de usuarios
Route::patch('/edit/{id}','UserController@edit')->name('edit');
//Formulario de rutas
Route::resource('rol', 'RolController@rol');