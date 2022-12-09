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


Route::get('users', 'UserController@getAllUsers');
Route::get('users/{id}', 'UserController@getUser');
Route::post('users', 'UserController@createUser');
Route::put('users/{id}', 'UserController@updateUser');
route::delete('users/{id}', 'UserController@deleteUser');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

