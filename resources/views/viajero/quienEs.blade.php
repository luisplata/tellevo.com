@extends("inicio")
@section("atras",url("viajero"))
@section("contenido")
<div class="col-xs-12 text-center">
    <!--cargamos un autocopletado para que se encuentre pronto-->
    <!--
    En esta vista el objetivo que sea un auntenticador, la cual por medio de un usuario o contraseña 
    el viajero se identifique, con su registro previo.
    Pero por falta de tiempo, solo vamos a pedirle su nombre y su cedula.
    Si no esta lo registramos, y si esta lo seleccionamos. 
    nos regimos por la cedila, no actualizamos si ya esta.
    -->
    {{Form::open(["url"=>"viajero/quienes","method"=>"POST"])}}
    <h2>
        Dime, ¿quién eres?
    </h2>
    <div class="form-group">
        <label>
            Nombre
        </label>
        <input type="text" name="nombre" placeholder="Luis Plata" title="Coloca tu nombre Completo" class="form-control" required="" />
    </div>
    <div class="form-group">
        <label>
            Cédula: 
        </label>
        <input name="identificacion" type="number" class="form-control" placeholder="1143346134" title="Coloca tu documento sin puntos" required="requred"/>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Búscame!</button>
    </div>
    {{Form::close()}}
</div>
@endsection