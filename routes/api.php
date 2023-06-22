<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\KlubController;
use App\Http\Controllers\api\PemainController;
use App\Http\Controllers\API\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\Author;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [RegisterController::class, 'login']);
Route::post('register', [RegisterController::class, 'register']);

Route::middleware('auth:sanctum')->get('/klub', [KlubController::class, 'index']);
Route::middleware('auth:sanctum')->post('/klub/store', [KlubController::class, 'store']);
Route::middleware('auth:sanctum')->post('/klub/update/{id}', [KlubController::class, 'update']);
Route::middleware('auth:sanctum')->delete('/klub/delete/{id}', [KlubController::class, 'delete']);

Route::middleware('auth:sanctum')->get('/pemain', [PemainController::class, 'index']);
Route::middleware('auth:sanctum')->post('/pemain/store', [PemainController::class, 'store']);
Route::middleware('auth:sanctum')->post('/pemain/update/{id}', [PemainController::class, 'update']);
Route::middleware('auth:sanctum')->delete('/pemain/delete/{id}', [PemainController::class, 'delete']);