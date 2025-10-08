@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    <div class="max-w-7xl mx-auto p-4 sm:p-6">

        <!-- Header -->
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
            <h2 class="text-2xl font-semibold tracking-tight">Hak Cuti</h2>
            <div class="shadow-sm border rounded-xl px-4 py-2 bg-white">
                <h5 class="m-0 text-sm sm:text-base font-medium">Sabtu, 4 Oktober 2025</h5>
            </div>
        </div>

        <!-- Top section -->
        <div class="mt-4 mb-6 flex flex-col lg:flex-row gap-4">
            <!-- Tabel Tahun/Sisa -->
            <div class="w-full lg:w-1/2">
                <div class="bg-white shadow-sm border rounded-xl p-3">
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm">
                            <thead>
                                <tr class="text-gray-600">
                                    <th class="py-3 px-3 text-left font-semibold">Tahun</th>
                                    <th class="py-3 px-3 text-left font-semibold">Sisa</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y">
                                <!-- contoh data statis -->
                                <tr>
                                    <td class="py-3 px-3">2025</td>
                                    <td class="py-3 px-3">12 Hari</td>
                                </tr>
                                <tr>
                                    <td class="py-3 px-3">2024</td>
                                    <td class="py-3 px-3">6 Hari</td>
                                </tr>
                                <tr>
                                    <td class="py-3 px-3">2023</td>
                                    <td class="py-3 px-3">3 Hari</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Deskripsi Cuti Type -->
            <div class="w-full lg:flex-1">
                <div class="bg-white shadow-sm border rounded-xl px-4 pt-4 pb-2">
                    <div class="flex flex-col gap-3">
                        <!-- contoh item -->
                        <div class="flex flex-col sm:flex-row gap-1">
                            <div class="sm:w-1/2">
                                <h6 class="text-sm font-semibold">Cuti Tahunan</h6>
                            </div>
                            <div class="sm:w-1/2">
                                <p class="text-sm text-gray-600">Kuota 12 hari / tahun</p>
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row gap-1">
                            <div class="sm:w-1/2">
                                <h6 class="text-sm font-semibold">Cuti Sakit</h6>
                            </div>
                            <div class="sm:w-1/2">
                                <p class="text-sm text-gray-600">Sesuai ketentuan dokter</p>
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row gap-1">
                            <div class="sm:w-1/2">
                                <h6 class="text-sm font-semibold">Cuti Besar</h6>
                            </div>
                            <div class="sm:w-1/2">
                                <p class="text-sm text-gray-600">6 bln (syarat masa kerja)</p>
                            </div>
                        </div>
                        <!-- end contoh -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Riwayat Cuti -->
        <h2 class="text-2xl font-semibold mb-3">Riwayat <span class="font-extrabold">Cuti</span></h2>
        <!-- versi “bukan Ketua” (4 kartu) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
            <!-- Dalam Proses -->
            <div class="bg-white shadow-sm border rounded-2xl overflow-hidden">
                <div class="px-4 py-3 bg-amber-400/20 border-b border-amber-300 flex items-center justify-between">
                    <h4 class="font-semibold">Dalam Proses</h4>
                    <h4 class="font-semibold">3</h4>
                </div>
                <div class="p-4 flex items-center justify-between">
                    <h5 class="font-medium">Rincian</h5>
                    <a href="#" class="inline-flex items-center gap-2 text-amber-600 hover:underline">
                        <span class="text-sm">Lihat</span>
                        <!-- icon panah -->
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M13.5 5.5 20 12l-6.5 6.5m6.5-6.5H4" />
                        </svg>
                    </a>
                </div>
            </div>
            <!-- Menunggu Ketua -->
            <div class="bg-white shadow-sm border rounded-2xl overflow-hidden">
                <div class="px-4 py-3 bg-blue-500/20 border-b border-blue-300 flex items-center justify-between">
                    <h4 class="font-semibold">Menunggu Ketua</h4>
                    <h4 class="font-semibold">1</h4>
                </div>
                <div class="p-4 flex items-center justify-between">
                    <h5 class="font-medium">Rincian</h5>
                    <a href="#" class="inline-flex items-center gap-2 text-blue-600 hover:underline">
                        <span class="text-sm">Lihat</span>
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M13.5 5.5 20 12l-6.5 6.5m6.5-6.5H4" />
                        </svg>
                    </a>
                </div>
            </div>
            <!-- Ditolak -->
            <div class="bg-white shadow-sm border rounded-2xl overflow-hidden">
                <div class="px-4 py-3 bg-red-500/20 border-b border-red-300 flex items-center justify-between">
                    <h4 class="font-semibold">Ditolak</h4>
                    <h4 class="font-semibold">2</h4>
                </div>
                <div class="p-4 flex items-center justify-between">
                    <h5 class="font-medium">Rincian</h5>
                    <a href="#" class="inline-flex items-center gap-2 text-red-600 hover:underline">
                        <span class="text-sm">Lihat</span>
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M13.5 5.5 20 12l-6.5 6.5m6.5-6.5H4" />
                        </svg>
                    </a>
                </div>
            </div>
            <!-- Diterima -->
            <div class="bg-white shadow-sm border rounded-2xl overflow-hidden">
                <div class="px-4 py-3 bg-green-500/20 border-b border-green-300 flex items-center justify-between">
                    <h4 class="font-semibold">Diterima</h4>
                    <h4 class="font-semibold">9</h4>
                </div>
                <div class="p-4 flex items-center justify-between">
                    <h5 class="font-medium">Rincian</h5>
                    <a href="#" class="inline-flex items-center gap-2 text-green-600 hover:underline">
                        <span class="text-sm">Lihat</span>
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M13.5 5.5 20 12l-6.5 6.5m6.5-6.5H4" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Riwayat Izin -->
        <h2 class="text-2xl font-semibold mb-3">Riwayat <span class="font-extrabold">Izin</span></h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Dalam Proses -->
            <div class="bg-white shadow-sm border rounded-2xl overflow-hidden">
                <div class="px-4 py-3 bg-amber-400/20 border-b border-amber-300 flex items-center justify-between">
                    <h4 class="font-semibold">Dalam Proses</h4>
                    <h4 class="font-semibold">2</h4>
                </div>
                <div class="p-4 flex items-center justify-between">
                    <h5 class="font-medium">Rincian</h5>
                    <a href="#" class="inline-flex items-center gap-2 text-amber-600 hover:underline">
                        <span class="text-sm">Lihat</span>
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M13.5 5.5 20 12l-6.5 6.5m6.5-6.5H4" />
                        </svg>
                    </a>
                </div>
            </div>
            <!-- Ditolak -->
            <div class="bg-white shadow-sm border rounded-2xl overflow-hidden">
                <div class="px-4 py-3 bg-red-500/20 border-b border-red-300 flex items-center justify-between">
                    <h4 class="font-semibold">Ditolak</h4>
                    <h4 class="font-semibold">1</h4>
                </div>
                <div class="p-4 flex items-center justify-between">
                    <h5 class="font-medium">Rincian</h5>
                    <a href="#" class="inline-flex items-center gap-2 text-red-600 hover:underline">
                        <span class="text-sm">Lihat</span>
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M13.5 5.5 20 12l-6.5 6.5m6.5-6.5H4" />
                        </svg>
                    </a>
                </div>
            </div>
            <!-- Diterima -->
            <div class="bg-white shadow-sm border rounded-2xl overflow-hidden">
                <div class="px-4 py-3 bg-green-500/20 border-b border-green-300 flex items-center justify-between">
                    <h4 class="font-semibold">Diterima</h4>
                    <h4 class="font-semibold">5</h4>
                </div>
                <div class="p-4 flex items-center justify-between">
                    <h5 class="font-medium">Rincian</h5>
                    <a href="#" class="inline-flex items-center gap-2 text-green-600 hover:underline">
                        <span class="text-sm">Lihat</span>
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M13.5 5.5 20 12l-6.5 6.5m6.5-6.5H4" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

    @endsection
