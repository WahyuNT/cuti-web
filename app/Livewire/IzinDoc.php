<?php

namespace App\Livewire;

use App\Models\Izin;
use Livewire\Component;

class IzinDoc extends Component
{
    public $id;

    public function mount($id)
    {
        $this->id = $id;
    }
    public function render()
    {
        $data = Izin::find($this->id);
        return view('livewire.izin-doc', compact(
            'data'
        ));
    }
}
