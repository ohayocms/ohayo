<?php

use \App\Http\Controllers\Admin\StoreItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StoreItemController::class, 'index'])->name('index');
Route::get('/create', [StoreItemController::class, 'create'])->name('create');
Route::post('/store', [StoreItemController::class, 'store'])->name('store');
Route::get('/{id}/edit', [StoreItemController::class, 'edit'])->name('edit');
Route::post('/{id}/update', [StoreItemController::class, 'update'])->name('update');
Route::get('/{id}/delete', [StoreItemController::class, 'delete'])->name('delete');
