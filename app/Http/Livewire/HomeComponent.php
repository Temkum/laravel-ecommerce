<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\HomeCategory;
use App\Models\HomeSlider;
use App\Models\Product;
use App\Models\Sale;
use Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

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

        // check if user is authenticated
        if (Auth::check()) {
            Cart::instance('cart')->restore(Auth::user()->email);
            Cart::instance('wishlist')->restore(Auth::user()->email);
        }

        $data = ['sliders' => $sliders,
            'latest_products' => $latest_products,
            'categories' => $categories,
            'no_of_products' => $num_of_products,
            'onsale_products' => $onsale_products,
            'sale' => $sale];

        return view('livewire.home-component', $data)->layout('layouts.base');
    }
}