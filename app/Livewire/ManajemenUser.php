<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class ManajemenUser extends Component
{
    public $mode = 'view';
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
        $this->reset(['name', 'nip', 'password', 'role_id', 'jabatan', 'nomor_wa']);
    }
    public function create(){
        $this->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|string|max:20|unique:users,nip',
            'password' => 'required|string|min:8',
            'role_id' => 'required|integer',
            'jabatan' => 'required|string|max:100',
            'nomor_wa' => 'required|string|max:15',
        ]);

        User::create([
            'name' => $this->name,
            'nip' => $this->nip,
            'password' => bcrypt($this->password),
            'role_id' => $this->role_id,
            'jabatan' => $this->jabatan,
            'nomor_wa' => $this->nomor_wa,
        ]);

        session()->flash('message', 'User berhasil ditambahkan.');

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
        // $this->editingUserId = $id;
    }
}
