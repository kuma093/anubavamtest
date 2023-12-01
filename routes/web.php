<?php

namespace App\Http\Controllers;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/map',[HomeController::class, 'map']);
Route::post('/mapper',[HomeController::class, 'mapper']);

Route::get('/home',[HomeController::class, 'home'])->name('home');
Route::get('/removemapper',[HomeController::class, 'removeMapper']);
Route::get('/listmapper',[HomeController::class, 'listmapper']);


