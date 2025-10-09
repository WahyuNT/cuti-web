@extends('layouts.master')

@section('title', 'Permohonan Izin')

@section('content')
    <div class="max-w-7xl mx-auto p-4 sm:p-6 ">
        <div class="max-w-7xl mx-auto bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl mb-4 font-bold text-center">
                Permohonan Izin
            </h2>
            <!-- Filters -->
            <div class="flex flex-col sm:flex-row gap-4 mb-6">
                <div class="flex-1">
                    <label for="bulan" class="block text-sm font-medium text-gray-700 mb-2">Bulan</label>
                    <select id="bulan"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md  focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        <option>Semua Bulan</option>
                    </select>
                </div>
                <div class="flex-1">
                    <label for="tahun" class="block text-sm font-medium text-gray-700 mb-2">Semua Tahun</label>
                    <select id="tahun"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md  focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        <option>Semua Tahun</option>
                    </select>
                </div>
                <div class="flex-1">
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select id="status"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md  focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        <option>Semua Status</option>
                    </select>
                </div>
                <div class="flex-1">
                    <label for="pencarian" class="block text-sm font-medium text-gray-700 mb-2">Pencarian</label>
                    <input type="text" id="pencarian"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md  focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Pencarian">
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                                Pegawai</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis
                                Cuti</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tanggal</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Alasan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Keterangan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Opsi
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Preview</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-orange-600 font-medium">Permohonan Cuti
                                Tidak Ada</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
