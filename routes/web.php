<?php

use App\Http\Controllers\AlternativeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\SvalueController;
use App\Http\Controllers\ValueController;
use App\Http\Controllers\VvalueController;
use Illuminate\Support\Facades\Auth;
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
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postLogin'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function(){
    Route::resource('alternative', AlternativeController::class);
    Route::resource('criteria', CriteriaController::class);
    Route::resource('value', ValueController::class);
    Route::resource('s-value', SvalueController::class);
    Route::resource('v-value', VvalueController::class);
    Route::get('/', function () {
        return view('dashboard');
    });
});