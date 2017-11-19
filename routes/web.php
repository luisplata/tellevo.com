<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/', function () {
    return view('paso1');
});
Route::get("conductor", function() {
    //
});
Route::get("viajero", "Controladores@viajero");

Route::post("viajero/quienes", "Controladores@quienEsViajero");

Route::get("viajero/buscar/plaza", "Controladores@buscarPlaza");

Route::post("viajero/comprarOferta", "Controladores@comprarOferta");

Route::get("viajero/detalleViaje/{viaje}", "Controladores@detalleDeViaje");

Route::get("logout", function() {
    Session::flush(); // removes all session data
    return redirect("/");
});
Route::get("viajero","Controladores@index");
Route::post("viajero/calificarViaje", "Controladores@calificarViaje");
Route::get("viajero/calificarViaje", "Controladores@mostrarCalificarViaje");
Route::get("viajero/calificaciones", "Controladores@mostrarCalificacionesPendientes");
Route::get("viajero/filtro","Controladores@filtro");
Route::get("viajero/autenticar","Controladores@autenticar");
