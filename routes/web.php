<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostJobController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('login');
// });

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/adminindex', function () {
//     return view('admin.index');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//  Admin
Route::middleware(['auth', 'cekRole:1'])->group(function () {
    Route::get('/admin', [UserController::class, 'index'])->name('admin-index');
    Route::post('/admin/create', [UserController::class, 'store'])->name('admin-store');
    Route::get('/admin/create', [UserController::class, 'create'])->name('admin-create');
    Route::patch('/admin/edit/{id}', [UserController::class, 'update'])->name('admin-update');
    Route::get('/admin/edit/{id}', [UserController::class, 'edit'])->name('admin-edit');
    Route::get('/admin/delete/{id}', [UserController::class, 'destroy'])->name('admin-delete');
});

// Prodi
Route::middleware(['auth', 'cekRole:2'])->group(function () {

    // Post Job
    Route::get('/company/PostJob', [PostJobController::class, 'index'])->name('pj-index');
    Route::post('/company/PostJob/create', [PostJobController::class, 'store'])->name('pj-store');
    Route::get('/company/PostJob/create', [PostJobController::class, 'create'])->name('pj-create');
    Route::patch('/company/edit/{id}', [PostJobController::class, 'update'])->name('pj-update');
    Route::get('/company/edit/{id}', [PostJobController::class, 'edit'])->name('pj-edit');
    Route::get('/company/delete/{id}', [PostJobController::class, 'destroy'])->name('pj-delete');

    // Application
    Route::get('/company/apply', [ApplicationController::class, 'index'])->name('apl-index');
    Route::post('companyy/apply/create', [ApplicationController::class, 'store'])->name('apl-store');
    Route::get('/company/apply/create', [ApplicationController::class, 'create'])->name('apl-create');
    Route::patch('company/apply/edit/{id}', [ApplicationController::class, 'update'])->name('apl-update');
    Route::get('/company/apply/edit/{id}', [ApplicationController::class, 'edit'])->name('apl-edit');
    Route::get('/company/apply/delete/{id}', [ApplicationController::class, 'destroy'])->name('apl-delete');
});

// Job Seeker
Route::middleware(['auth', 'cekRole:3'])->group(function () {

    // Apply
    Route::get('/jobseeker', [ApplyController::class, 'index'])->name('jba-index');
    Route::post('/jobseeker/apply/store{id}', [ApplyController::class, 'store'])->name('jba-store');
    Route::get('/jobseeker/apply/create{id}', [ApplyController::class, 'create'])->name('jba-create');


});


require __DIR__.'/auth.php';
