<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BedroomController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\FloorController;
use App\Http\Controllers\Admin\HistoryController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\IndexController;
use App\Models\Section;
use App\Models\User;
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



//All data
Route::get('bedrooms',[IndexController::class,'bedrooms']);
Route::get('floors',[IndexController::class,'floors']);
Route::get('sections',[IndexController::class,'sections']);
Route::get('rooms',[IndexController::class,'rooms']);

//One data
Route::get('bedrooms/{bedroom}',[IndexController::class,'bedroom']);
Route::get('floors/{floor}',[IndexController::class,'floor']);
Route::get('sections/{section}',[IndexController::class,'section']);
Route::get('rooms/{room}',[IndexController::class,'room']);


//booking
Route::post('booking',[IndexController::class,'booking']);


Route::middleware('auth:sanctum')->group(function ()
{
    Route::prefix('admin')->group(function(){
        Route::apiResource('bedrooms',BedroomController::class);
        Route::apiResource('floors',FloorController::class);
        Route::apiResource('sections',SectionController::class);
        Route::apiResource('rooms',RoomController::class);
        Route::apiResource('booking',AdminBookingController::class);
        Route::apiResource('admins',UserController::class);
        Route::apiResource('histories',HistoryController::class);
        Route::post('histories/create/{id}',[HistoryController::class,'create']);
        Route::post('bedroom/admin/create',[AdminController::class,'create']);
        Route::post('bedroom/admin/delete',[AdminController::class,'delete']);
    
    });

    Route::post('logout',[UserController::class,'logout']);
});


Route::post('login',[UserController::class,'login']);





