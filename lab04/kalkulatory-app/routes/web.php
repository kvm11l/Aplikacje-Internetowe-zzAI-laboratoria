<?php

use App\Http\Controllers\CalculatorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Trasy dla kalkulatorów
Route::get('/calculators', [CalculatorController::class, 'index'])->name('calculators.index');
Route::post('/calculators/credit', [CalculatorController::class, 'calculateCredit'])->name('calculators.credit');
Route::post('/calculators/basic', [CalculatorController::class, 'calculateBasic'])->name('calculators.basic');

// podstrona - O nas
Route::get('/about', function () {
    return view('about');
})->name('about');