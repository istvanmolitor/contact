<?php

use Illuminate\Support\Facades\Route;
use Molitor\Contact\Http\Controllers\ContactController;

Route::middleware('web')->group(function () {
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
});
