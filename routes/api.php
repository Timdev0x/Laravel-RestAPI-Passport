<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserAuthController;


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


Route::post('/v1/users', [UserAuthController::class, 'create']);
Route::post('register', [UserAuthController::class, 'register']);
Route::post('login', [UserAuthController::class, 'login']);

Route::prefix('/v1')->middleware('auth:api')->group(function () {
   Route::get('/users', [UserAuthController::class, 'show']);
   Route::put('/users/{id}', [UserAuthController::class , 'update']);
   Route::delete('/users/{id}', [UserAuthController::class , 'delete']);
});