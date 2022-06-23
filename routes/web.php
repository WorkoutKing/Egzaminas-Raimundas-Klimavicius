<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRequestController;
use App\Http\Controllers\AnswerController;
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
    return view('pages.home');
});
Route::get('/get-help', [UserRequestController::class,'index']);
Route::post('/storeHelp', [UserRequestController::class,'storeHelp']);
Route::get('/get-help', [UserRequestController::class,'allRequest']);
Route::get('/get-help/{user_request}',[UserRequestController::class, 'showRequest']);
Route::get('/help-request', [UserRequestController::class, 'helpRequest']);
Route::post('/get-help/{user_request}/answer',[AnswerController::class, 'create']);
Route::post('/update/{user_request}',[UserRequestController::class, 'updateRequest']);
Route::post('/updateHelped/{user_request}',[UserRequestController::class, 'updateRequestHelped']);




Auth::routes();
Route::get('/logout','\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
