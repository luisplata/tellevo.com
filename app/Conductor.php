<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conductor extends Model {

    //
    public function carro() {
        return $this->belongsTo("App\Carro");
    }

    public function plazas() {
        return $this->hasMany("App\Plaza", "conductor_id");
    }

}
