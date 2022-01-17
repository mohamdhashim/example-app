<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressController;

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

Route::get('/greeting', function () {
    return 'Hello World';
});

Route::get("user_addresses/{id}",[AddressController::class,'userAddresses']);

Route::get("address/{id}",[AddressController::class,'address']);
Route::post("new_address",[AddressController::class,'createAddress']);
Route::delete("delete_address/{id}",[AddressController::class,'deleteAddress']);
