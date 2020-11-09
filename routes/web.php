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

Route::get('/', function () {
    return view('contenido/contenido');
});

Route::get('categoria',             'App\Http\Controllers\CategoriaController@index');
Route::post('/categoria/registrar', 'App\Http\Controllers\CategoriaController@store');
Route::put('/categoria/actualizar', 'App\Http\Controllers\CategoriaController@update');
Route::put('/categoria/desactivar', 'App\Http\Controllers\CategoriaController@desactivar');
Route::put('/categoria/activar',    'App\Http\Controllers\CategoriaController@activar');

Route::get('marca',             'App\Http\Controllers\MarcaController@index');
Route::post('/marca/registrar', 'App\Http\Controllers\MarcaController@store');
Route::put('/marca/actualizar', 'App\Http\Controllers\MarcaController@update');
Route::put('/marca/desactivar', 'App\Http\Controllers\MarcaController@desactivar');
Route::put('/marca/activar',    'App\Http\Controllers\MarcaController@activar');