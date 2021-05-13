<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

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

    public function destroy($row_id)
    {

        Cart::remove($row_id);

        session()->flash('success_msg', 'Item removed successfully!');
    }

    public function destroyAll($row_id)
    {

        Cart::destroy();

        session()->flash('success_msg', 'Item removed successfully!');
    }

    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
