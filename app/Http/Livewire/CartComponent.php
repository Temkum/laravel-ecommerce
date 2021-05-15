<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Cart;

class CartComponent extends Component
{
    public function increaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->quantity + 1;
        Cart::update($rowId, $qty);
    }

    public function decreaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->quantity - 1;
        Cart::update($rowId, $qty);
    }

    public function destroy($rowId)
    {

        Cart::remove($rowId);

        session()->flash('success_msg', 'Item successfully removed!');
    }

    public function destroyAll()
    {

        Cart::destroy();

        session()->flash('success_msg', 'All cart items removed successfully!');
    }

    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
