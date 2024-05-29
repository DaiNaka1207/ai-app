<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeminiController;

Route::get('/', [GeminiController::class, 'index'])->name('index');
Route::post('/', [GeminiController::class, 'entry'])->name('entry');