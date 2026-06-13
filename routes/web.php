<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\LookupController;
use App\Http\Controllers\Admin\MediaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('guest.home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth'])
    ->group(function () {

        Route::resource('dashboard', DashboardController::class);
        Route::resource('blog', BlogController::class);
        Route::resource('lookup', LookupController::class);
        Route::resource('media', MediaController::class);
        
        Route::get('media-modal/list', [MediaController::class, 'modalList'])
            ->name('media.modal.list');
        Route::post('media-modal/upload', [MediaController::class, 'modalUpload'])
            ->name('media.modal.upload');

    });

require __DIR__ . '/auth.php';
