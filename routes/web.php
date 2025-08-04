<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('template/pages/landing');
})->name('home');


//ABOUT US
Route::get('/past-presidents', function () {
    return view('template/pages/past-presidents');
})->name('past-presidents');

Route::get('/officers-boards', function () {
    return view('template/pages/officers-boards');
})->name('officers-boards');

Route::get('/subsec-sig', function () {
    return view('template/pages/subsec-sig');
})->name('subsec-sig');

Route::get('/chapter-pres', function () {
    return view('template/pages/chapter-pres');
})->name('chapter-pres');

Route::get('/quintin-awardee', function () {
    return view('template/pages/quintin');
})->name('quintin');

Route::get('/silao-leadership-awardee', function () {
    return view('template/pages/silao');
})->name('silao');

Route::get('/hymn', function () {
    return view('template/pages/psa-hymn');
})->name('hymn');


//CME ACTIVITIES
Route::get('/pja', function () {
    return view('template/pages/pja');
})->name('pja');


//MEMBERSHIP
Route::get('/email-update', function () {
    return view('template/pages/email-update');
})->name('updEmail');



Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
