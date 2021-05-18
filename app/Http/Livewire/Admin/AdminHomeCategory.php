<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\HomeCategory;
use Livewire\Component;

class AdminHomeCategory extends Component
{
    public $selected_categories = [];
    public $number_of_products;

    public function mount()
    {
        $category = HomeCategory::find(1);
        $this->selected_categories = explode(',', $category->select_category);
        $this->number_of_products = $category->no_of_products;
    }

    public function updateHomeCategory()
    {
        $category = HomeCategory::find(1);
        $category->select_category = implode(',', $this->selected_categories);
        $category->no_of_products = $this->number_of_products;
        $category->save();

        session()->flash('message', 'Home category updated successfully!');
    }

    public function render()
    {
        $categories = Category::all();

        return view('livewire.admin.admin-home-category', ['categories' => $categories])->layout('layouts.base');
    }
}
