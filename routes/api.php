<?php

use App\Http\Controllers\Admin\BedroomController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\FloorController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\IndexController;
use App\Models\Section;
use Database\Seeders\BedroomSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('bedrooms',[IndexController::class,'bedrooms']);
Route::get('floors',[IndexController::class,'floors']);
Route::get('sections',[IndexController::class,'sections']);
Route::get('rooms',[IndexController::class,'rooms']);

Route::get('bedrooms/{bedroom}',[IndexController::class,'bedroom']);
Route::get('floors/{floor}',[IndexController::class,'floor']);
Route::get('sections/{section}',[IndexController::class,'section']);
Route::get('rooms/{room}',[IndexController::class,'room']);



Route::post('booking',[IndexController::class,'booking']);

Route::prefix('admin')->group(function(){
    Route::apiResource('bedrooms',BedroomController::class);
    Route::apiResource('floors',FloorController::class);
    Route::apiResource('sections',SectionController::class);
    Route::apiResource('rooms',RoomController::class);
    Route::apiResource('booking',AdminBookingController::class);
});




