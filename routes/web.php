<?php

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('user')->group(function () {
    Route::get('/', [ContactController::class, 'create'])->name('user.create');
});

// log in route
Route::get('/admin/login', [AdminLoginController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'doLogin'])->name('admin.doLogin');
Route::get('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

Route::prefix('admin')->middleware('admin.auth')->group(function () {
    Route::post('/store', [ContactController::class, 'store'])->name('admin.store');
    Route::get('/index', [ContactController::class, 'index'])->name('admin.index');
    Route::get('/message/{id}', [ContactController::class, 'show'])->name('admin.message');
    Route::delete('/delete/{id}', [ContactController::class, 'delete'])->name('admin.delete');
    Route::get('/search', [ContactController::class, 'search'])->name('admin.search');
});
