@extends('vista')
@section('main')
    <div>
        <form action="{{route('enviar_notificacion')}}" method="POST">
            @csrf
            <h3>Redactar notificacion</h3>
            <label for="">Asunto</label>
            <input type="text" class="form-control" name="asunto">
            <label for="">Destinatario:</label>
            <select name="usuario" id="" class="form-select">
                @foreach ($usuarios as $usuario )
                    <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                @endforeach
            </select>
            <label for="">Descripcion:</label>
            <input type="text" name="descripcion" class="form-control">
            <input type="submit" value="Enviar" class="btn btn-primary mt-2">
        </form>
    </div>
@endsection