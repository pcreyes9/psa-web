<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;

use App\Http\Controllers\Auth\MemberLoginController;

// Route::get('/', function () {
//     return view('template/pages/landing');
// })->name('home');

Route::get('/', [GalleryController::class, 'landing'])->name('home');


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

// Route::get('/gallery-aca1', function () {
//     return view('template/pages/gallery-aca');
// })->name('gallery-aca1');

// Route::get('/gallery-aca-{day}', [GalleryController::class, 'show'])->name('gallery-aca');

Route::get('/gallery-aca-{day}', [GalleryController::class, 'general'])->name('gallery-aca');


//CME ACTIVITIES
Route::get('/pja', function () {
    return view('template/pages/pja');
})->name('pja');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth'])
    ->name('dashboard');

Route::view('members', 'mem-access')
    ->middleware(['auth'])
    ->name('members');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
