@extends('vista')
@section('main')
    <h3>Notificaciones Recibidas</h3>
    <div>
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Asunto</th>
                            <th>Descripcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notificaciones as $notificacion)
                            <tr>
                                <th>{{$notificacion->asunto}}</th>
                                <th>{{$notificacion->descripcion}}</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection