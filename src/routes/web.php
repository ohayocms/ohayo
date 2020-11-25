<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('index');

Route::get('/admin', function () {
    return redirect('/admin/dashboard');
})->middleware(\App\Http\Middleware\Admin::class);
