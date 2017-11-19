@extends("inicio")
@section("atras",url("viajero"))
@section("contenido")
<div class="row ">
    <div class="col-xs-12 espacio-arriba text-center">
        <span class="h3">Calificaciones pendientes</span>
        <ul class="list-group text-left">
            @foreach($viajes as $vi)
            <li class="list-group-item" data-viaje="{{$vi->id}}" data-toggle="modal" data-target="#myModal">{{$vi->plaza->salida}} - {{$vi->plaza->conductor->nombre}} - de: {{$vi->plaza->tarifa->puntoOrigen->nombre}} a {{$vi->plaza->tarifa->puntoDestino->nombre}}</li>
            @endforeach
        </ul>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Califica tu viaje!</h4>
            </div>
            {{Form::open(["url"=>"viajero/calificarViaje","method"=>"POST"])}}
            <div class="modal-body">
                <label>Calificacion:</label>
                <select name="calificacion" required="" class="form-control">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
                <br/>
                <label>Comentario</label>
                <textarea name="comentario" class="form-control"></textarea>
                <input type="" name="viaje_id" id="viaje_id" />
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>
@endsection

@section("script")

<script>
    $('#myModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('viaje');
        var modal = $(this);
        modal.find('#viaje_id').val(recipient);

    });
    $('#myModal').on('hide.bs.modal', function (event) {
        //limpiamos los datos de la vista

    });
</script>
@endsection