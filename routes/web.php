<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\ResultController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::controller(DashboardController::class)->prefix('dashboard')->group(function () {
    Route::get('/', 'index')->name('dashboard.index');
    Route::get('/score-box/8732y8hef83tn38vt', 'scoreBoxStatistic')->name('dashboard.scorebox');
});

Route::controller(ResearchController::class)->prefix('research')->group(function () {
    Route::get('/', 'index')->name('research.index');
    Route::post('/parallel/store', 'storeParallel')->name('research.store.parallel');
    Route::post('/basic/store', 'storeBasic')->name('research.store.basic');
});

Route::controller(ResultController::class)->prefix('result')->group(function () {
    Route::get('/', 'index')->name('result.index');
    Route::get('/all/data/hayr732gryasdaequih4q', 'researchData')->name('result.data.all');
    Route::get('/delete/all/hayr732gryasdaequih4q', 'destroyAllData')->name('result.delete.all');
});
