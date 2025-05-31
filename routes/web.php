<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

use App\Http\Controllers\SearchController;
//for search only.
Route::get('/search', [SearchController::class, 'index'])->name('search.index');

//save/remove products!
use App\Http\Controllers\SavedProductController;

Route::middleware(['auth'])->group(function () {
    Route::post('/saved-products', [SavedProductController::class, 'store'])->name('saved-products.store');
    Route::delete('/saved-products/{product}', [SavedProductController::class, 'destroy'])->name('saved-products.destroy');
});

Route::get('/saved-products', [SavedProductController::class, 'index'])
    ->middleware(['auth'])
    ->name('saved-products.index');




