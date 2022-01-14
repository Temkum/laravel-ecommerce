<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Livewire\Component;

class AdminEditCategoryComponent extends Component
{
    public $category_slug;
    public $category_id;
    public $name;
    public $slug;
    public $subcategory_id;
    public $subcategory_slug;

    public function mount($category_slug, $subcategory_slug = null)
    {
        if ($subcategory_slug) {
            $this->subcategory_slug = $subcategory_slug;
            $subcategory = Subcategory::where('slug', $subcategory_slug)->first();
            $this->category_id = $subcategory->category_id;
            $this->name = $subcategory->name;
            $this->slug = $subcategory->slug;
        } else {
            $this->category_slug = $category_slug;
            $category = Category::where('slug', $category_slug)->first();
            $this->category_id = $category->id;
            $this->name = $category->name;
            $this->slug = $category->slug;
        }
    }

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

    public function updateCategory()
    {
        // form validation
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',
        ]);

        if ($this->subcategory_id) {
            $sub_category = Subcategory::find($this->subcategory_id);
            $sub_category->name = $this->name;
            $sub_category->slug = $this->slug;
            $sub_category->category_id = $this->category_id;
            $sub_category->save();
        } else {
            $category = Category::find($this->category_id);
            $category->name = $this->name;
            $category->slug = $this->slug;
            $category->save();
        }

        session()->flash('message', 'Category updated successfully!');
        redirect()->to('admin/categories');
    }

    public function render()
    {
        $categories = Category::all();

        return view('livewire.admin.admin-edit-category-component', ['categories' => $categories])->layout('layouts.base');
    }
}