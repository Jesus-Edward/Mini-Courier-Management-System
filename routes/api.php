<?php

use App\Http\Controllers\Api\TrackingController;
use App\Http\Controllers\Api\UserController;
use App\Http\Resources\UserResource;
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

Route::middleware('auth:sanctum')->group(function () {
        Route::middleware('auth:sanctum')->group(function () {

            Route::get('user', function (Request $request) {

                return [

                    'user' => UserResource::make($request->user()),

                    'accessToken' => $request->bearerToken()

                ];

            });

            Route::put('update/profile/user', [UserController::class, 'updateUserInfo']);
            Route::post('user/logout', [UserController::class, 'loggedOut']);
            Route::get('user/parcels', [TrackingController::class, 'userParcel']);
        });
});

Route::get('/tracking/{tracking_number}', [TrackingController::class, 'tracking']);
Route::post('user/create', [UserController::class, 'regUser']);
Route::post('user/login', [UserController::class, 'loginUser']);
