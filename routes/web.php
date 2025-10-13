<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Livewire\ManajemenUser;
use App\Livewire\PengajuanCuti;
use App\Livewire\PengajuanIzin;
use App\Livewire\RiwayatCuti;
use App\Livewire\RiwayatIzin;
use App\Livewire\PermohonanIzin;
use App\Livewire\PermohonanCuti;

Route::get('/login', [AuthController::class, 'indexLogin'])->name('login');
Route::post('/login-store', [AuthController::class, 'loginStore'])->name('login-store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', fn() => view('pages.register'))->name('register');

Route::middleware(['auth'])->group(function () {
    Route::view('/', 'pages.dashboard')->name('index');
    Route::get('/manajemen-user', ManajemenUser::class)->name('manajemen-user');
    Route::get('/pengajuan-cuti', PengajuanCuti::class)->name('pengajuan-cuti');
    Route::get('/pengajuan-izin', PengajuanIzin::class)->name('pengajuan-izin');
    Route::get('/riwayat-cuti', RiwayatCuti::class)->name('riwayat-cuti');
    Route::get('/riwayat-izin', RiwayatIzin::class)->name('riwayat-izin');
    Route::get('/permohonan-cuti', PermohonanCuti::class)->name('permohonan-cuti');
    Route::get('/permohonan-izin', PermohonanIzin::class)->name('permohonan-izin');
    Route::view('/manajemen-web', 'pages.manajemen-web')->name('manajemen-web');
});
