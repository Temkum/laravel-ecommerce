<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProductAttribute;
use Livewire\Component;

class AdminAttributeComponent extends Component
{
    public function deleteAttribute($attribute_id)
    {
        $p_attribute = ProductAttribute::find($attribute_id);
        $p_attribute->delete();

        session()->flash('message', 'Deleted successfully!');
    }

    public function render()
    {
        $prod_attributes = ProductAttribute::paginate(12);
        $data = ['prod_attributes' => $prod_attributes];

        return view('livewire.admin.admin-attribute-component', $data)->layout('layouts.base');
    }
}