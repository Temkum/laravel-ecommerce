<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserChangePassword extends Component
{
    public $current_password;
    public $password;
    public $confirm_password;

    public function updated($fields)
    {
        # code...
        $this->validateOnly($fields, [
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed|different:current_password'
        ]);
    }

    public function changePassword()
    {
        # validate pwd fields
        $this->validate([
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed|different:current_password'
        ]);

        if (Hash::check($this->current_password, Auth::user()->password)) {
            # code...
            $user = User::findOrFail(Auth::user()->id);
            $user->password = Hash::make($this->password);
            $user->save();

            session()->flash('pwd_success', 'Password changed successfully!');
        } else {
            session()->flash('pwd_error', 'Passwords do not match!');
        }
    }

    public function render()
    {
        return view('livewire.user.user-change-password')->layout('layouts.base');
    }
}
