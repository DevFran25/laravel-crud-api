<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Controllers\Api\playerController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
