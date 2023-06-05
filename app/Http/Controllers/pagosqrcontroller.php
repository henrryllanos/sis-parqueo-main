<?php

namespace App\Http\Controllers;
use \DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use App\Models\pagoqr;
use App\Models\User;
use Validator;
use Barryvdh\DomPDF\Facade\Pdf;



class pagosqrcontroller extends Controller
{
    

    public function pdf(){
       $categorias = pagoqr::all();
        $pdf = Pdf::loadView('pagooqr.pdf', \compact('categorias'));
          return $pdf->stream();
     
         }
    
    public function view(){
        //de esta forma se asegura que es un usuario valido y se tiene control de sus pagos
        $usuarios=User::all();
        return view('/pagoqr',['usuarios'=>$usuarios]);
    }
    public function store(Request $request,User $user)
    {
        //guardar datos
        //datos de personas facturas

        $this->validate($request, [
            'nombre' => 'required|string',
            'ci' => 'required',
            'tipo'=>'required',
            'detalle' => 'required|string',
            'comprobante' => 'image|max:2048|required_if:tipo,QR',
            

        ]);
        
        $pago = new pagoqr();
        $pago->usuario_id = $request['nombre'];
        $pago->ci = $request['ci'];
        $pago->detalle = $request['detalle'];
        $pago->monto= $request['monto'];
       // $pago->usuario_id = $user->id;
      
        if($request->file('comprobante')!=null){
            $imagen = $request->file('comprobante')->store('public/imagenes');
            $url = Storage::url($imagen);
            $pago->comprobante = $url;
        }else{
            $pago->comprobante="";
        }
     

        //$personas->detalle = $request['detalle'];
        $pago->save();
       // $categorias = pagoqr::all();
       // $pdf = Pdf::loadView('pagoqr.pdf', \compact('categorias'));
        

        
      // return $pdf->stream();

       return redirect()->back()->with('status','El pago se efectuo exitosamente! ');
        
    }
}
