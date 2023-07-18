<?php

use App\Http\Controllers\dashboard\UnitController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('addProperty',[App\Http\Controllers\dashboard\PropertyController::class,'store'])->name('api_add_property');

Route::get('properties',[App\Http\Controllers\dashboard\PropertyController::class,'index'])->name('api_property_list');
Route::get('units',[UnitController::class,'index']);
Route::post('addUnit',[UnitController::class,'store'])->name('api_add_unit');
Route::get('show/{id}',[UnitController::class,'show'])->name('api_show_unit');
Route::post('updateUnit/{id}',[UnitController::class,'update'])->name('api_update_Unit');


