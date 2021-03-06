<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Sale;
use Cart;
use Livewire\Component;

class DetailsComponent extends Component
{
    public $slug;
    public $qty;
    public $cart_att = [];

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->qty = 1;
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, $this->qty, $product_price, $this->cart_att)->associate('App\Models\Product');

        session()->flash('success_msg', 'Item added to cart successfully!');

        return redirect()->route('product.cart');
    }

    public function increaseQuantity()
    {
        $this->qty++;
    }

    public function decreaseQuantity()
    {
        if ($this->qty > 1) {
            $this->qty--;
        }
    }

    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();

        $popular_products = Product::inRandomOrder()->limit(4)->get();

        $related_products = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(5)->get();

        // sale timer
        $sale = Sale::find(1);

        $data = ['product' => $product,
            'popular_products' => $popular_products,
            'related_products' => $related_products,
            'sale' => $sale];

        return view('livewire.details-component', $data)->layout('layouts.base');
    }
}
