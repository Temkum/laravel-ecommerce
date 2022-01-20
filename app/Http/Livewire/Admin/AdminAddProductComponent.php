<?php

namespace App\Http\Livewire\Admin;

use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddProductComponent extends Component
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
    public $subcategory_id;

    public $attr;
    public $inputs = [];
    public $attribute_arr = [];
    public $attribute_values;

    public $images;

    public function mount()
    {
        $this->stock_status = 'in_stock';
        $this->featured = 0;
    }

    public function addValue()
    {
        if (!in_array($this->attr, $this->attribute_arr)) {
            array_push($this->inputs, $this->attr);
            array_push($this->attribute_arr, $this->attr);
        }
    }

    public function removeAttr($attr)
    {
        unset($this->inputs[$attr]);
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required|unique:products',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'numeric',
            'SKU' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'image' => 'required|mimes:png,jpeg,jpg',
            'category_id' => 'required',
        ]);
    }

    public function addProduct()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:products',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'numeric',
            'SKU' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'image' => 'required|mimes:png,jpeg,jpg',
            'category_id' => 'required',
        ]);

        $product = new Product();
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

        $imageName = $this->name . '.' . $this->image->extension();
        $this->image->storeAs('products', $imageName);
        $product->image = $imageName;

        if ($this->images) {
            # code...
            $images_name = '';
            foreach ($this->images as $key => $image) {
                $imgName = $this->name . $key . '.' . $image->extension();
                $image->storeAs('products', $imgName);
                $images_name = $images_name . ',' . $imgName;
            }
            $product->images = $images_name;
        }

        // subcategories
        if ($this->subcategory_id) {
            $product->subcategory_id = $this->subcategory_id;
        }
        $product->save();

        // add attribute
        foreach ($this->attribute_values as $key => $attribute_value) {
            $att_values = explode(',', $attribute_value);

            foreach ($att_values as $att_value) {
                $att_val = new AttributeValue();
                $att_val->prod_attribute_id = $key;
                $att_val->value = $att_value;
                $att_val->product_id = $product->id;
                $att_val->save();
            }
        }

        session()->flash('message', 'Product created successfully!');
        redirect()->to('admin/products');
    }

    public function changeSubcategory()
    {
        $this->subcategory_id = 0;
    }

    public function render()
    {
        $categories = Category::all();
        $subcategories = Subcategory::where('category_id', $this->category_id)->get();

        $prod_attributes = ProductAttribute::all();

        return view('livewire.admin.admin-add-product-component', ['categories' => $categories, 'subcategories' => $subcategories, 'prod_attributes' => $prod_attributes])->layout('layouts.base');
    }
}