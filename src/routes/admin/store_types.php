<?php

use App\Http\Controllers\Admin\StoreItemTypeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StoreItemTypeController::class, 'index'])->name('index');
Route::get('/create', [StoreItemTypeController::class, 'create'])->name('create');
Route::post('/store', [StoreItemTypeController::class, 'store'])->name('store');
Route::get('/{id}/edit', [StoreItemTypeController::class, 'edit'])->name('edit');
Route::post('/{id}/update', [StoreItemTypeController::class, 'update'])->name('update');
Route::get('/{id}/delete', [StoreItemTypeController::class, 'delete'])->name('delete');
