<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viajero extends Model
{
    //
    public function viajes() {
        return $this->hasMany("App\Viaje","viajero_id");
    }
}
