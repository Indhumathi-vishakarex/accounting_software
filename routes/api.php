<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\SubscriptionController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/verification/{email}/{guid}', [RegisterController::class, 'verifyEmail'])->name('verification');
Route::post('/checkEmail', [RegisterController::class, 'checkEmail']);
Route::post('/Update/{id}', [RegisterController::class, 'update']);
Route::post('/Login',[LoginController::class, 'login']);
Route::post('/Forgot-Password', [LoginController::class, 'forgotpassword']);
Route::post('/verify-otp', [LoginController::class, 'verifyotp']);
Route::post('/Reset-password',[LoginController::class, 'resetPassword']);
Route::get('/Faqs', [FaqController::class, 'faqs']);
Route::get('/Payment-List', [SubscriptionController::class, 'getPaymentList']);




Route::middleware('auth:sanctum')->group(function (){
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::get ('/profile', [LoginController::class, 'profile']);
    Route::post('/change-password',[LoginController::class, 'changepassword']);
    
});


