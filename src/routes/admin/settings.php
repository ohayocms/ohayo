<?php

use App\Http\Controllers\Admin\SettingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SettingsController::class, 'index'])->name('index');
Route::get('/payments', [SettingsController::class, 'paymentSystems'])->name('payment.index');
Route::post('/payments/save', [SettingsController::class, 'savePaymentSystems'])->name('payment.save');
Route::post('/main/save', [SettingsController::class, 'saveMainSettings'])->name('main.save');
