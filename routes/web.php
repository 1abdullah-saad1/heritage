<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::view('/', 'welcome')->name('home'); // Placeholder

    // لاحقاً: Feed/Index + Review/Queue + Expert/Queue ...
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/review', \App\Livewire\Review\Queue::class)->name('review.queue');
    Route::get('/review/{post}', \App\Livewire\Review\Detail::class)->name('review.detail');
});
