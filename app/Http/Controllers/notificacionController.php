<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\notificacion;
use Illuminate\Support\Facades\Auth;

class notificacionController extends Controller
{
    //
    public function notificaciones(){
        $notificaciones= Auth::User()->notificaciones;
        return view('notificaciones',['notificaciones'=>$notificaciones]);
    }
    public function redactar(){
        $usuarios=User::all()->where('id','!=',Auth::User()->id);
        return view('redactar',['usuarios'=>$usuarios]);
    }
    public function notificacionesEnviadas(){
        $notificaciones=notificacion::all();
        return view('notificaciones_enviadas',['notificaciones'=>$notificaciones]);
    }
    public function enviar(Request $request){
        $notificacion = new notificacion();
        $notificacion->asunto=$request->asunto;
        $notificacion->descripcion=$request->descripcion;
        $notificacion->user_id=$request->usuario;
        $notificacion->save();
        return redirect('/notificaciones_enviadas');
    }
}
