<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(Request $request)
    {

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $producto = Producto::join('categorias','productos.idcategoria','=','categorias.id')
            ->join('marcas','productos.idmarca','=','marcas.id')
            ->select('productos.id','productos.idcategoria','categorias.nombre as nombre_categoria','marcas.nombre as nombre_marca',
            'productos.nombre','productos.descripcion','productos.precioventa','productos.cantidad',
            'productos.foto','productos.estado')
            ->orderBy('productos.id', 'desc')->paginate(5);
        }
        else{
            $producto = Producto::join('categorias','productos.idcategoria','=','categorias.id')
            ->join('marcas','productos.idmarca','=','marcas.id')
            ->select('productos.id','productos.idcategoria','categorias.nombre as nombre_categoria','marcas.nombre as nombre_marca',
            'productos.nombre','productos.descripcion','productos.precioventa','productos.cantidad',
            'productos.foto','productos.estado')
            ->where('productos.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('productos.id', 'desc')->paginate(5);
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
        $producto->idmarca = $request->idmarca;
        $producto->idcategoria = $request->idcategoria;
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
        $producto->idmarca = $request->idmarca;
        $producto->idcategoria = $request->idcategoria;
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
