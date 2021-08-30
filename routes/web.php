<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterRtController;
use App\Http\Controllers\MasterRwController;
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

Route::get('/', function () {
    return redirect('admin/dashboard');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/auth/login', [AuthController::class, 'index'])->name('login');
    Route::post('/auth/login', [AuthController::class, 'login'])->name('login');
});

Route::prefix('admin')->middleware(['auth'])->group(function () {

    Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // RW
    Route::get('/rw', [MasterRwController::class, 'index'])->name('rw');
    Route::get('/rw/create', [MasterRwController::class, 'create']);
    Route::post('/rw', [MasterRwController::class, 'store']);
    Route::get('/rw/{id}/edit', [MasterRwController::class, 'edit']);
    Route::put('/rw/{id?}', [MasterRwController::class, 'update'])->name('rw');
    Route::delete('/rw', [MasterRwController::class, 'destroy'])->name('rw');
    Route::get('/rw/import', [MasterRwController::class, 'import']);
    Route::post('/rw/import', [MasterRwController::class, 'processImport']);
    Route::get('/rw/download', [MasterRwController::class, 'template_excel']);

    // RT
    Route::get('/rt', [MasterRtController::class, 'index'])->name('rt');
    Route::get('/rt/create', [MasterRtController::class, 'create']);
    Route::post('/rt', [MasterRtController::class, 'store']);
    Route::get('/rt/{id}/edit', [MasterRtController::class, 'edit']);
    Route::put('/rt/{id?}', [MasterRtController::class, 'update'])->name('rt');
    Route::delete('/rt', [MasterRtController::class, 'destroy'])->name('rt');
    Route::get('/rt/import', [MasterRtController::class, 'import']);
    Route::post('/rt/import', [MasterRtController::class, 'processImport']);
    Route::get('/rt/download', [MasterRtController::class, 'template_excel']);

    // User
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/create', [UserController::class, 'create']);
    Route::post('/user', [UserController::class, 'store']);
    Route::get('/user/{id}/edit', [UserController::class, 'edit']);
    Route::put('/user/{id?}', [UserController::class, 'update'])->name('user');
    Route::delete('/user', [UserController::class, 'destroy'])->name('user');
    Route::get('/user/{id}/rpw', [UserController::class, 'rpw']);
    Route::put('/user/{id}/rpw', [UserController::class, 'reset']);
});
