<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarifasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tarifas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string("km");
            $table->string("precio");
            $table->integer("origen")->unsigned();
            $table->foreign('origen')->references('id')->on('punto_encuentros')->onDelete('cascade');
            $table->integer("destino")->unsigned();
            $table->foreign('destino')->references('id')->on('punto_encuentros')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('tarifas');
    }

}
