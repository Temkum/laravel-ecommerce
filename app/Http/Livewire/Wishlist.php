<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class Wishlist extends Component
{
    public function removeWishlistItem($product_id)
    {
        foreach (Cart::instance('wishlist')->content() as $wish_item) {
            if ($wish_item->id == $product_id) {
                Cart::instance('wishlist')->remove($wish_item->rowId);

                $this->emitTo('wishlist-count', 'refreshComponent');

                return;
            }
        }
    }

    public function render()
    {
        return view('livewire.wishlist')->layout('layouts.base');
    }
}
