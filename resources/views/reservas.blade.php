@extends('vista')
@section('main')
<h3>Control de pagos</h3>
<div>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Responder</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($solicitudes as $solicitud)
                    <tr> 
                        <th>{{$loop->iteration}}</th>
                        <th>{{$solicitud->usuario->name}}</th>
                        <th>{{$solicitud->fecha}}</th>
                        <th><a href="{{route('responder_solicitud',['id'=>$solicitud->id])}}">Responder</a></th>
                    </tr>
                    @empty
                        
                    @endforelse
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection