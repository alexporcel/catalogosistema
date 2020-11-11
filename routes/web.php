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
Route::post('/categoria/registrar', 'App\Http\Controllers\CategoriaController@create');
Route::put('/categoria/actualizar', 'App\Http\Controllers\CategoriaController@update');
Route::put('/categoria/desactivar', 'App\Http\Controllers\CategoriaController@desactivar');
Route::put('/categoria/activar',    'App\Http\Controllers\CategoriaController@activar');

Route::get('marca',             'App\Http\Controllers\MarcaController@index');
Route::post('/marca/registrar', 'App\Http\Controllers\MarcaController@create');
Route::put('/marca/actualizar', 'App\Http\Controllers\MarcaController@update');
Route::put('/marca/desactivar', 'App\Http\Controllers\MarcaController@desactivar');
Route::put('/marca/activar',    'App\Http\Controllers\MarcaController@activar');

Route::get('proveedor',             'App\Http\Controllers\ProveedorController@index');
Route::post('/proveedor/registrar', 'App\Http\Controllers\ProveedorController@create');
Route::put('/proveedor/actualizar', 'App\Http\Controllers\ProveedorController@update');

Route::get('producto',             'App\Http\Controllers\ProductoController@index');
Route::post('/producto/registrar', 'App\Http\Controllers\ProductoController@create');
Route::put('/producto/actualizar', 'App\Http\Controllers\PoductoController@update');
Route::put('/producto/desactivar', 'App\Http\Controllers\ProductoController@desactivar');
Route::put('/producto/activar',    'App\Http\Controllers\ProductoController@activar');

Route::get('venta',             'App\Http\Controllers\VentaController@index');
Route::post('/venta/registrar', 'App\Http\Controllers\VentaController@create');
Route::put('/venta/actualizar', 'App\Http\Controllers\VentaController@update');
Route::put('/venta/desactivar', 'App\Http\Controllers\VentaController@desactivar');
Route::put('/venta/activar',    'App\Http\Controllers\VentaController@activar');