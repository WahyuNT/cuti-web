
     <div>
         <div id="main-wrapper"
             class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 via-white to-blue-200 relative overflow-hidden">
             <div class="flex items-center justify-center w-full">
                 <div class="w-full flex justify-center">
                     <div class="w-full max-w-md">
                         <div class="bg-white shadow-lg rounded-xl">
                             <div class="p-6">
                                 <a href="./index.html" class="block text-center py-3">
                                     <img src="{{ asset('images/logos/ptay logo.png') }}" width="100" alt=""
                                         class="mx-auto" />
                                 </a>
                                 <h4 class="text-center font-bold text-xl mb-1">SIAP-DIK</h4>
                                 <p class="text-center text-gray-600 mb-6">
                                     Sistem Informasi Administrasi Pengadaan dan Dokumen Izin-cuti Kepegawaian
                                 </p>

                                 <div>
                                     <div class="mb-4">
                                         <label for="nama"
                                             class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                                         <input wire:model.defer="name" type="text" id="nama"
                                             class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                                         @error('name')
                                             <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                         @enderror
                                     </div>

                                     <div class="mb-4">
                                         <label for="nip"
                                             class="block text-sm font-medium text-gray-700 mb-1">nip</label>
                                         <input wire:model.defer="nip" type="nip" id="nip"
                                             class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                                         @error('nip')
                                             <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                         @enderror
                                     </div>

                                     <div class="mb-6">
                                         <label for="password"
                                             class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                                         <input wire:model.defer="password" type="password" id="password"
                                             class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                                         @error('password')
                                             <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                         @enderror
                                     </div>

                                     <button wire:click="registerStore"
                                         class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition-all duration-200">
                                         Register
                                     </button>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>


