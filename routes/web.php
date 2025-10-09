<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.dashboard');
})->name('dashboard');
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
