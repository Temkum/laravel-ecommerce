<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{
    use WithPagination;
    public $search_term;

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if ($product->image) {
            unlink('assets/images/products' . '/' . $product->image);
        }

        if ($product->images) {
            $images = explode(',', $product->images);

            foreach ($images as $image) {
                if ($image) {
                    unlink('assets/images/products' . '/' . $image);
                }
            }
        }
        $product->delete();

        session()->flash('message', 'Product deleted successfully!');
    }

    public function render()
    {

        // search item
        $search = "%" . $this->search_term . '%';
        //fetch products from db table
        $products = Product::where('name', 'LIKE', $search)
            ->orWhere('stock_status', 'LIKE', $search)
            ->orWhere('regular_price', 'LIKE', $search)
            ->orWhere('sale_price', 'LIKE', $search)
            ->orderBy('created_at', 'DESC')->paginate(12);

        return view('livewire.admin.admin-product-component', ['products' => $products])->layout('layouts.base');
    }
}