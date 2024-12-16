<?php

use App\Http\Controllers\PruebaController;
use Illuminate\Support\Facades\Route;


Route::get("/", [PruebaController::class, "index"])->name("prueba.index");

//Ruta para Registrar
Route::post("registrar-visitante", [PruebaController::class, "create"])->name("prueba.create");

//Ruta para Modificar
Route::post("modificar-visitante", [PruebaController::class, "update"])->name("prueba.update");

//Ruta para Eliminar
Route::get("eliminar-visitante-{idVisi}", [PruebaController::class, "delete"])->name("prueba.delete");

