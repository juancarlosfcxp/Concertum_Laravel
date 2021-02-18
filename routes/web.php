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

//Route::get('/', function () {
//    return view('home');
//});
Route::get('/', 'HomeController@index')->name('home');

Route::get('/manager', 'HomeController@indexManager')->middleware('auth')->name('manager');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/eventoForm','eventoController@showForm')->middleware('auth');

Route::get('/eventoFormEditar{id_evento}','eventoController@showFormEditar')->middleware('auth');

Route::post('crearEvento','eventoController@crearEvento');

Route::post('editarEvento','eventoController@editarEvento');

Route::get('detalleEvento{id_evento}','eventoController@showDetalle');

Route::get('eventoBorrar{id_evento}','eventoController@borrarEvento');

Route::post('comprar','compraController@crearCompra')->middleware('auth');
