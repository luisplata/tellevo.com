@extends("inicio")
@section("atras",url("viajero"))
@section("contenido")
<style>
    .espacio-arriba{
        margin-top: 50px;
    }
</style>
<div class="col-xs-12 text-center">
    <div class="row">
        {{Form::open(["url"=>"viajero/buscar/plaza","method"=>"GET"])}}
        <div class="col-xs-6">
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
        <div class="col-xs-6">
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
        <br/>
        <div class="col-xs-12">
            Fecha
            <input type="text" name="fecha" class="form-control" required="" />
            <br/>
            <button type="submit" class="btn btn-success">Busca Plaza!</button>
        </div>
        {{Form::close()}}
    </div>
</div>

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
