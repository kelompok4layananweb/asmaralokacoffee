<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;


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



Route::get('home', function () {
    return view('home');
});

Route::get('/login', [loginController::class,'index'])->name('login');
Route::post('/log', [loginController::class, 'login'])->name('login.store');

Route::resource('customers', CustomerController::class);
Route::resource('customers.create', CustomerController::class);