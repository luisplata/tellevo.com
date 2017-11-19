<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viajes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            
            $table->integer("plaza_id")->unsigned();
            $table->foreign('plaza_id')->references('id')->on('plazas')->onDelete('cascade');
            
            $table->integer("viajero_id")->unsigned();
            $table->foreign('viajero_id')->references('id')->on('viajeros')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('viajes');
    }
}
