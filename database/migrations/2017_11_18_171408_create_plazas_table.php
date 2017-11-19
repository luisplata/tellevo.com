<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlazasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plazas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->datetime("salida");
            $table->integer("cupo");
            $table->integer("estado")->default(0);
            
            $table->integer("conductor_id")->unsigned();
            $table->foreign('conductor_id')->references('id')->on('conductors')->onDelete('cascade');
            
            $table->integer("tarifa_id")->unsigned();
            $table->foreign('tarifa_id')->references('id')->on('tarifas')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plazas');
    }
}
