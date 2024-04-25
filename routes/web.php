<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome')->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::middleware('auth')->group(function () {
    Route::view('notes', 'notes.index')->name('notes.index');
    Route::view('notes/create', 'notes.create')->name('notes.create');
    Volt::route('notes/{note}/edit', 'notes.edit-note')->name('notes.edit');
    // Route::view('notes/create', 'notes.create')->name('notes.create');
});
Volt::route('notes/{note}', 'notes.view-note')->name('notes.view');

require __DIR__.'/auth.php';
