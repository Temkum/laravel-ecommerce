<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Cart;

class CartComponent extends Component
{
    public function increaseQuantity($row_id)
    {
        $product = Cart::get($row_id);
        $qty = $product->quantity + 1;
        Cart::update($row_id, $qty);
    }

    public function decreaseQuantity($row_id)
    {
        $product = Cart::get($row_id);
        $qty = $product->quantity - 1;
        Cart::update($row_id, $qty);
    }

    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
