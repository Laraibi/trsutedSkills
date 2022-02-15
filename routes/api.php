<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\prestationController;
use App\Http\Controllers\clientController;
use App\Http\Controllers\userController;
use App\Http\Controllers\authController;
use App\Http\Controllers\codifController;
use App\Http\Controllers\rappelController;
use App\Http\Controllers\rdvController;
use App\Http\Middleware\isAdmin;
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

Route::middleware('auth:sanctum')->get('/authUser', function (Request $request) {
    return $request->user();
});


Route::post("signin", [authController::class, "login"]);



Route::middleware('auth:sanctum')->group(function () {
    Route::get("signout", [authController::class, "logout"]);
    route::apiResource('codif', codifController::class);
    route::apiResource('rdv', rdvController::class);
    route::apiResource('rappel', rappelController::class);
    route::post('searchRappel', [rappelController::class, 'searchRappel']);
    route::middleware(isAdmin::class)->group(function () {
        route::apiResource('user', userController::class);
        route::apiResource('prestation', prestationController::class);
        route::apiResource('client', clientController::class);
        route::post('importClients', [clientController::class, 'importFile']);
    });
});
