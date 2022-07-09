<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController,
    HomeController
};


Route::get('/address/create/{id}', [AddressController::class, 'create'])->middleware('auth', 'confirm_id')->name('address.create');
Route::post('/address/create/{id}', [AddressController::class, 'store'])->middleware('auth', 'confirm_id')->name('address.store');

Route::get('/', [HomeController::class, 'index'])->name('home.index');
// Route::get('/', [UserController::class, 'index'])->name('index');

Route::get('/user/create', [UserController::class, 'create'])->middleware(['auth', 'is_admin'])->name('user.create');
Route::post('/user/create', [RegisteredUserController::class, 'store'])->middleware(['auth', 'is_admin'])->name('user.store');
Route::get('/user/{id}', [UserController::class, 'show'])->middleware('auth', 'confirm_id')->name('user.show');
Route::put('/edit/{id}', [UserController::class, "update"])->name("user.update");
Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware(['auth', 'is_admin'])->name('dashboard');
Route::delete('/delete/{id}', [UserController::class, 'delete'])->middleware(['auth', 'is_admin'])->name('user.delete');

require __DIR__ . '/auth.php';
