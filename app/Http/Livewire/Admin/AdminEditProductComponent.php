<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditProductComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;
    public $new_image;
    public $product_id;

    public $images;
    public $new_images;

    public function mount($product_slug)
    {
        $product = Product::where('slug', $product_slug)->first();

        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->SKU = $product->SKU;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->quantity = $product->quantity;
        $this->image = $product->image;
        $this->category_id = $product->category_id;
        $this->new_image = $product->new_image;
        $this->product_id = $product->id;
        $this->images = explode(',', $product->images);
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'numeric',
            'SKU' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'category_id' => 'required',
            'product_id' => 'required',
        ]);

        if ($this->new_image) {
            $this->validateOnly($fields, [
                'new_image' => 'required|mimes:png,jpeg,jpg',
            ]);

        }
    }

    public function updateProduct()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'numeric',
            'SKU' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'category_id' => 'required',
            'product_id' => 'required',
        ]);

        if ($this->new_image) {
            $this->validate([
                'new_image' => 'required|mimes:png,jpeg,jpg',
            ]);
        }

        $product = Product::find($this->product_id);
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        $product->category_id = $this->category_id;

        if ($this->new_image) {
            #remove previous image
            unlink('assets/images/products' . '/' . $product->image);

            # set new img
            $imageName = $this->name . '.' . $this->new_image->extension();
            $this->new_image->storeAs('products', $imageName);
            $product->image = $imageName;
        }

        // update gallery imgs
        if ($this->new_images) {
            if ($product->images) {
                $images = explode(',', $product->images);

                foreach ($images as $image) {
                    if ($image) {
                        unlink('assets/images/products' . '/' . $image);
                    }
                }
            }

            $imageName = '';
            foreach ($this->new_images as $key => $image) {

                $imageName = $this->name . $key . '.' . $image->extension();
                $image->storeAs('products', $imageName);
                $imageName = $imageName . ',' . $imageName;
            }
            $product->images = $imageName;
        }
        $product->save();

        session()->flash('message', 'Product update successful!');
        redirect()->to('admin/products');
    }

    public function render()
    {
        $categories = Category::all();
        $images = Product::all();

        $data = [
            'categories' => $categories,
        ];

        return view('livewire.admin.admin-edit-product-component', $data)->layout('layouts.base');
    }
}