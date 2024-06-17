<?php

use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\MessageController;
use App\Http\Controllers\API\PaymentController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\TransactionController;
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

Route::group(['prefix' => 'v1'], function () {
    // Product
    Route::get('/getproduct',[ProductController::class,'getData']);
    Route::get('/showproduct/{id}',[ProductController::class,'showData']);
    Route::get('/delproduct/{id}',[ProductController::class,'delData']);
    Route::post('/addproduct',[ProductController::class,'addData']);
    Route::post('/editproduct/{id}',[ProductController::class,'editData']);

    // Customer
    Route::get('/getcustomer',[CustomerController::class,'getData']);
    Route::get('/showcustomer/{id}',[CustomerController::class,'showData']);
    Route::get('/delcustomer/{id}',[CustomerController::class,'delData']);
    Route::post('/addcustomer',[CustomerController::class,'addData']);
    Route::post('/editcustomer/{id}',[CustomerController::class,'editData']);

    // Messages
    Route::get('/getmessage',[MessageController::class,'getData']);
    Route::get('/showmessage/{id}',[MessageController::class,'showData']);
    Route::get('/delmessage/{id}',[MessageController::class,'delData']);
    Route::post('/addmessage',[MessageController::class,'addData']);
    Route::post('/editmessage/{id}',[MessageController::class,'editData']);

    // Payment
    Route::get('/getpayment',[PaymentController::class,'getData']);
    Route::get('/showpayment/{id}',[PaymentController::class,'showData']);
    Route::get('/delpayment/{id}',[PaymentController::class,'delData']);
    Route::post('/addpayment',[PaymentController::class,'addData']);
    Route::post('/editpayment/{id}',[PaymentController::class,'editData']);

    // Profile
    Route::get('/getprofile',[ProfileController::class,'getData']);
    Route::get('/showprofile/{id}',[ProfileController::class,'showData']);
    Route::get('/delprofile/{id}',[ProfileController::class,'delData']);
    Route::post('/addprofile',[ProfileController::class,'addData']);
    Route::post('/editprofile/{id}',[ProfileController::class,'editData']);

    // Transaction
    Route::post('/addtransaction',[TransactionController::class,'addData']);
});
