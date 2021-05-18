<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\HomeCategory;
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

        // make home categories dynamic
        $category = HomeCategory::find(1);
        $dynamic_cats = explode(',', $category->select_category);
        $categories = Category::whereIn('id', $dynamic_cats)->get();
        $num_of_products = $category->no_of_products;

        return view('livewire.home-component', ['sliders' => $sliders, 'latest_products' => $latest_products, 'categories' => $categories, 'no_of_products' => $num_of_products])->layout('layouts.base');
    }
}
