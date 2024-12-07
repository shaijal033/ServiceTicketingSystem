<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ServiceTicketController;


Route::apiResource('tickets', ServiceTicketController::class);
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


