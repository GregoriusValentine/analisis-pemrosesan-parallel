<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\ResultController;
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


Route::controller(DashboardController::class)->group(function () {
    Route::get('/', 'index')->name('dashboard.index');
});

Route::controller(ResearchController::class)->prefix('research')->group(function () {
    Route::get('/', 'index')->name('research.index');
});

Route::controller(ResultController::class)->prefix('result')->group(function () {
    Route::get('/', 'index')->name('result.index');
});
