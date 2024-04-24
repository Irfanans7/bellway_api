<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('user-register',[UserController::class,'createUser']);

Route::put('get-user-update/{id}',[UserController::class,'updateUser']);

Route::delete('delete-user/{id}',[UserController::class,'deleteUser']);

Route::post('user-login',[UserController::class,'userLogin']);

Route::get('unauthenticate',[UserController::class,'unauthenticate'])->name('unauthenticate');


//Secure routes with middleware auth

Route::middleware('auth:api')->group(function(){
    Route::get('get-users',[UserController::class,'getUsers']);

    Route::get('get-user-detail/{id}',[UserController::class,'getUserDetail']);

    Route::get('user-logout',[UserController::class,'userLogout']);
});