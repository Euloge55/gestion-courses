<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AchatController;

Route::get('/', [AchatController::class, 'index'])->name('achats.index');
Route::post('/achats', [AchatController::class, 'store'])->name('achats.store');