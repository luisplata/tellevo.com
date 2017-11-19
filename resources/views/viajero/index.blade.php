@extends("inicio")
@section("contenido")
<p>Hola, {{Session("viajero")->nombre}} que desas hacer?</p>
<a class="btn btn-default" href="{{url('viajero/calificarViaje')}}">Calificar Viajes</a>
<a class="btn btn-default" href="{{url("viajero/filtro")}}">Buscar viaje</a>
@endsection