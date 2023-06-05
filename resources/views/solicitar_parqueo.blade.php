@extends('vista')
@section('main')
<form action="{{route('solicitar')}}" id="formulario" method="POST">
    @csrf
    <h3>Solicitud de parqueo</h3>
    <label for="auto">Vehiculo:</label>
    <select name="auto" id="auto" class="form-select">
        @forelse ($vehiculos as $vehiculo)
        <option value="{{$vehiculo->id}}">{{$vehiculo->marca}} - {{$vehiculo->modelo}}</option>
        @empty
        <option value="">No tiene autos registrados</option>
        @endforelse
       
    </select>
   
    <label for="fecha">Fecha:</label>
    <input type="date" name="fecha" id="fecha" class="form-control">
    
    <label for="horaE">Hora inicio:</label>
    <select name="horaE" id="horaE" class="form-select">
        <option>08:00</option>
        <option>09:00</option>
        <option>10:00</option>
        <option>11:00</option>
        <option>12:00</option>
        <option>13:00</option>
        <option>14:00</option>
        <option>15:00</option>
        <option>16:00</option>
        <option>17:00</option>
        <option>18:00</option>
        <option>19:00</option>
        <option>20:00</option>
        <option>21:00</option>
    </select>
    
    <label for="horaS">Hora salida:</label>
    <select name="horaS" id="horaS" class="form-select">
        <option>09:00</option>
        <option>10:00</option>
        <option>11:00</option>
        <option>12:00</option>
        <option>13:00</option>
        <option>14:00</option>
        <option>15:00</option>
        <option>16:00</option>
        <option>17:00</option>
        <option>18:00</option>
        <option>19:00</option>
        <option>20:00</option>
        <option>21:00</option>
        <option>22:00</option>

    </select>
   
    <input type="submit" value="Solicitar" class="btn" id="enviar">
</form>
@endsection