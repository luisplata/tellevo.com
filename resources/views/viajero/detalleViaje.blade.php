@extends("inicio")
@section("atras",url("viajero"))
@section("contenido")
<div class="col-xs-12 text-center">
    <span class="h1">Detalle del viaje</span>
</div>
<div class="col-xs-12">
    foto del conductor
</div>
<div class="col-xs-12 jumbotron">
    <label>Conductor: </label> {{$viaje->plaza->conductor->nombre}}<br/>
    <label>Carro: </label> {{$viaje->plaza->conductor->carro->placa}} - {{$viaje->plaza->conductor->carro->modelo}}<br/>
    <label>Fecha y hora salida: </label> {{$viaje->plaza->salida}}<br/>
    <label>Origen: </label> {{$viaje->plaza->tarifa->puntoOrigen->nombre}} - {{$viaje->plaza->tarifa->puntoOrigen->descripicion}}<br/>
    <label>Destino: </label> {{$viaje->plaza->tarifa->puntoDestino->nombre}} - {{$viaje->plaza->tarifa->puntoDestino->descripicion}}<br/>
    <label>Kilometros: </label> {{$viaje->plaza->tarifa->km}}<br/>
    <label>Precio: </label> ${{$viaje->plaza->tarifa->precio}}<br/>
</div>
<div class="col-xs-12 text-center">
    <button class="btn btn-success" onclick="imprimir()">Imprimir</button>
    <!-- 
    En este punto no va a imprimir, eso se hace en el futuro.
    Para este punto lo que se debe hacer es que al hacer click en el boton
    debe enviar un email (no lo hacemos porque no tenemos servidor de correo)
    y en este caso vamos a caducar la session porque ya fue
    -->
</div>
<script>
function imprimir(){
    //lo mandamos al cierre de la session, 
    //aqui en esta funcion deben enviar un ajax para que pueda enviar el email y quede la evidencia
    location.href = "{{url('/logout')}}";
}
</script>
@endsection