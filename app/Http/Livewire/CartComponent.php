<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    public function increaseQty($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $quantity = $product->quantity + 1;
        Cart::instance('cart')->update($rowId, $quantity);

        $this->emitTo('cart-count', 'refreshComponent');
    }

    public function decreaseQty($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $quantity = $product->quantity - 1;
        Cart::instance('cart')->update($rowId, $quantity);

        $this->emitTo('cart-count', 'refreshComponent');
    }

    public function destroy($rowId)
    {

        Cart::instance('cart')->remove($rowId);

        $this->emitTo('cart-count', 'refreshComponent');

        session()->flash('success_msg', 'Item successfully removed!');
    }

    public function destroyAll()
    {

        Cart::instance('cart')->destroy();

        $this->emitTo('cart-count', 'refreshComponent');

        session()->flash('success_msg', 'All cart items removed successfully!');
    }

    public function saveForLater($rowId)
    {
        $item = Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->remove($rowId);
        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)->associate('App\Models\Product');
        $this->emitTo('cart-count', 'refreshComponent');

        session()->flash('success_msg', 'Item has been saved for later!');
    }

    public function moveToCart($rowId)
    {
        $item = Cart::instance('saveForLater')->get($rowId);
        Cart::instance('saveForLater')->remove($rowId);
        Cart::instance('cart')->add($item->id, $item->name, 1, $item->price)->associate('App\Models\Product');
        $this->emitTo('cart-count', 'refreshComponent');

        session()->flash('success', 'Item has been moved to cart!');
    }

    public function deleteSaveForLater($rowId)
    {
        Cart::instance('saveForLater')->remove($rowId);

        session()->flash('success', 'Item removed successfully!');
    }

    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
