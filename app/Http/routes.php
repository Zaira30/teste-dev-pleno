<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'VendedorController@index');
Route::post('vendedores/store', 'VendedorController@store');
Route::get('vendedores/listar-all', 'VendedorController@listarAll');

Route::post('vendas/listar-all', 'VendaController@listarAll');
Route::post('vendas/store', 'VendaController@store');