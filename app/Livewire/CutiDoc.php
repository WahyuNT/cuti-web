<?php

namespace App\Livewire;

use App\Models\Cuti;
use App\Models\CutiApprovalWorkflow;
use App\Models\User;
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
        $atasan = CutiApprovalWorkflow::where('cuti_id', $this->id)->wherehas('approvalLevel', function ($q) {
            $q->where('is_sign', true);
        })->get();

        $jabatanAtasan1 = $atasan[0]->approvalLevel->jabatan_id ?? null;
        $jabatanAtasan2 = $atasan[1]->approvalLevel->jabatan_id ?? null;

        $atasan1 = User::where('jabatan_id', $jabatanAtasan1)->first();
        $atasan2 = User::where('jabatan_id', $jabatanAtasan2)->first();


        return view('livewire.cuti-doc', compact('data', 'atasan1', 'atasan2'));
    }
}
