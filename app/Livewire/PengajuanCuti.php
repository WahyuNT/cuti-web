<?php

namespace App\Livewire;

use App\Models\Cuti;
use App\Models\CutiType;
use App\Services\CrudService;
use Livewire\Component;
use Tymon\JWTAuth\Facades\JWTAuth;

class PengajuanCuti extends Component
{
    public $cuti_type_id, $alasan, $tanggal;

    public function render()
    {
        $cutiTypes = CutiType::where('status', 'active')
            ->pluck('name', 'id')
            ->toArray();
        return view('livewire.pengajuan-cuti', compact('cutiTypes'))->extends('layouts.master');
    }

    public function create(CrudService $crud)
    {
        $this->validate([
            'cuti_type_id' => 'required',
            'alasan' => 'required',
            'tanggal' => 'required',
        ]);
        
        $totalHari = 0;
        if (!empty($this->tanggal)) {
            $tanggalArray = explode(',', $this->tanggal);
            $totalHari = count(array_map('trim', $tanggalArray));
        }
        $data = [
            'user_id' => JWTAuth::parseToken()->authenticate()->id,
            'cuti_type_id' => $this->cuti_type_id,
            'alasan' => $this->alasan,
            'status' => 'pending',
            'tanggal' => $this->tanggal,
            'kuota_used' => 2023,
            'total_hari' => $totalHari,
        ];
        $crud->create(Cuti::class, $data, 'Cuti berhasil dibuat!', 'Gagal membuat cuti.');
        $this->resetInput();
    }
    public function resetInput()
    {
        $this->reset(['cuti_type_id', 'alasan', 'tanggal']);
    }
}
