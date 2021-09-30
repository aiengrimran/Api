<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\Auth\RegisteredUserController;
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


Route::get('/deliveries/edit/{id}', [DeliveryController::class, 'edit']);
Route::get('/deliveries/show/{id}', [DeliveryController::class, 'show']);

Route::get('/getdata', [DeliveryController::class, 'index']);
Route::post('/savedata', [DeliveryController::class, 'store']);

// ---------------------------------------------------
Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);
    return ['token' => $token->plainTextToken];
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->post('/sanctum/logout',[ApiController::class, 'logout']);
});
Route::post('/sanctum/token', [Auth\RegisterdUserController::class, 'create']);
Route::post('/sanctum/login', [ApiController::class, 'login']);

