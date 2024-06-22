<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('dashboard')->middleware('auth')->group(function(){
    Route::get('clients', [ClientController::class,'index'])->name('admin.index');
    Route::get('clients/create', [ClientController::class,'create'])->name('client.create');
    Route::post('clients',[ClientController::class, 'store'])->name('client.store');
    Route::get('clients/{client}/edit',[ClientController::class, 'edit'])->name('client.edit');
    Route::post('clients/{client}',[ClientController::class, 'update'])->name('client.update');
    Route::delete('clients/{client}',[ClientController::class, 'destroy'])->name('client.destroy');
});

Route::prefix('dashboard')->group(function(){
    Route::get('payments', [PaymentController::class,'index'])->name('payments.index');
    Route::get('payments/getSession', [PaymentController::class,'getSession']);
});

Route::get('dashboard/cancel', function () {
    return Inertia::render('Cancel');
});

Route::get('dashboard/success', function () {
    return Inertia::render('Success');
});

require __DIR__.'/auth.php';
