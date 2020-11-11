<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index(Request $request)
    {

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $marcas = Marca::orderBy('id', 'desc')->paginate(5);
        }
        else{
            $marcas = Marca::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(5);
        }
        
        return [ 
            'pagination' => [
                'total'         => $marcas->total(),
                'current_page'  => $marcas->currentPage(),
                'per_page'      => $marcas->perPage(),
                'last_page'     => $marcas->lastPage(),
                'from'          => $marcas->firstItem(),
                'to'            => $marcas->lastItem(),
            ],
            'marcas' => $marcas
        ];
    }   

    /**
     */
    public function create(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $marca = new Marca();
        $marca->nombre = $request->nombre;
        $marca->estado = '1';
        $marca->save();
    }

    /**
     */
    public function update(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $marca = Marca::findOrFail($request->id);
        $marca->nombre = $request->nombre;
        $marca->estado = '1';
        $marca->save();
    }

    public function desactivar(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $marca = Marca::findOrFail($request->id);
        $marca->estado = '0';
        $marca->save();
    }

    public function activar(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $marca = Marca::findOrFail($request->id);
        $marca->estado = '1';
        $marca->save();
    }

    
}