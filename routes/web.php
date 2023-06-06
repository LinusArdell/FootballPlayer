<?php

use App\Http\Controllers\KlubBolaController;
use App\Http\Controllers\NegaraController;
use App\Http\Controllers\PemainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('pemain',PemainController::class);
Route::resource('klub', KlubBolaController::class);
Route::resource('negara', NegaraController::class);
