@extends("inicio")

@section("contenido")
<div class="row">
    <div class="col text-center">
        <span class="h1">Hola</span>
        <p>
            Te damos la bienvenida a <b>tellevamos.com</b>, Primero dinos a que quieres hacer?
        </p>
    </div>
</div>
<div class="row text-center">
    <div class="col-6">
        <a href="conductor" class="btn btn-primary btn-lg">Llevar pasajeros</a><!-- Aqui pueden colocar cualquier cosa, solo deben respetar al link-->
    </div>
    <div class="col-6">
        <a href="viajero/autenticar" class="btn btn-primary btn-lg">Viajar</a><!-- Aqui pueden colocar cualquier cosa, solo deben respetar al link-->
    </div>
</div>
@endsection