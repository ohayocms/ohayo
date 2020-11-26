<?php

use App\Http\Controllers\Admin\CurrencyController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CurrencyController::class, 'index'])->name('index');
Route::get('/create', [CurrencyController::class, 'create'])->name('create');
Route::post('/store', [CurrencyController::class, 'store'])->name('store');
Route::get('/{id}/edit', [CurrencyController::class, 'edit'])->name('edit');
Route::post('/{id}/update', [CurrencyController::class, 'update'])->name('update');
Route::get('/{id}/delete', [CurrencyController::class, 'delete'])->name('delete');
