<?php

namespace App\Livewire;

use App\Models\Cuti;
use App\Models\CutiApprovalWorkflow;
use App\Models\CutiType;
use App\Models\Tahun;
use Livewire\Component;
use Livewire\WithPagination;
use Tymon\JWTAuth\Facades\JWTAuth;

class PermohonanCuti extends Component
{
    use WithPagination;
    public $tahun;
    public $cutiType;
    public $bulan;
    public $status;
    public $filter;

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

        $user = JWTAuth::parseToken()->authenticate();

        $approvalList = CutiApprovalWorkflow::wherehas('approvalLevel', function ($query) use ($user) {
            $query->where('jabatan_id', $user->jabatan_id);
        })->where('status', 'waiting')->pluck('cuti_id')->toArray();

        $data = Cuti::wherein('id', $approvalList)
            ->when($this->tahun, function ($query) {
                return $query->whereYear('created_at', $this->tahun);
            })
            ->when($this->cutiType, function ($query) {
                return $query->where('cuti_type_id', $this->cutiType);
            })
            ->when($this->filter, function ($query) {
                $query->where(function ($subquery) {
                    $subquery->where('alasan', 'like', '%' . $this->filter . '%')
                        ->orWhereHas('user', function ($izinTypeQuery) {
                            $izinTypeQuery->where('name', 'like', '%' . $this->filter . '%');
                        });
                });
            })
            ->when($this->status, function ($query) {
                $query->where('status', $this->status);
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('livewire.permohonan-cuti', compact('data', 'tahunData', 'cutiTypesData'))->extends('layouts.master');
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

    public function approve($id)
    {
        $user = JWTAuth::parseToken()->authenticate();

        $cutiApprovalWorkflow = CutiApprovalWorkflow::where('cuti_id', $id)->get();

        $currentIndex = $cutiApprovalWorkflow->search(function ($item) use ($user) {
            return $item->approval_level_id == $user->jabatan_id && $item->status == 'waiting';
        });

        if ($currentIndex !== false) {
            $dataCurrent = $cutiApprovalWorkflow[$currentIndex];
            $dataCurrent->status = 'success';
            $dataCurrent->save();

            if (isset($cutiApprovalWorkflow[$currentIndex + 1])) {
                $dataNextIndex = $cutiApprovalWorkflow[$currentIndex + 1];
                $dataNextIndex->status = 'waiting';
                $dataNextIndex->save();
            }
        }
    }

    public function reject($id)
    {
        $cuti = Cuti::find($id);
        $cuti->status = 'rejected';
        $cuti->save();

        $cutiApprovalWorkflow =CutiApprovalWorkflow::where('cuti_id', $id)
        ->get();
    }
}
