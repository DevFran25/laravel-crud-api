<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Controllers\Api\playerController;

Route::get('/players', [playerController::class, 'index']);

Route::get('/players/{id}', function (){
    return 'Obteniendo jugador por ID';
});

Route::post('/players', function (){
    return 'Creando un nuevo jugador';
});

Route::put('/players/{id}', function (){
    return 'Actualizando un jugador por ID';
});

Route::delete('/players/{id}', function (){
    return 'Eliminando un jugador por ID';
});

