<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Livewire\Settings\GoodStanding;
use Illuminate\Support\Facades\Auth;

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

Route::get('/pja', function () {
    return view('template/pages/pja');
})->name('pja');

// Route::get('/gallery-aca1', function () {
//     return view('template/pages/gallery-aca');
// })->name('gallery-aca1');

// Route::get('/gallery-aca-{day}', [GalleryController::class, 'show'])->name('gallery-aca');

Route::get('/gallery-aca-{day}', [GalleryController::class, 'general'])->name('gallery-aca');


//CME ACTIVITIES


Route::view('midyear2026', 'template/midyear/midyear-landing')->name('midyear2026');

Route::get('/midyear-registration-details', function () {
    return view('template/pages/mid-reg');
})->name('midyear-registration-deets');

Route::get('/midyear-poster', function () {
    return view('template/pages/mid-poster');
})->name('midyear-poster');

Route::get('/midyear-registration', function () {
    // dd("redirecting...");
    return view('template/midyear/midyear-registration');
})->name('midyear-registration');

Route::get('/subspec-activity', function () {
    return view('template/pages/subspec-activity');
})->name('subspec-activity');

Route::get('/subspec-sig', function () {
    return view('template/pages/subsec-sig');
})->name('subspec-sig');



// AUTHENTICATE MEMBER LOGIN

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

    Route::get('settings/good-standing', GoodStanding::class)->name('settings.good-standing');
    // Route::view('settings/good-standing', 'goodStanding')->name('settings.good-standing');

    Route::get('/admin/dashboard', function () {
        if(Auth::user()->id != 0){
            return redirect()->route('dashboard');
        }
        else{
            return view('admin.dashboard');
        }
    })->name('admin_dashboard');

    // Route::view('admin/dashboard', 'admin.dashboard')->name('admin_dashboard');
});

// ADMIN LOGIN



require __DIR__.'/auth.php';
