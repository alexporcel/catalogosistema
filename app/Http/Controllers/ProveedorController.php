<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
   /**
     */
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $proveedor = Proveedor::orderBy('id', 'desc')->paginate(5);
        }
        else{
            $proveedor = Proveedor::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(5);
        }
        
        return [ 
            'pagination' => [
                'total'         => $proveedor->total(),
                'current_page'  => $proveedor->currentPage(),
                'per_page'      => $proveedor->perPage(),
                'last_page'     => $proveedor->lastPage(),
                'from'          => $proveedor->firstItem(),
                'to'            => $proveedor->lastItem(),
            ],
            'proveedores' => $proveedor
        ];
    }   

    /**
     */
    public function create(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $proveedor = new Proveedor();
        $proveedor->nombre = $request->nombre;
        $proveedor->direccion = $request->direccion;
        $proveedor->telefono = $request->telefono;
        $proveedor->correo = $request->correo;
        $proveedor->save();
    }

    /**
     */
    public function update(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $proveedor = Proveedor::findOrFail($request->id);
        $proveedor->nombre = $request->nombre;
        $proveedor->direccion = $request->direccion;
        $proveedor->telefono = $request->telefono;
        $proveedor->correo = $request->correo;
        $proveedor->save();
    }
}