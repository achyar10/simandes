<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CitizenController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FamilyCardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\MasterRtController;
use App\Http\Controllers\MasterRwController;
use App\Http\Controllers\PostController;
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

Route::get('/', [LandingController::class, 'index']);

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

    // Family Card
    Route::get('/familycard', [FamilyCardController::class, 'index'])->name('familycard');
    Route::get('/familycard/create', [FamilyCardController::class, 'create']);
    Route::post('/familycard', [FamilyCardController::class, 'store']);
    Route::get('/familycard/{id}/edit', [FamilyCardController::class, 'edit']);
    Route::put('/familycard/{id?}', [FamilyCardController::class, 'update'])->name('familycard');
    Route::delete('/familycard', [FamilyCardController::class, 'destroy'])->name('familycard');
    Route::get('/familycard/import', [FamilyCardController::class, 'import']);
    Route::post('/familycard/import', [FamilyCardController::class, 'processImport']);
    Route::get('/familycard/download', [FamilyCardController::class, 'template_excel']);

    // Citizens
    Route::get('/citizen', [CitizenController::class, 'index'])->name('citizen');
    Route::get('/citizen/create', [CitizenController::class, 'create']);
    Route::post('/citizen', [CitizenController::class, 'store'])->name('citizen');
    Route::get('/citizen/{id}/edit', [CitizenController::class, 'edit']);
    Route::put('/citizen/{id?}', [CitizenController::class, 'update'])->name('citizen');
    Route::delete('/citizen', [CitizenController::class, 'destroy'])->name('citizen');
    Route::get('/citizen/import', [CitizenController::class, 'import']);
    Route::post('/citizen/import', [CitizenController::class, 'processImport']);
    Route::get('/citizen/download', [CitizenController::class, 'template_excel']);

    // User
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/create', [UserController::class, 'create']);
    Route::post('/user', [UserController::class, 'store']);
    Route::get('/user/{id}/edit', [UserController::class, 'edit']);
    Route::put('/user/{id?}', [UserController::class, 'update'])->name('user');
    Route::delete('/user', [UserController::class, 'destroy'])->name('user');
    Route::get('/user/{id}/rpw', [UserController::class, 'rpw']);
    Route::put('/user/{id}/rpw', [UserController::class, 'reset']);

    // Banner
    Route::get('/banner', [BannerController::class, 'index'])->name('banner');
    Route::get('/banner/create', [BannerController::class, 'create']);
    Route::post('/banner', [BannerController::class, 'store']);
    Route::get('/banner/{id}/edit', [BannerController::class, 'edit']);
    Route::put('/banner/{id?}', [BannerController::class, 'update'])->name('banner');
    Route::delete('/banner', [BannerController::class, 'destroy'])->name('banner');

    // Category
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/category/create', [CategoryController::class, 'create']);
    Route::post('/category', [CategoryController::class, 'store']);
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit']);
    Route::put('/category/{id?}', [CategoryController::class, 'update'])->name('category');
    Route::delete('/category', [CategoryController::class, 'destroy'])->name('category');

    // Post
    Route::get('/post', [PostController::class, 'index'])->name('post');
    Route::get('/post/create', [PostController::class, 'create']);
    Route::post('/post', [PostController::class, 'store']);
    Route::get('/post/{id}/edit', [PostController::class, 'edit']);
    Route::put('/post/{id?}', [PostController::class, 'update'])->name('post');
    Route::delete('/post', [PostController::class, 'destroy'])->name('post');
});
