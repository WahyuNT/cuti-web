@extends('layouts.master')

@section('title', 'Pengajuan Cuti')

@section('content')
    <div class="max-w-7xl mx-auto p-4 sm:p-6">

        <div class="w-full bg-white rounded-xl px-8 py-8">
            <div class="w-full">
                <h2 class="text-3xl mb-4 font-bold text-center">
                    Pengajuan Cuti
                </h2>

                <form class="w-full">
                    <!-- Jenis Cuti -->
                    <div class="mb-4">
                        <label for="jenis-cuti" class="block text-sm font-medium text-gray-700 mb-2">Jenis Cuti</label>
                        <select id="jenis-cuti"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md  focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            <option>Pilih Jenis Cuti</option>
                            <!-- Add options as needed -->
                        </select>
                    </div>

                    <!-- Tanggal Cuti -->
                    <div class="mb-4">
                        <label for="tanggal-cuti" class="block text-sm font-medium text-gray-700 mb-2">Tanggal
                            Cuti</label>
                        <input type="date" id="tanggal-cuti"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md  focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Silakan pilih tanggal">
                    </div>

                    <!-- Alasan -->
                    <div class="mb-4">
                        <label for="alasan" class="block text-sm font-medium text-gray-700 mb-2">Alasan</label>
                        <textarea id="alasan" rows="4"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md  focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Masukkan alasan..."></textarea>
                    </div>

                    <!-- Lama Cuti -->
                    <div class="mb-4">
                        <label for="lama-cuti" class="block text-sm font-medium text-gray-700 mb-2">Lama Cuti</label>
                        <input type="number" id="lama-cuti"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md  focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Lama selama Cuti">
                    </div>
                    <button type="button"
                        class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 hover:cursor-pointer">Default</button>
                </form>
            </div>
        </div>

    @endsection
