<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class Controladores extends Controller {

    public function viajero() {
        //aqui le vamos a preguntar quien es
        return view("viajero.quienEs");
    }

    public function detalleDeViaje(Request $request, $viaje) {
        $viaje = \App\Viaje::find($viaje);
        $dato = ["viaje" => $viaje];
        return view("viajero.detalleViaje", $dato);
    }

    public function buscarPlaza(Request $request) {
        //realizamos la busqueda por los datos enviados
        //primer filtro
        $plaza = \App\Plaza::where("salida", ">", $request->fecha)->get();
        //creamos un array con las nuevas plazas
        $oferta = array();
        foreach ($plaza as $p) {
            //dd($p->tarifa->puntoOrigen->id);
            //hacemos el segundo filtro: eliminamos los que no tengan como origen el indicado
            if ($p->tarifa->puntoOrigen->id == $request->origen && $p->tarifa->puntoDestino->id == $request->destino) {
                $oferta[] = $p;
            }
        }
        //dd($oferta);
        $datos["oferta"] = $oferta;
        return view("viajero.oferta", $datos);
    }

    public function comprarOferta(Request $request) {
        DB::beginTransaction();
        try {
            //recivimos los siguientes datos:
            //Oferta
            //viajero
            //se tiene que crear el campo de Viaje para colocar estos datos
            $plaza = \App\Plaza::find($request->plaza);
            $viajero = \App\Viajero::find($request->viajero);
            //creamos el viaje
            $viaje = new \App\Viaje();
            $viaje->plaza_id = $plaza->id;
            $viaje->viajero_id = $viajero->id;
            //validamos que el vijero no tenga mas de X numero de viajes
            foreach ($viajero->viajes as $v) {
                if ($v->estado == 0) {
                    DB::rollBack();
                    return response()->json("Tiene mas de un viaje pendiente", 444);
                }
            }
            if ($viaje->save()) {
                //se creo con exito
                //disminuimos el cupo de la plaza
                if ($plaza->cupo < 1) {
                    DB::rollBack();
                    return response()->json("Plaza sin cupo", 555);
                }
                $plaza->cupo -= 1;
                $plaza->save();
            }
            DB::commit();
            return response()->json($viaje->id);
        } catch (\Exception $ex) {
            //dd($ex);
            DB::rollBack();
            return response()->json("error excepcion", 500);
        }
    }

    public function quienEsViajero(Request $request) {
        //Buscamos al viajero para ver si ya esta
        $viajero = \App\Viajero::where("cedula", $request->identificacion)->first();
        if (!is_object($viajero)) {
            //esporque no esta registrado. Lo registramos
            $viajero = new \App\Viajero();
            $viajero->cedula = $request->identificacion;
            $viajero->nombre = $request->nombre;
            $viajero->save();
        }
        //guardamos en la session al viajero para saber que anda por aqui
        Session::put("viajero", $viajero);
        return redirect("viajero");
    }

    public function autenticar() {
        return view("viajero.quienEs");
    }

    public function filtro() {

        //lo mandamos a la vista para que pueda colocar los filtros de la busqueda
        //le mandamos los origenes y los destino
        $datos = array();
        //En el origen hay que validar que sea el sitio?
        $datos["origen"] = \App\PuntoEncuentro::all(); //Aqui lo coloco asi, para que se pueda validar en el futuro
        //hay que validar que estos dos datos tengan una tarifa o no? para futuro
        $datos["destino"] = \App\PuntoEncuentro::all(); //Igual aqui
        return view("viajero.filtro", $datos);
    }

    public function calificarViaje(Request $request) {
        //Vamos a calificar el viaje
        //vaidamos que el viaje no este calificado ya
        $viaje = \App\Viaje::find($request->viaje_id);
        if (count($viaje->calificaciones) > 0) {
            return redirect("viajero?mensaje=Ese viaje ya ah sido calificado");
        }

        //cuando mandamos el viajem creamos la calificacion para que pueda ser revisado
        $calificacion = new \App\Calificacion();
        $calificacion->calificacion = $request->calificacion;
        $calificacion->comentario = $request->comentario;
        $calificacion->viaje_id = $request->viaje_id;
        $calificacion->save();
        //si todo sale bien, lo mandamos de nuevo a la vista del filtro
        return redirect("viajero");
    }

    public function mostrarCalificarViaje(Request $request) {
        return redirect("viajero/calificaciones");
    }

    public function mostrarCalificacionesPendientes() {
        //mandamos los viajes que tienen calficacion de este viajero
        $listado["viajes"] = \App\Viaje::where("viajero_id", Session("viajero")->id)
                ->where("estado", "1")
                //->leftjoin("calificacions","calificacions.viaje_id","=","viajes.id")
                //Aqui hay que hacer un join sacando solo los viajes que no tengan una calificacion
                //terminar esta consulta
                ->get();
        return view("viajero.calificaciones", $listado);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
        return view("viajero.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
