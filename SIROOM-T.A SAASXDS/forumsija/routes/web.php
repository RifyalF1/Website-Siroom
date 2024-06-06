<?php

use App\Http\Controllers\SesiController;
use App\Http\Controllers\TopikController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/ori', function () {
    return view('welcome');
});
Route::get('/',[SesiController::class,'index']);
Route::post('/login',[SesiController::class,'login']);
Route::post('/register',[SesiController::class,'register']);
Route::get('/logout',[SesiController::class,'logout']);

Route::get('/admin',[SesiController::class,'admin']);

Route::get('/dashboard',[TopikController::class,'index']);
Route::post('/tambahtopik',[TopikController::class,'tambahtopik']);
Route::get('/topikdetail/{id}',[TopikController::class,'topikdetail']);
Route::put('/topikdetail/edittopik/{id}',[TopikController::class,'edittopik']);
Route::get('/delete/{id}',[TopikController::class,'deletetopik']);
Route::get('/suka/{id}',[TopikController::class,'suka']);
Route::get('/komen/{id}',[TopikController::class,'komen']);
Route::get('/deletekomen/{id}',[TopikController::class,'deletekomen']);

Route::get('/user',[UserController::class,'index']);


