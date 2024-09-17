<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Auth\RegisteredUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('create-user', [AdminDashboardController::class, 'createUser'])->middleware('auth')->name('create.user');
Route::post('create-user', [AdminDashboardController::class, 'storeUser'])->middleware('auth')->name('store.user');
Route::get('/users/{user:slug}', [AdminDashboardController::class, 'showUser'])->middleware('auth')->name('user.show');
Route::get('users/{user:slug}/edit', [AdminDashboardController::class, 'editUser'])->middleware('auth')->name('user.edit');
Route::put('users/{user:slug}/update', [AdminDashboardController::class, 'updateProfile'])->middleware('auth')->name('user.update');
Route::put('users/{user:slug}/updatePassword', [AdminDashboardController::class, 'updatePassword'])->middleware('auth')->name('userPassword.update');
Route::delete('users/{user:slug}/delete', [AdminDashboardController::class, 'deleteUser'])->middleware('auth')->name('user.delete');

Route::get('/account/{user:slug}/create', [AccountController::class, 'create'])->middleware('auth')->name('account.create');
Route::post('/account/{user:slug}', [AccountController::class, 'store'])->middleware('auth')->name('account.store');
Route::get('/account/{account}/edit', [AccountController::class, 'edit'])->middleware('auth')->name('account.edit');
Route::put('/account/{account}/update', [AccountController::class, 'update'])->middleware('auth')->name('account.update');

Route::get('/transaction/{user:slug}/create', [TransactionController::class, 'create'])->middleware('auth')->name('transaction.create');
Route::post('/transaction/{user:slug}', [TransactionController::class, 'store'])->middleware('auth')->name('transaction.store');
Route::get('/transaction/{transaction}/edit', [TransactionController::class, 'edit'])->middleware('auth')->name('transaction.edit');
Route::put('/transaction/{transaction}/update', [TransactionController::class, 'update'])->middleware('auth')->name('transaction.update');
Route::delete('/transaction/{transaction}', [TransactionController::class, 'destroy'])->middleware('auth')->name('transaction.destroy');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/transfer', [TransferController::class, 'index'])->middleware('auth')->name('transfer');
Route::put('/transfer/update', [TransferController::class, 'update'])->middleware('auth')->name('transfer.update');


Route::get('/admin-dashboard', [AdminDashboardController::class, 'index'])->middleware('auth')->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
