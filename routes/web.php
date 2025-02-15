<?php

use App\Livewire\Tasks;
use App\Livewire\Projects;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware('role:admin')->group(function () {
        Route::get('/admin', function () {
            return "Admin Dashboard";
        });
    });

    Route::middleware('role:manager')->group(function () {
        Route::get('/manager', function () {
            return "Manager Dashboard";
        });
    });

    Route::get('/projects', Projects::class)->name('projects');
    Route::get('/tasks', Tasks::class)->name('tasks');
    
    Route::view('profile', 'profile')->name('profile');
});




require __DIR__.'/auth.php';
