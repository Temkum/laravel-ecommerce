<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\HomeCategory;
use App\Models\Product;
use Livewire\Component;
use App\Models\HomeSlider;
use App\Models\Sale;

class HomeComponent extends Component
{
    public function render()
    {
        $sliders = HomeSlider::where('status', 1)->get();

        // this is for displaying latest products on home page
        $latest_products = Product::orderBy('created_at', 'DESC')->get()->take(6);

        // make home categories dynamic
        $category = HomeCategory::find(1);
        $dynamic_cats = explode(',', $category->select_category ?? '');
        $categories = Category::whereIn('id', $dynamic_cats)->get();
        $num_of_products = $category->no_of_products ?? "";

        // On sale carousel
        $onsale_products = Product::where('sale_price', '>', 0)->inRandomOrder()->get()->take(8);

        // sale timer
        $sale = Sale::find(1);

        return view('livewire.home-component', ['sliders' => $sliders, 'latest_products' => $latest_products, 'categories' => $categories, 'no_of_products' => $num_of_products, 'onsale_products' => $onsale_products, 'sale' => $sale])->layout('layouts.base');
    }
}