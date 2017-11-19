<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    //
    public function viaje() {
        return $this->belongsTo("App\Viaje");
    }
}
