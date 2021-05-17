<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\HomeSlider;

class HomeComponent extends Component
{
    public function render()
    {
        $sliders = HomeSlider::where('status', 1)->get();

        // this is for displaying latest products on home page
        $latest_products = Product::orderBy('created_at', 'DESC')->get()->take(6);

        return view('livewire.home-component', ['sliders' => $sliders, 'latest_products' => $latest_products])->layout('layouts.base');
    }
}
