<?php

namespace App\Livewire;

use App\Models\Izin;
use App\Models\IzinType;
use App\Models\Tahun;
use Livewire\Component;
use Livewire\WithPagination;
use Tymon\JWTAuth\Facades\JWTAuth;
use Barryvdh\DomPDF\Facade\Pdf;

class RiwayatIzin extends Component
{
    use WithPagination;
    public $tahun;
    public $izinType;
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
        $izinTypesData = IzinType::where('status', 'active')
            ->pluck('name', 'id')
            ->toArray();

        $data = Izin::where('user_id', JWTAuth::parseToken()->authenticate()->id)
            ->when($this->tahun, function ($query) {
                return $query->whereYear('created_at', $this->tahun);
            })
            ->when($this->izinType, function ($query) {
                return $query->where('izin_type_id', $this->izinType);
            })
            ->when($this->filter, function ($query) {
                $query->where(function ($subquery) {
                    $subquery->where('keperluan', 'like', '%' . $this->filter . '%');
                });
            })
            ->when($this->status, function ($query) {
                $query->where('status', $this->status);
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('livewire.riwayat-izin', compact('data', 'tahunData', 'izinTypesData'))->extends('layouts.master');
    }
    public function updatedFilter()
    {
        $this->resetPage();
    }
    public function updatedTahun()
    {
        $this->resetPage();
    }
    public function updatedIzinType()
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
    public function downloadPdf($id)
    {
        $data = Izin::find($id);

        $html = view('livewire.izin-doc', ['data' => $data])->render();

        $pdf = Pdf::loadHTML($html)->setPaper('a4', 'portrait');

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, 'Surat Izin.pdf');
    }
}
