<?php

use App\Http\Controllers\Admin\ModController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ModController::class, 'index'])->name('index');
