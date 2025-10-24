<?php

namespace App\Services;

use App\Models\CutiApprovalWorkflow;
use App\Models\IzinApprovalWorkflow;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Tymon\JWTAuth\Facades\JWTAuth;

class CutiIzinCountService
{
    /**
     * Show dynamic Livewire alert
     */
    public function CutiCount()
    {
        $user = JWTAuth::parseToken()->authenticate();
        return CutiApprovalWorkflow::with(['cuti.user', 'approvalLevel'])
            ->whereHas('approvalLevel', function ($query) use ($user) {
                $query->where('jabatan_id', $user->jabatan_id);
            })
            ->where('status', 'waiting')
            ->count();
    }
    public function IzinCount()
    {
        $user = JWTAuth::parseToken()->authenticate();
        return IzinApprovalWorkflow::with(['izin.user', 'approvalLevel'])
            ->whereHas('approvalLevel', function ($query) use ($user) {
                $query->where('jabatan_id', $user->jabatan_id);
            })
            ->where('status', 'waiting')
            ->count();
    }
}
