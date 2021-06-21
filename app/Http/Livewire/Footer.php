<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Livewire\Component;

class Footer extends Component
{
    public function render()
    {
        $setting = Setting::find(1);

        return view('livewire.footer', ['setting' => $setting]);
    }
}
