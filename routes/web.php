<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Livewire\Home;
use App\Livewire\Rooms;
use App\Livewire\RoomDetail;
use App\Livewire\Gallerypage;
use App\Livewire\Testimonials;
use App\Livewire\About;
use App\Livewire\Contactpage;
use App\Livewire\Paymentpage;

Route::get('/', Home::class)->name('home');
Route::get('/kamar', Rooms::class)->name('rooms');
Route::get('/kamar/{slug}', RoomDetail::class)->name('room-detail');
Route::get('/galeri', Gallerypage::class)->name('gallery');
Route::get('/testimoni', Testimonials::class)->name('testimonials');
Route::get('/tentang-kami', About::class)->name('about');
Route::get('/kontak', Contactpage::class)->name('contact');
Route::get('/pembayaran', Paymentpage::class)->name('payment');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
