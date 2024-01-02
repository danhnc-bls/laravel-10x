<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Website\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => '/user'], function() {
    Route::get('/', [UserController::class, 'index'])->name('user.list');
    Route::get('/search', [UserController::class, 'search'])->name('user.search');
});

Route::get('/mail', [UserController::class, 'sendMail'])->name('user.sendMail');