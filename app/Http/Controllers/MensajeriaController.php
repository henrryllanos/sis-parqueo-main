<?php

namespace App\Http\Controllers;

use App\Models\anuncio;
use App\Models\comentario;
use App\Models\notificacion;
use Illuminate\Http\Request;

class MensajeriaController extends Controller
{
    //
    public function storeComentario(Request $request){
        $this->validate($request, [
            'nombre' => 'required|string|max:100',
            'comentario' => 'required|string',
        ]);

        $comentario=new comentario();
        $comentario->nombre=$request->nombre;
        $comentario->comentario=$request->comentario;
        $comentario->save();

        return redirect()->back()->with('status','El comentario se registro exitosamente! ');
    }

    public function storeAnuncio(Request $request){
        $this->validate($request, [
            'encabezado' => 'required|string',
            'anuncio' => 'required|string',

        ]);

        $anuncio=new anuncio();
        $anuncio->encabezado=$request->encabezado;
        $anuncio->anuncio=$request->anuncio;
        $anuncio->save();

        return redirect()->back()->with('status','El anuncio se envio exitosamente! ');
    }

    public function storeNotificacion(Request $request){
        $this->validate($request, [
            'usuario' => 'required',
            'asunto' => 'required|string',
            'descripcion' => 'required|string',
        ]);

        $notificacion=new notificacion();
        $notificacion->asunto=$request->asunto;
        $notificacion->descripcion=$request->descripcion;
        $notificacion->user_id=$request->usuario;

        return redirect()->back()->with('status','La notificacion se envio exitosamente! ');
    }
}
