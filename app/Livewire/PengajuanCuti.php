<?php

namespace App\Livewire;

use App\Models\ApprovalLevel;
use App\Models\Cuti;
use App\Models\CutiApprovalLevel;
use App\Models\CutiApprovalWorkflow;
use App\Models\CutiType;
use App\Services\CrudService;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Tymon\JWTAuth\Facades\JWTAuth;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

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
        DB::transaction(function () use ($totalHari) {
            $user = JWTAuth::parseToken()->authenticate();

            $data = [
                'user_id' => $user->id,
                'cuti_type_id' => $this->cuti_type_id,
                'alasan' => $this->alasan,
                'status' => 'pending',
                'tanggal' => $this->tanggal,
                'kuota_used' => 2023,
                'total_hari' => $totalHari,
            ];

            $cuti = Cuti::create($data);

            $approvalLevel = ApprovalLevel::all();

            foreach ($approvalLevel as $workflow) {
                CutiApprovalWorkflow::create([
                    'cuti_id' => $cuti->id,
                    'approval_level_id' => $workflow->id,
                    'status' => 'pending',
                ]);
            }

            LivewireAlert::title('Pengajuan Cuti Berhasil!')
                ->position('top-end')
                ->toast()
                ->success()
                ->show();
        });


        $this->resetInput();
    }
    public function resetInput()
    {
        $this->reset(['cuti_type_id', 'alasan', 'tanggal']);
    }
}
