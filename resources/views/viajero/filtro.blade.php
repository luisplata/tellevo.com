@extends("inicio")
@section("atras",url("viajero"))
@section("contenido")
<style>
    .espacio-arriba{
        margin-top: 50px;
    }
</style>
{{Form::open(["url"=>"viajero/buscar/plaza","method"=>"GET"])}}
<div class="row text-center">
    <div class="col-6">
        <label> Origen</label>
        <select name="origen" class="form-control" required="">
            <option></option>
            @foreach ($origen as $o)
            <option value="{{$o->id}}">
                {{$o->nombre}}
            </option>
            @endforeach
        </select>
    </div>
    <div class="col-6">
        <label> Destino</label>
        <select name="destino" class="form-control" required="">
            <option></option>
            @foreach ($origen as $o)
            <option value="{{$o->id}}">
                {{$o->nombre}}
            </option>
            @endforeach
        </select>
    </div>
</div>
<div class="row">
    <div class="col text-center">
        <br/>
        <div class="form-group">
            Fecha
            <input type="text" name="fecha" class="form-control" required="" />
            <br/>
            <button type="submit" class="btn btn-success">Busca Plaza!</button>
        </div>
    </div>
</div>
{{Form::close()}}
@endsection
@section("script")
<link rel="stylesheet" media="all" type="text/css" href="{{asset('css/jquery-ui-timepicker-addon.css')}}" />
<script src="{{asset('js/jquery-ui-timepicker-addon.js')}}"></script>
<script>
$(document).ready(function () {

    $("input[name=fecha]").datetimepicker();
    $("input[name=hora]").timepicker();
});
</script>
@endsection
