<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Livewire\ManajemenUser;


Route::get('/login', [AuthController::class, 'indexLogin'])->name('login');
Route::post('/login-store', [AuthController::class, 'loginStore'])->name('login-store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', fn() => view('pages.register'))->name('register');

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {return view('pages.dashboard');})->name('index');
        Route::get('/manajemen-user', ManajemenUser::class)->name('manajemen-user');
});


Route::get('/pengajuan-cuti', function () {
    return view('pages.pengajuan-cuti');
})->name('pengajuan-cuti');
Route::get('/pengajuan-izin', function () {
    return view('pages.pengajuan-izin');
})->name('pengajuan-izin');
Route::get('/permohonan-cuti', function () {
    return view('pages.permohonan-cuti');
})->name('permohonan-cuti');
Route::get('/permohonan-izin', function () {
    return view('pages.permohonan-izin');
})->name('permohonan-izin');
