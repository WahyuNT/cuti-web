<div class="bg-white rounded-xl p-4">
    @if ($mode == 'view')

        <div class="w-full">
            <h2 class="text-2xl font-bold text-center">Manajemen User</h2>
        </div>
        <div class="w-full">
            <div class="w-full grid grid-cols-2 gap-4 mt-4 items-end">

                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">
                        Cari Nama
                    </label>
                    <input type="text" id="first_name" placeholder="Nama User" required
                        class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                </div>

                <div class="flex justify-end items-end">
                    <button wire:click="toggleMode" type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center hover:cursor-pointer">
                        Tambah User
                    </button>
                </div>

            </div>
            <div class="w-full mt-3 py-2 ">
                <div class="relative overflow-x-auto rounded-xl border-1 border-gray-200">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-700  overflow-hidden">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100 rounded-t-xl">
                            <tr>
                                <th scope="col" class="px-6 py-3">Nama</th>
                                <th scope="col" class="px-6 py-3">NIP</th>
                                <th scope="col" class="px-6 py-3">Role</th>
                                <th scope="col" class="px-6 py-3">Jabatan</th>
                                <th scope="col" class="px-6 py-3">Nomor WA</th>
                                <th scope="col" class="px-6 py-3 ">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($user as $item)
                                <tr class="odd:bg-white even:bg-gray-50">
                                    <td class="px-6 py-4">{{ $item->name }}</td>
                                    <td class="px-6 py-4">{{ $item->nip }}</td>
                                    <td class="px-6 py-4">{{ $item->role_id }}</td>
                                    <td class="px-6 py-4">{{ $item->jabatan }}</td>
                                    <td class="px-6 py-4 ">{{ $item->nomor_wa }}</td>
                                    <td class="">
                                        <button wire:click="edit({{ $item->id }})"
                                            class="text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none 
                                    focus:ring-yellow-300 font-medium rounded-lg text-sm w-full sm:w-auto px-1.5 py-1.5 text-center hover:cursor-pointer">
                                            <i class="fa-solid fa-pen"></i>
                                        </button>
                                        <button
                                            class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none 
                                    focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-1.5 py-1.5 text-center hover:cursor-pointer">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @elseif($mode == 'edit')
        <div class="w-full">
            <h2 class="text-2xl font-bold text-center">Edit User</h2>
        </div>
        <div class="w-full mt-4">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">
                        Nama
                    </label>
                    <input wire:model.defer="name" type="text" id="first_name" placeholder="Nama User" required
                        class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">
                        NIP
                    </label>
                    <input wire:model.defer="nip" type="text" id="last_name" placeholder="NIP User" required
                        class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    @error('nip')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="role" class="block mb-2 text-sm font-medium text-gray-900">
                        Role
                    </label>
                    <select wire:model.defer="role_id" id="role"
                        class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="">Pilih Role</option>
                        <option value="0">Admin</option>
                        <option value="1">User</option>
                    </select>
                    @error('role_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="jabatan" class="block mb-2 text-sm font-medium text-gray-900">
                        Jabatan
                    </label>
                    <input wire:model.defer="jabatan" type="text" id="jabatan" placeholder="Jabatan User" required
                        class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    @error('jabatan')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="nomor_wa" class="block mb-2 text-sm font-medium text-gray-900">
                        Nomor WA
                    </label>
                    <input wire:model.defer="nomor_wa" type="text" id="nomor_wa" placeholder="Nomor WA User"
                        required
                        class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    @error('nomor_wa')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">
                        Password
                    </label>
                    <input wire:model.defer="password" type="password" id="password" placeholder="Password User"
                        required
                        class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-2 flex justify-end items-end">
                    @if ($editId)
                        <button wire:click="update" type="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center hover:cursor-pointer">
                            Simpan Perubahan
                        </button>
                    @else
                        <button wire:click="update" type="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center hover:cursor-pointer">
                            Simpan User
                        </button>
                    @endif
                    <button type="button" wire:click="resetInput"
                        class="text-white bg-gray-600 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ml-2 hover:cursor-pointer">
                        Batal
                    </button>
                </div>

            </div>

    @endif
</div>
