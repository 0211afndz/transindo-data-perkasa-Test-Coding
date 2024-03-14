<?php

use App\Http\Controllers\GuardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PenyewaanController;

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

Route::middleware(['guest:web'])->group(function() {
    Route::get('/',[GuardController::class,'login']);
    Route::get('register',[GuardController::class,'register']);
    Route::get('login',[GuardController::class,'login'])->name('login');

    Route::post('register/store',[GuardController::class,'register_store']);

    Route::post('login/try',[GuardController::class,'login_try']);

    Route::get('register/confirm_to_us/{id}',[GuardController::class,'confirm_to_us']);
});

Route::middleware(['auth:web'])->group(function() {
    Route::get('home',[HomeController::class,'index']);

    Route::get('mobil',[MobilController::class,'index']);
    Route::post('mobil/store',[MobilController::class,'store']);

    Route::get('penyewaan',[PenyewaanController::class,'index']);
    Route::post('penyewaan/store',[PenyewaanController::class,'store']);
    Route::get('penyewaan/detail/{id}',[PenyewaanController::class,'detail']);
    Route::post('penyewaan/act',[PenyewaanController::class,'act']);
});

Route::get('logout', [GuardController::class, 'logout']);