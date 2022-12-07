<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:sanctum')->get('/position', function (Request $request) {
    return $request->position();
});


Route::middleware('auth:sanctum')->get('/facility', function (Request $request) {
    return $request->facility();
});


Route::middleware('auth:sanctum')->get('/message', function (Request $request) {
    return $request->message();
});

Route::middleware('auth:sanctum')->get('/news', function (Request $request) {
    return $request->news();
});

Route::middleware('auth:sanctum')->get('/proposal', function (Request $request) {
    return $request->proposal();
});


