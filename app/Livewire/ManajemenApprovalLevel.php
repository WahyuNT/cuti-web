<?php

namespace App\Livewire;

use App\Models\ApprovalLevel;
use App\Models\Jabatan;
use App\Services\CrudService;
use Livewire\Component;

class ManajemenApprovalLevel extends Component
{
    public $mode = 'view';
    public $editId = null;
    public $deleteId = null;
    public $jabatan_id;

    protected $rules = [
        'jabatan_id' => 'required|integer',
    ];

    public function render()
    {
        $data = ApprovalLevel::orderBy('id', 'asc')
            ->get();

        $jabatanTypes = Jabatan::where('status', 'active')
            ->pluck('name', 'id')
            ->toArray();

        return view('livewire.manajemen-approval-level', compact('data', 'jabatanTypes'));
    }


    public function toggleMode()
    {
        $this->mode = $this->mode === 'view' ? 'create' : 'view';
    }
    public function resetInput()
    {
        $this->mode = 'view';
        $this->editId = null;
        $this->resetValidation();
        $this->reset(['jabatan_id']);
    }
    public function create(CrudService $crud)
    {
        $this->validate();

        $data = [
            'jabatan_id' => $this->jabatan_id,
        ];

        $crud->create(ApprovalLevel::class, $data, 'Tahapan Cuti berhasil dibuat!', 'Gagal membuat Tahapan Cuti.');
        $this->resetInput();
    }
    public function edit($id, CrudService $crud)
    {
        $data = $crud->find(ApprovalLevel::class, $id);

        if ($data) {
            $this->jabatan_id = $data->jabatan_id;
            $this->mode = 'edit';
            $this->editId = $id;
        }
    }
    public function update(CrudService $crud)
    {

        $this->validate();
        $data = [
            'jabatan_id' => $this->jabatan_id,
        ];
        $crud->update(ApprovalLevel::class, $this->editId, $data, 'Tahapan Cuti berhasil diperbarui!', 'Gagal memperbarui Tahapan Cuti .');
        $this->resetInput();
    }

    public function delete($id, CrudService $crud)
    {
        $crud->delete(ApprovalLevel::class, $id, 'Tahapan Cuti berhasil dihapus!', 'Gagal menghapus Tahapan Cuti.');
        $this->resetInput();
    }
}
