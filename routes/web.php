<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Livewire\ManajemenUser;
use App\Livewire\PengajuanCuti;
use App\Livewire\PengajuanIzin;

Route::get('/login', [AuthController::class, 'indexLogin'])->name('login');
Route::post('/login-store', [AuthController::class, 'loginStore'])->name('login-store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', fn() => view('pages.register'))->name('register');

Route::middleware(['auth'])->group(function () {
    Route::view('/', 'pages.dashboard')->name('index');
    Route::get('/manajemen-user', ManajemenUser::class)->name('manajemen-user');
    Route::get('/pengajuan-cuti', PengajuanCuti::class)->name('pengajuan-cuti');
    Route::get('/pengajuan-izin', PengajuanIzin::class)->name('pengajuan-izin');
    Route::view('/manajemen-web', 'pages.manajemen-web')->name('manajemen-web');
    Route::view('/permohonan-cuti', 'pages.permohonan-cuti')->name('permohonan-cuti');
    Route::view('/permohonan-izin', 'pages.permohonan-izin')->name('permohonan-izin');
});
