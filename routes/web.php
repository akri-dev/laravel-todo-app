<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

# Home
Route::get('/', [TaskController::class, 'index'])->name('index');

# Store Task
Route::post('/store', [TaskController::class, 'store'])->name('store');