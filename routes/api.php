<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProposalController;



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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::post('/facilities/', [FacilityController::class, 'createFacility']);
Route::get('/facilities/', [FacilityController::class, 'getAllFacilities']);
Route::get('/facilities/{id}', [FacilityController::class, 'getFacility']);
Route::put('/facilities/{id}', [FacilityController::class, 'updateFacility']);
Route::delete('/facilities/{id}', [FacilityController::class, 'deleteFacility']);


Route::post('/positions/', [PositionController::class, 'createPosition']);
Route::get('/positions/', [PositionController::class, 'getAllPositions']);
Route::get('/positions/{id}', [PositionController::class, 'getPosition']);
Route::put('/positions/{id}', [PositionController::class, 'updatePosition']);
Route::delete('/positions/{id}', [PositionController::class, 'deletePosition']);

Route::post('/users/', [UserController::class, 'createUser']);
Route::get('/users/', [UserController::class, 'getAllUsers']);

Route::post('/users/login/', [UserController::class, 'loginCheck']);

// Route::get('/users/{id}', [UserController::class, 'getUser']);
Route::put('/users/{id}', [UserController::class, 'updateUser']);
Route::delete('/users/{id}', [UserController::class, 'deleteUser']);


Route::post('/messages/', [MessageController::class, 'createMessage']);
Route::get('/messages/', [MessageController::class, 'getAllMessages']);
Route::get('/messages/{id}', [MessageController::class, 'getMessage']);
Route::put('/messages/{id}', [MessageController::class, 'updateMessage']);
Route::delete('/messages/{id}', [MessageController::class, 'deleteMessage']);

Route::post('/proposals/', [ProposalController::class, 'createProposal']);
Route::get('/proposals/', [ProposalController::class, 'getAllProposals']);
Route::get('/proposals/{id}', [ProposalController::class, 'getProposal']);
Route::put('/proposals/{id}', [ProposalController::class, 'updateProposal']);
Route::delete('/proposals/{id}', [ProposalController::class, 'deleteProposal']);


