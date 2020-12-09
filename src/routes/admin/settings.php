<?php

use App\Http\Controllers\Admin\SettingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SettingsController::class, 'index'])->name('index');
Route::post('/main/save', [SettingsController::class, 'saveMainSettings'])->name('main.save');
