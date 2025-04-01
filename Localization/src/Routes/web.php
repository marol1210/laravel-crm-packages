<?php

use Illuminate\Support\Facades\Route;
use Webkul\Localization\Http\Controllers\LocalizationController;


\Route::middleware(['web', 'admin_locale', 'user'])->prefix('localization')->group(function(){
    Route::get('', [LocalizationController::class, 'index'])->name('admin.localization.index');
});

