<?php

namespace App\Livewire;

use App\Services\CutiIzinCountService;
use Livewire\Component;

class Sidebar extends Component
{
    public function render()
    {
        $service = new CutiIzinCountService();
        $izinCount = $service->IzinCount();
        $cutiCount = $service->CutiCount();
        return view('livewire.sidebar', compact('izinCount', 'cutiCount'));
    }
}
