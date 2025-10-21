<?php

namespace App\Livewire;

use App\Models\Cuti;
use Livewire\Component;

class CutiDoc extends Component
{
    public $id;

    public function mount($id)
    {
        $this->id = $id;
    }

    public function render()
    {
         $data = Cuti::find($this->id);
        return view('livewire.cuti-doc', compact(
            'data'
        ));
    }
}
