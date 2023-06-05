@extends('vista')
@section('main')
    <h3>Notificaciones enviadas</h3>
    <div>
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Asunto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notificaciones as $notificacion)
                            <tr>
                                
                                <th>{{$notificacion->usuario->name}}</th>
                                <th>{{$notificacion->asunto}}</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <a href="{{route('redactar')}}" class="btn btn-primary mt-5">Redactar</a>
@endsection