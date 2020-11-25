<?php

use App\Http\Controllers\Admin\ServerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ServerController::class, 'index'])->name('index');
