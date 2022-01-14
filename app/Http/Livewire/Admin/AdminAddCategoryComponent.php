<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Livewire\Component;

class AdminAddCategoryComponent extends Component
{
    public $name;
    public $slug;
    public $category_id;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required|unique:categories',
        ]);
    }

    public function storeCategory()
    {
        // form validation
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',
        ]);

        if ($this->category_id) {
            # code...
            $sub_category = new Subcategory();
            $sub_category->name = $this->name;
            $sub_category->slug = $this->slug;
            $sub_category->category_id = $this->category_id;
            $sub_category->save();
        } else {
            $category = new Category();
            $category->name = $this->name;
            $category->slug = $this->slug;
            $category->save();
        }

        session()->flash('message', 'Category created successfully!');

        return redirect()->to('/admin/categories');
    }

    public function render()
    {
        $categories = Category::all();
        $data = ['categories' => $categories];

        return view('livewire.admin.admin-add-category-component', $data)->layout('layouts.base');
    }
}