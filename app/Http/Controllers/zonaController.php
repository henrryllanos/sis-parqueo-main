<?php

namespace App\Http\Controllers;
use App\Models\zona;
use Illuminate\Http\Request;
use App\Models\parqueo;
class zonaController extends Controller
{
    //
    public function verParqueos(){
        $zonas=zona::all();
        return view('crearPlazas',['zonas'=>$zonas]);
    }
    public function registrarZona(Request $request){
        $zona= new zona();
        $zona->nombre= $request->nombre;
        $zona->filas=$request->filas;
        $zona->columnas= $request->columnas;
        $zona->save();
        for( $i=1; $i<= $zona->filas * $zona->columnas; $i++){
            $parqueo =  new parqueo();
            $parqueo->numero= $i;
            $parqueo->estado= 'libre';
            $parqueo->zona_id= $zona->id;
            $parqueo->save();
        }
        return redirect('crearPlazas');
    }
}
