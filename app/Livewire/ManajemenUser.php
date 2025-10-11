<?php

namespace App\Livewire;

use App\Models\User;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class ManajemenUser extends Component
{
    public $title = 'Manajemen User';
    public $mode = 'view';
    public $editId = null;
    public $name, $nip, $password, $role_id, $jabatan, $nomor_wa;


    public function render()
    {
        $user = User::all();
        return view('livewire.manajemen-user', compact('user'))->extends('layouts.master');
    }
    public function toggleMode()
    {
        $this->mode = $this->mode === 'view' ? 'edit' : 'view';
    }
    public function resetInput()
    {
        $this->mode = 'view';
        $this->resetValidation();
        $this->reset(['name', 'nip', 'password', 'role_id', 'jabatan', 'nomor_wa']);
    }
    public function create()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|string|max:20|unique:users,nip',
            'password' => 'required|string|min:8',
            'role_id' => 'required|integer',
            'jabatan' => 'required|string|max:100',
            'nomor_wa' => 'required|string|max:15',
        ]);

        $user = new User();
        $user->name = $this->name;
        $user->nip = $this->nip;
        $user->password = bcrypt($this->password);
        $user->role_id = $this->role_id;
        $user->jabatan = $this->jabatan;
        $user->nomor_wa = $this->nomor_wa;
        $user->save();

        if ($user->save()) {
            LivewireAlert::title('User Berhasil Dibuat!')
                ->position('top-end')
                ->toast()
                ->success()
                ->show();
            $this->resetInput();
        } else {
            LivewireAlert::title('User Gagal Dibuat!')
                ->position('top-end')
                ->toast()
                ->error()
                ->show();
        }

        $this->resetInput();
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->name = $user->name;
        $this->nip = $user->nip;
        $this->role_id = $user->role_id;
        $this->jabatan = $user->jabatan;
        $this->nomor_wa = $user->nomor_wa;
        $this->mode = 'edit';
        $this->editId = $id;
    }
    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|string|max:20|unique:users,nip,' . $this->editId,
            'role_id' => 'required|integer',
            'jabatan' => 'required|integer|max:100',
            'nomor_wa' => 'required|string|max:15',
        ]);

        $user = User::findOrFail($this->editId);
        $user->name = $this->name;
        $user->nip = $this->nip;
        $user->role_id = $this->role_id;
        $user->jabatan = $this->jabatan;
        $user->nomor_wa = $this->nomor_wa;
        $user->save();

        if ($user->save()) {
            LivewireAlert::title('User Berhasil Dieprbarui!')
                ->position('top-end')
                ->toast()
                ->success()
                ->show();

            $this->resetInput();
        } else {
            LivewireAlert::title('User Gagal Dieprbarui!')
                ->position('top-end')
                ->toast()
                ->error()
                ->show();
        }
    }
}
