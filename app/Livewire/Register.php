<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Http\Client\Request;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Register extends Component
{
    use LivewireAlert;
    public $nip;
    public $password;
    public $name;

    public function render()
    {
        return view('livewire.register');
    }

    public function registerStore()
    {

        $this->validate([
            'nip'    => 'required|unique:users',
            'name'     => 'required',
            'password' => 'required|min:5',
        ]);

        $user = User::create([
            'name'     => $this->name,
            'nip'    => $this->nip,
            'status'     => 'active',
            'password' => bcrypt($this->password),
            'role_id'     => null,
            'jabatan'     => null,
            'nomor_wa'     => null,
        ]);


        if ($user->save()) {
            $this->alert('success', 'Register Berhasil', [
                'position' => 'center'
            ]);
            return redirect()->route('login');
        } else {
            $this->alert('error', 'Regiser Gagal', [
                'position' => 'center'
            ]);
        }
    }
}
