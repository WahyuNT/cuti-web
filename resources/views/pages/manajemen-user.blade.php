@extends('layouts.master')

@section('title', 'Manajemen User')

@section('content')
    <div class="bg-white rounded-xl p-4">
        <div class="w-full">
            <h2 class="text-2xl font-bold text-center">Manajemen User</h2>
        </div>
        <div class="w-full grid grid-cols-2 gap-4 mt-4 items-end">
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">
                    Cari Nama
                </label>
                <input type="text" id="first_name" placeholder="Nama User" required
                    class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
            </div>

            <div class="flex justify-end items-end">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none 
                   focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                    Tambah User
                </button>
            </div>

        </div>
        <div class="w-full mt-3 py-2 ">


            <div class="relative overflow-x-auto rounded-xl border-1 border-gray-200">
                <table class="w-full text-sm text-left rtl:text-right text-gray-700  overflow-hidden">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 rounded-t-xl">
                        <tr>
                            <th scope="col" class="px-6 py-3">Product name</th>
                            <th scope="col" class="px-6 py-3">Color</th>
                            <th scope="col" class="px-6 py-3">Category</th>
                            <th scope="col" class="px-6 py-3">Price</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="odd:bg-white even:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                Apple MacBook Pro 17"
                            </th>
                            <td class="px-6 py-4">Silver</td>
                            <td class="px-6 py-4">Laptop</td>
                            <td class="px-6 py-4">$2999</td>
                            <td class="px-6 py-4">
                                <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                            </td>
                        </tr>
                        <tr class="odd:bg-white even:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                Microsoft Surface Pro
                            </th>
                            <td class="px-6 py-4">White</td>
                            <td class="px-6 py-4">Laptop PC</td>
                            <td class="px-6 py-4">$1999</td>
                            <td class="px-6 py-4">
                                <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                            </td>
                        </tr>
                        <tr class="odd:bg-white even:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                Magic Mouse 2
                            </th>
                            <td class="px-6 py-4">Black</td>
                            <td class="px-6 py-4">Accessories</td>
                            <td class="px-6 py-4">$99</td>
                            <td class="px-6 py-4">
                                <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                            </td>
                        </tr>
                        <tr class="odd:bg-white even:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                Google Pixel Phone
                            </th>
                            <td class="px-6 py-4">Gray</td>
                            <td class="px-6 py-4">Phone</td>
                            <td class="px-6 py-4">$799</td>
                            <td class="px-6 py-4">
                                <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                            </td>
                        </tr>
                        <tr class="odd:bg-white even:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                Apple Watch 5
                            </th>
                            <td class="px-6 py-4">Red</td>
                            <td class="px-6 py-4">Wearables</td>
                            <td class="px-6 py-4">$999</td>
                            <td class="px-6 py-4">
                                <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>



        </div>

    </div>

@endsection
