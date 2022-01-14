<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    use WithPagination;

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();

        session()->flash('message', 'Delete successful!');
    }

    public function deleteSubcatgory($id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->delete();

        session()->flash('message', 'Subcategory deleted!');
    }

    public function render()
    {
        $categories = Category::paginate(10);

        return view('livewire.admin.admin-category-component', ['categories' => $categories])->layout('layouts.base');
    }
}