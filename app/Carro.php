<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model {

    //

    public function conductores() {
        return $this->hasMany("App\Conductor", "carro_id");
    }

}
