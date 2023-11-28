<?php

use App\Livewire\Dashboard\Dashboard;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', Dashboard::class);
});