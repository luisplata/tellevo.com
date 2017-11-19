<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viaje extends Model {

    //
    public function plaza() {
        return $this->belongsTo("App\Plaza", "plaza_id");
    }

    public function viajero() {
        return $this->belongsTo("App\Viajero", "viajero_id");
    }

    public function calificaciones() {
        return $this->hasMany("App\Calificacion");
    }

}
