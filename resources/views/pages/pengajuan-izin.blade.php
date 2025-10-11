@extends('layouts.master')

@section('title', 'Pengajuan Izin')

@section('content')
    <div class="max-w-7xl mx-auto p-4 sm:p-6">

        <div class="w-full bg-white rounded-xl px-8 py-8">
            <div class="w-full">
                <h2 class="text-3xl mb-4 font-bold text-center">
                    Pengajuan Izin
                </h2>

                <form class="w-full">
                    <!-- Jenis Cuti -->
                    <div class="mb-4">
                        <label for="jenis-cuti" class="block text-sm font-medium text-gray-700 mb-2">Jenis Cuti</label>
                        <select id="jenis-cuti"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md  focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            <option>Pilih Jenis Izin</option>
                            <!-- Add options as needed -->
                        </select>
                    </div>

                    <!-- Tanggal Cuti -->
                    <div class="mb-4">
                        <label for="tanggal-izin" class="block text-sm font-medium text-gray-700 mb-2">Tanggal
                            Izin</label>
                        <input type="date" id="tanggal-izin"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md  focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Silakan pilih tanggal">
                    </div>

                    <div class="div flex gap-2 mb-4">
                        <!-- Tanggal Cuti -->
                        <div class="">
                            <label for="tanggal-izin" class="block text-sm font-medium text-gray-700 mb-2">Jam Mulai</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 " aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="time" id="time"
                                    class=" border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                    min="09:00" max="18:00" value="00:00" required />
                            </div>
                        </div>
                        <!-- Tanggal Cuti -->
                        <div class="">
                            <label for="tanggal-izin" class="block text-sm font-medium text-gray-700 mb-2">Jam
                                Selesai</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 " aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="time" id="time"
                                    class=" border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                    min="09:00" max="18:00" value="00:00" required />
                            </div>
                        </div>
                    </div>

                    <!-- Alasan -->
                    <div class="mb-4">
                        <label for="alasan" class="block text-sm font-medium text-gray-700 mb-2">Keterangan</label>
                        <textarea id="alasan" rows="4"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md  focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Masukkan Keterangan..."></textarea>
                    </div>


                    <button type="button"
                        class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 hover:cursor-pointer">Default</button>
                </form>
            </div>
        </div>

    @endsection
