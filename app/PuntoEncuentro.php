<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PuntoEncuentro extends Model {

    //
    public function tarifasOrigen() {
        return $this->hasMany("App\Tarifa", "origen");
    }

    public function tarifasDestino() {
        return $this->hasMany("App\Tarifa", "origen");
    }

}
