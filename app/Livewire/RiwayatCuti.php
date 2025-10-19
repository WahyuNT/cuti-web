<?php

namespace App\Livewire;

use App\Models\Cuti;
use App\Models\CutiApprovalWorkflow;
use App\Models\CutiType;
use App\Models\Tahun;
use Livewire\Component;
use Livewire\WithPagination;
use Tymon\JWTAuth\Facades\JWTAuth;

class RiwayatCuti extends Component
{
    use WithPagination;
    public $tahun;
    public $cutiType;
    public $bulan;
    public $status;
    public $filter;
    public $viewFlowId;
    public $flowData;

    public function mount()
    {
        $this->status = request()->query('status');
    }

    public function render()
    {
        $tahunData = Tahun::where('status', 'active')
            ->pluck('tahun', 'tahun')
            ->toArray();
        $cutiTypesData = CutiType::where('status', 'active')
            ->pluck('name', 'id')
            ->toArray();

        $data = Cuti::where('user_id', JWTAuth::parseToken()->authenticate()->id)
            ->when($this->tahun, function ($query) {
                return $query->whereYear('created_at', $this->tahun);
            })
            ->when($this->cutiType, function ($query) {
                return $query->where('cuti_type_id', $this->cutiType);
            })
            ->when($this->filter, function ($query) {
                $query->where(function ($subquery) {
                    $subquery->where('alasan', 'like', '%' . $this->filter . '%');
                });
            })
            ->when($this->status, function ($query) {
                $query->where('status', $this->status);
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('livewire.riwayat-cuti', compact('data', 'tahunData', 'cutiTypesData'))->extends('layouts.master');
    }
    public function viewFlow($id)
    {
        $flowData = CutiApprovalWorkflow::with('approvalLevel')
            ->where('cuti_id', $id)
            ->orderBy('id')
            ->get();
            
        $this->flowData = $flowData;
    }
    public function updatedFilter()
    {
        $this->resetPage();
    }
    public function updatedTahun()
    {
        $this->resetPage();
    }
    public function updatedCutiType()
    {
        $this->resetPage();
    }
    public function updatedBulan()
    {
        $this->resetPage();
    }
    public function updatedStatus()
    {
        $this->resetPage();
    }
}
