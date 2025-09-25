<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

# Home
Route::get('/', [TaskController::class, 'index'])->name('index');

# Store Task
Route::post('/store', [TaskController::class, 'store'])->name('store');

# Show Edit Task View
Route::get('/{id}/edit', [TaskController::class, 'edit'])->name('edit');

# Update Task in Database
Route::patch('/{id}/update', [TaskController::class, 'update'])->name('update');

# Delete Task
Route::delete('/{id}/destroy', [TaskController::class, 'destroy'])->name('destroy');