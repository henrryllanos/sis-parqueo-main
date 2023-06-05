@extends('vista')
@section('main')
    <form action="{{route('responder')}}" id="formulario" method="POST">
        @csrf
        <h3>Responder solicitud</h3>
        <span>Cliente: {{$solicitud->usuario->name}}</span><br>
        <span>Fecha: {{$solicitud->fecha}}</span><br>
        <span>Hora: {{$solicitud->hora_inicio}} - {{$solicitud->hora_fin}}</span><br>
        <input type="hidden" name="id" value="{{$solicitud->id}}">
        <label for="">Seleccionar parqueo:</label>
        <select name="parqueo" id="" class="form-select">
            @foreach ($parqueos as $parqueo)
                <option value="{{$parqueo->id}}">{{$parqueo->numero. "-". $parqueo->zona->nombre}}</option>
            @endforeach
        </select>
        <div class="row">
            <button class="col btn" id="asignar">Registrar</button>
            <div class="col btn" id="cancelar"><a href="{{route('reservas')}}">Cancelar</a></div>
        </div>
    </form>
@endsection