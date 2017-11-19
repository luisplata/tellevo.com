@extends("inicio")
@section("atras",url("viajero"))
@section("contenido")
<div class="col-xs-12 text-center">
    <span class="h1">Encuentra tu cupo</span>
    <div class="row">
        @foreach($oferta as $o)
        <div class="col-xs-12 jumbotron text-left" id="oferta-{{$o->id}}">
            <div class="col-xs-4">
                
            </div>
            <div class="col-xs-8">
                Hola, soy <b>{{$o->conductor->nombre}}</b><br/>
                <b>{{$o->conductor->carro->modelo}} {{$o->conductor->carro->placa}}</b><br/>
                Salida: <b>{{$o->salida}}</b><br/>
                Punto de encuentro: <b>{{$o->tarifa->puntoOrigen->nombre}} - {{$o->tarifa->puntoOrigen->descripcion}}</b><br/>
                Punto de llegada: <b>{{$o->tarifa->puntoDestino->nombre}} - {{$o->tarifa->puntoDestino->descripcion}}</b><br/>
                Kilómetros Recorridos: <b>{{$o->tarifa->km}}</b><br/>
                Precio: <b>${{$o->tarifa->precio}}</b></br>
                <b>{{$o->cupo}} </b> Cupo(s) disponibles
            </div>
            <hr/>
            <div class="col-xs-12 text-center">
                <button class="btn btn-success" onclick="tomarOferta({{$o->id}})" >Tomar</button>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
@section("script")
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
    function tomarOferta(oferta){
    //Aqui mandamos un AJAX para decirle al software que la oferta fue tomada
    //si es exitosa, eliminamos la oferta de la lista con la id
    console.warn(oferta, "{{Session('viajero')->id}}");
    $.ajax({
    method: "POST",
            url: "{{url('viajero/comprarOferta')}}",
            data: { "plaza": oferta, viajero:"{{Session('viajero')->id}}", _token:"{{csrf_token()}}" }
    }).done(function(msg) {
    console.log("Data Saved: " + msg);
    //si trae exito, lo mandamos al detalle de la oferta para que sepa cuando es y la cosa
    location.href = "{{url('/viajero/detalleViaje/')}}/" + msg;
    }).fail(function(msg, estatus) {
    switch (msg.status){
    case 555:
            swal("Sin cupo", "lo sentimos alguien se te adelanto, intenta con otra oferta", "warning");
    break;
    case 444:
            swal("Cuidado", "Ya tienes una oferta comprada, no puedes tener mas de un viaje comprado", "warning");
    break;
    default:
            swal("Error", "No puede comprar este pasaje.", "error");
    break;
    }

    });
    }

</script>
@endsection