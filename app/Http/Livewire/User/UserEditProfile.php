<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserEditProfile extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $image;
    public $new_img;
    public $mobile;
    public $line1;
    public $line2;
    public $city;
    public $region;
    public $zip;
    public $country;

    public function mount()
    {
        $user = User::find(Auth::user()->id);

        $this->name = $user->name;
        $this->email = $user->email;
        $this->image = $user->profile->image;
        $this->mobile = $user->profile->mobile;
        $this->line1 = $user->profile->line1;
        $this->line2 = $user->profile->line2;
        $this->city = $user->profile->city;
        $this->region = $user->profile->region;
        $this->zip = $user->profile->zip;
        $this->country = $user->profile->country;
    }

    public function updateProfile()
    {
        $user = User::find(Auth::user()->id);
        $user->name = $this->name;
        $user->save();

        if ($this->new_img) {
            if ($this->image) {
                unlink('assets/images/profile/' . $this->image);
            }
            $image_name = $user->name . '.' . $this->new_img->extension();
            $this->new_img->storeAs('profile', $image_name);
            $user->profile->image = $image_name;
        }
        $user->profile->mobile = $this->mobile;
        $user->profile->line1 = $this->line1;
        $user->profile->line2 = $this->line2;
        $user->profile->city = $this->city;
        $user->profile->region = $this->region;
        $user->profile->zip = $this->zip;
        $user->profile->country = $this->country;

        $user->profile->save();

        session()->flash('message', 'Profile update successful!');

        redirect()->to('/user/profile');
    }

    public function render()
    {
        return view('livewire.user.user-edit-profile')->layout('layouts.base');
    }
}