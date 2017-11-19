<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model {

    //
    public function puntoOrigen() {
        return $this->belongsTo("App\PuntoEncuentro", "origen");
    }

    public function puntoDestino() {
        return $this->belongsTo("App\PuntoEncuentro", "destino");
    }

    public function plazas() {
        return $this->hasMany("App\Plaza", "tarifa_id");
    }

}
