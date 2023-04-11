<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [Controller::class, 'home'])->name('app');

Route::middleware(['auth'])->group(function () {

    Route::get('/list', [Controller::class, 'list'])->name('taxi.list');
    Route::post('/buy/{taxi}', [Controller::class, 'buy'])->name('taxi.buy');
    Route::post('/changeColor', [Controller::class, 'changeColor'])->name('taxi.changeColor');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
