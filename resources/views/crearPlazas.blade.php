@extends('vista')
@section('main')
    <h3>Zonas</h3>
    @foreach ( $zonas as $zona)
        <div id="{{$zona->nombre}}">
            <h4>{{$zona->nombre}}</h4>
                @for ($i=0; $i< $zona->filas ; $i++)
                    <div class="row">
                        @for ($j=0; $j<$zona->columnas; $j++)
                            <div class="col libre">{{$j+1+ ($i*$zona->columnas)}}</div>
                        @endfor
                    </div>
                @endfor
        </div>
    @endforeach
    <div>
        <form action="{{route('registrar_zona')}}" method="POST">
            @csrf
            <h3>Crear Zona</h3>
            <label for="">Nombre de zona:</label>
            <input type="text" name="nombre" class="form-control">
            <label for="">Filas:</label>
            <input type="number" name="filas" class="form-control">
            <label for="">Columnas:</label>
            <input type="number" name="columnas" class="form-control">
            <input type="submit" value="Registrar" class="btn btn-primary mt-1">
        </form>
    </div>
@endsection