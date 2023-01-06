<?php

use App\Http\Controllers\Emails\EmailController;
use Illuminate\Support\Facades\Route;

Route::prefix('email')->group(function () {
    Route::get('/', [EmailController::class, 'index'])->name('index');
    Route::post('/send', [EmailController::class, 'sendEmail'])->name('sendEmail');
});