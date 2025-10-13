<div class="bg-white rounded-xl p-4">
    <h2 class="text-2xl mb-5 font-bold text-center">
        Riwayat Cuti
    </h2>
    <!-- Filters -->
    <div class="flex flex-col sm:flex-row gap-4 mb-6">
        <div class="flex-1">
            <x-select label="Tipe Cuti" for="cutiType" wire="cutiType" wireType="change" placeholder="Semua Tipe Cuti"
                :options="$cutiTypesData" :required="false" />
        </div>
        <div class="flex-1">
            <x-select label="Tahun" for="tahun" wire="tahun" wireType="change" placeholder="Semua Tahun"
                :options="$tahunData" :required="false" />
        </div>
        <div class="flex-1">
            <x-select label="Status" for="status" wire="status" wireType="change" placeholder="Semua Status"
                :options="[
                    'failed' => 'Ditolak',
                    'pending' => 'Menunggu',
                    'success' => 'Diterima',
                ]" />
        </div>
        <div class="flex-1">
            <x-input label="Pencarian" for="filter" wire="filter" wireType="live" type="text"
                placeholder="Masukkan Alasan" />
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis
                        Cuti</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Tanggal</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Alasan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($data as $item)
                    <tr>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $data->firstItem() + $loop->index }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $item->cutiType->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            @foreach (explode(',', $item->tanggal) as $tgl)
                                <span
                                    class="inline-block bg-[var(--info)] text-white text-xs font-semibold mb-0.5 px-1.5 py-0.5 rounded">
                                    {{ trim($tgl) }}
                                </span>
                            @endforeach
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $item->alasan }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            <span
                                class="px-3 py-1 rounded-full text-white text-xs font-semibold
                                    @if ($item->status === 'success') bg-[var(--info)]
                                    @elseif($item->status === 'failed')
                                        bg-[var(--danger)]
                                    @else
                                        bg-[var(--warning)] @endif">{{ ucfirst($item->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900"><button
                                class="bg-[var(--primary)] text-white px-1 py-1 rounded-md hover:cursor-pointer hover:scale-105"><i
                                    class="fa-solid fa-print"></i></button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-sm text-gray-500 bg-gray-50">
                            Data Tidak Ada
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">
        {{ $data->links('vendor.livewire.tailwind') }}
    </div>
</div>
