<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\informasipengantinC;
use App\Http\Controllers\showC;
use Livewire\Volt\Volt;


Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('mengundang/{kode}/{kodepenerima}', [showC::class, "index"])->name('undanganku');

Route::view('dashboard', 'pages.dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
    
    // Routes baru menggunakan Volt
    route::get('undangan', [informasipengantinC::class, 'index'])->name('undangan');
    route::get('undangan/{idundangan}/detail', [informasipengantinC::class, 'informasipengantin'])->name('detail-undangan');
    route::get('undangan/{idundangan}/sebar', [informasipengantinC::class, 'sebar'])->name('sebar-undangan');
    Volt::route('qa', 'qa-demo')->name('qa');
    Volt::route('auth-demo', 'auth-demo')->name('auth-demo');
});

require __DIR__.'/auth.php';
