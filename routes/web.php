<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\NasabahController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/1', function () {
    return view('Admin.account_add');
});

Route::prefix('/')->group(function() {
    Route::get('login', [LoginController::class, 'loginPage'])->name('loginpage');
    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::prefix('nasabah/')->group(function() {
    Route::get('homepage', [NasabahController::class, 'homepage'])->name('nasabah.homepage');
});

Route::prefix('admin/')->group(function() {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('addAccount', [AdminController::class, 'addAccountPage'])->name('admin.addaccountpage');
    Route::post('addAccount', [AdminController::class, 'addAccount'])->name('admin.addaccount');
    Route::get('account/update/{id}', [AdminController::class, 'editAccountPage'])->name('admin.editaccount');
    Route::post('account/update/{id}', [AdminController::class, 'editAccount'])->name('admin.editaccount');
    Route::get('account/delete/{id}', [AdminController::class, 'deleteAccount'])->name('admin.deleteaccount');
});