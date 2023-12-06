<?php

use App\Http\Controllers\AuthController;
use App\Livewire\Dashboard\Dashboard;
use App\Livewire\NewReceipt;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');

Route::get('/auth/redirect', [AuthController::class, 'redirect'])->name('login');
Route::get('/auth/callback', [AuthController::class, 'callback']);

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/receipts/add', NewReceipt::class)->name('receipts.create');
});