<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\http\Controllers\ImageController;
use App\http\Controllers\EventController;

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



    Route::post("register",[RegisterController::class,'postRegister']);
    Route::post("login",[LoginController::class,'postLogin']);


    Route::get("categories",[CategoryController::class,'index']);
    Route::post("save-category",[CategoryController::class,'store']);


    Route::post("upload",[ImageController::class,'upload']);


    Route::get("events",[EventController::class,'index']);
    Route::post("save-event",[EventController::class,'store']);
    Route::get("edit-event/{id}",[EventController::class,'edit']);
    Route::post("update-event",[EventController::class,'update']);
    Route::get("delete-event/{id}",[EventController::class,'destroy']);








