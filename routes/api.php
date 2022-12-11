<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
Route::get('/facilities/', [FacilityController::class, 'getFacility']);
Route::put('/facilities/{id}', [FacilityController::class, 'updateFacility']);
Route::delete('/facilities/{id}', [FacilityController::class, 'deleteFacility']);


Route::post('/Positions/', [PositionController::class, 'createPosition']);
Route::get('/Positions/', [PositionController::class, 'getAllPositions']);
Route::get('/Positions/', [PositionController::class, 'getPosition']);
Route::put('/Positions/{id}', [PositionController::class, 'updatePosition']);
Route::delete('/Positions/{id}', [PositionController::class, 'deletePosition']);

Route::post('/users/', [UserController::class, 'createUser']);
Route::get('/users/', [UserController::class, 'getAllUsers']);
Route::get('/users/', [UserController::class, 'getUser']);
Route::put('/users/{id}', [UserController::class, 'updateUser']);
Route::delete('/users/{id}', [UserController::class, 'deleteUser']);


Route::post('/Messages/', [MessageController::class, 'createMessage']);
Route::get('/Messages/', [MessageController::class, 'getAllMessages']);
Route::get('/Messages/', [MessageController::class, 'getMessage']);
Route::put('/Messages/{id}', [MessageController::class, 'updateMessage']);
Route::delete('/Messages/{id}', [MessageController::class, 'deleteMessage']);

Route::post('/Proposals/', [ProposalController::class, 'createProposal']);
Route::get('/Proposals/', [ProposalController::class, 'getAllProposals']);
Route::get('/Proposals/', [ProposalController::class, 'getProposal']);
Route::put('/Proposals/{id}', [ProposalController::class, 'updateProposal']);
Route::delete('/Proposals/{id}', [ProposalController::class, 'deleteProposal']);


