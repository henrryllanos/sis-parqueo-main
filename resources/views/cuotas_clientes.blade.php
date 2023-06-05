@extends('vista')
@section('main')
    <h3>Cuotas de clientes</h3><br>
    <label for="">Correo electronico:</label>
    <input type="text" readonly value="{{$usuario->email}}" class="form-control input"><br>
    <label for="">Telefono:</label>
    <input type="text" readonly value="{{$usuario->telefono}}" class="form-control input">
    <br>
    <div>
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Mes</th>
                            <th>Detalle</th>
                            <th>Efectivo</th>
                            <th>Estado</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($usuario->pagos as $pago)
                        <tr> 
                            <th>{{$pago->created_at}}</th>
                            <th>{{date("F",strtotime($pago->created_at))}}</th>
                            <th>{{$pago->detalle}}</th>
                            <th>{{$pago->monto}}</th>
                            <th>Pagado</th>
                            <th>{{$pago->monto}}</th>
                        </tr>
                        @empty
                           No hay pagos realizados
                        @endforelse
                        
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>{{$usuario->pagos->sum('monto')}}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection