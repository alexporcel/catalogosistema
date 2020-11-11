<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    
/**
     */
    public function index(Request $request)
    {

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $ventas = Venta::orderBy('id', 'desc')->paginate(5);
        }
        else{
            $ventas = Venta::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(5);
        }
        
        return [ 
            'pagination' => [
                'total'         => $ventas->total(),
                'current_page'  => $ventas->currentPage(),
                'per_page'      => $ventas->perPage(),
                'last_page'     => $ventas->lastPage(),
                'from'          => $ventas->firstItem(),
                'to'            => $ventas->lastItem(),
            ],
            'ventas' => $ventas
        ];
    }   

    /**
     */
    public function create(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $venta = new Venta();
        $venta->nombre = $request->nombre;
        $venta->stock = $request->stock ;
        $venta->preciou=$request->preciou ;
        $venta->preciot=$request->preciot ;
        $venta->telefono=$request->telefono ;
        $venta->descripcion=$request->descripcion;
        $venta->save();           
    }

    /**
     */
    public function update(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $venta = Venta::findOrFail($request->id);
        $venta->nombre = $request->nombre;
        $venta->stock = $request->stock ;
        $venta->preciou=$request->preciou ;
        $venta->preciot=$request->preciot ;
        $venta->telefono=$request->telefono ;
        $venta->descripcion=$request->descripcion;
        $venta->save();
    }

    public function desactivar(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $venta = Venta::findOrFail($request->id);
        $venta->estado = '0';
        $venta->save();
    }

    public function activar(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $venta = Venta::findOrFail($request->id);
        $venta->estado = '1';
        $venta->save();
    }

}
