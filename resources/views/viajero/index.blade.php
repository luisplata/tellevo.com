@extends("inicio")
@section("contenido")
<div class="row">
    <div class="col text-center">
        <p class="h2">Hola, <spam class="text-capitalize">{{Session("viajero")->nombre}}</spam> <br/>¿Que deseas hacer?</p>
    </div>
</div>
<div class="row text-center">
    <div class="col-6">
        <a class="btn btn-primary btn-lg" href="{{url("viajero/filtro")}}">Buscar viaje</a>
    </div>
    <div class="col-6">
        <a class="btn btn-info btn-lg" href="{{url('viajero/calificarViaje')}}">Calificar Viajes</a>
    </div>
</div>
@endsection