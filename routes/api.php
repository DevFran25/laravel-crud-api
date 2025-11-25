<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\PlayerController;

Route::get('/players', [PlayerController::class, 'index']);

Route::get('/players/{id}', [PlayerController::class, 'show']);

Route::post('/players', [PlayerController::class, 'store']);


Route::put('/players/{id}', function (){
    return 'Actualizando un jugador por ID';
});

Route::delete('/players/{id}', function (){
    return 'Eliminando un jugador por ID';
});

