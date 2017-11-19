@extends("inicio")

@section("contenido")
<div class="col-xs-12 text-center">

    <div class="row">
        <div class="col-xs-12">
            <span class="h1">Hola</span>
        </div>
        <div class="col-xs-6">
            <a href="conductor" class="btn btn-default btn-lg">Conductor</a><!-- Aqui pueden colocar cualquier cosa, solo deben respetar al link-->
        </div>
        <div class="col-xs-6">
            <a href="viajero/autenticar" class="btn btn-default btn-lg">Viajero</a><!-- Aqui pueden colocar cualquier cosa, solo deben respetar al link-->
        </div>
    </div>
</div>
@endsection