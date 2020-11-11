<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(Request $request)
    {

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $producto = Producto::orderBy('id', 'desc')->paginate(5);
        }
        else{
            $producto = Proveedor::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(5);
        }
        //if($producto->hash_file('foto')){
        //    $producto['foto']=$request->file('foto')->store('uploads','public');
        //}
            return [ 
                'pagination' => [
                    'total'         => $producto->total(),
                    'current_page'  => $producto->currentPage(),
                    'per_page'      => $producto->perPage(),
                    'last_page'     => $producto->lastPage(),
                    'from'          => $producto->firstItem(),
                    'to'            => $producto->lastItem(),
                ],
                'productos' => $producto
            ];
    } 
    public function create(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->foto = $request->foto;
        $producto->cantidad = $request->cantidad;
        $producto->precioventa = $request->precioventa;
        $producto->estado = '1';
        $producto->save();
    }
    public function update(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $producto = Producto::findOrFail($request->id);
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->foto = $request->foto;
        $producto->cantidad = $request->cantidad;
        $producto->precioventa = $request->precioventa;
        $producto->save();
    }
    public function desactivar(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $producto = Producto::findOrFail($request->id);
        $producto->estado = '0';
        $producto->save();
    }

    public function activar(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $producto = Producto::findOrFail($request->id);
        $producto->estado = '1';
        $producto->save();
    }
}
