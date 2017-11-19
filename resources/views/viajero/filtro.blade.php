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
        <label> Orígen</label>
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
            <input type="date" name="fecha" class="form-control" required="" />
            <br/>
            <button type="submit" class="btn btn-success">Busca Plaza!</button>
        </div>
    </div>
</div>
{{Form::close()}}
@endsection
@section("script")
<script>
</script>
@endsection
