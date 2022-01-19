<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/{any}', function () {
//     return view('layouts.vue');
// })->where('any', '.*');

Route::get('/',App\Http\Livewire\Welcome::class);
Route::get('/createaddress',App\Http\Livewire\NewAddress::class);


Route::get("/addresses",App\Http\Livewire\AddressTable::class);
