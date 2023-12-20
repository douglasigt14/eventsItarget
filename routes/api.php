<?php

use App\Http\Controllers\EventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('/', function () {
    return "API 1.0";
});

Route::get('/events', [EventController::class, 'show']);
Route::post('/singup', [EventController::class, 'singup']);


/* Route::middleware('auth:api')->group(function () {
    // Rotas protegidas pelo middleware
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */
