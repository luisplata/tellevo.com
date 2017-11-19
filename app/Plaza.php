<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plaza extends Model {

    //
    public function conductor() {
        return $this->belongsTo("App\Conductor", "conductor_id");
    }

    public function tarifa() {
        return $this->belongsTo("App\Tarifa", "tarifa_id");
    }

    public function viajes() {
        return $this->hasMany("App\Viaje");
    }

}
