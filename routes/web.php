<?php

use App\Http\Controllers\AuthController;
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

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/menu', function () {
    return view('menu');
});

Route::get('/login', function () {
    return view('login');
})->middleware('guest');

Route::get('/register', function () {
    return view('register');
})->middleware('guest');

Route::post('/postlogin',[AuthController::class,'postlogin'])->middleware('guest');
Route::post('/postregister',[AuthController::class,'register'])->middleware('guest');
Route::get('/logout',[AuthController::class,'logout']);
