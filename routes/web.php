<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('user')->group(function () {
    Route::get('/', [ContactController::class, 'create'])->name('user.create');
});


Route::prefix('admin')->group(function () {

    Route::post('/store', [ContactController::class, 'store'])->name('admin.store');
    Route::get('/index', [ContactController::class, 'index'])->name('admin.index');
    Route::get('/message/{id}', [ContactController::class, 'show'])->name('admin.message');
    Route::delete('/delete/{id}', [ContactController::class, 'delete'])->name('admin.delete');
    Route::get('/search', [ContactController::class, 'search'])->name('admin.search');
});
