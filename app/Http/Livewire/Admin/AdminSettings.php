<?php

namespace App\Http\Livewire\Admin;

use App\Models\Setting;
use Livewire\Component;

class AdminSettings extends Component
{
    public $email;
    public $phone;
    public $phone2;
    public $address;
    public $map;
    public $pinterest;
    public $instagram;
    public $facebook;
    public $youtube;
    public $twitter;

    public function mount()
    {
        # code...
        $setting = Setting::find(1);
        if ($setting) {
            $this->email = $setting->email;
            $this->phone = $setting->phone;
            $this->phone2 = $setting->phone2;
            $this->address = $setting->address;
            $this->map = $setting->map;
            $this->pinterest = $setting->pinterest;
            $this->instagram = $setting->instagram;
            $this->facebook = $setting->facebook;
            $this->youtube = $setting->youtube;
            $this->twitter = $setting->twitter;
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'email' => 'required|email',
            'phone' => 'required',
            'phone2' => 'required',
            'address' => 'required',
            'map' => 'required',
            'pinterest' => 'required',
            'instagram' => 'required',
            'facebook' => 'required',
            'youtube' => 'required',
            'twitter' => 'required',
        ]);
    }

    public function saveSettings()
    {

        $this->validate([
            'email' => 'required|email',
            'phone' => 'required',
            'phone2' => 'required',
            'address' => 'required',
            'map' => 'required',
            'pinterest' => 'required',
            'instagram' => 'required',
            'facebook' => 'required',
            'youtube' => 'required',
            'twitter' => 'required',
        ]);

        $setting = Setting::find(1);
        if (!$setting) {
            $setting = new Setting();
        }
        $setting->email = $this->email;
        $setting->phone = $this->phone;
        $setting->phone2 = $this->phone2;
        $setting->address = $this->address;
        $setting->map = $this->map;
        $setting->pinterest = $this->pinterest;
        $setting->instagram = $this->instagram;
        $setting->facebook = $this->facebook;
        $setting->youtube = $this->youtube;
        $setting->twitter = $this->twitter;
        $setting->save();
        session()->flash('message', 'Settings saved successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-settings')->layout('layouts.base');
    }
}
