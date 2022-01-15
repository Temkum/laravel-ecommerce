<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProductAttribute;
use Livewire\Component;

class AdminEditAttributeComponent extends Component
{
    public $name;
    public $attribute_id;

    public function mount($attribute_id)
    {
        $p_attribute = ProductAttribute::find($attribute_id);
        $this->attribute_id = $p_attribute->id;
        $this->name = $p_attribute->name;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, ['name' => 'required']);
    }

    public function updateAttribute()
    {
        $this->validate(['name' => 'required']);
        $p_attribute = ProductAttribute::find($this->attribute_id);
        $p_attribute->name = $this->name;
        $p_attribute->save();

        session()->flash('message', 'Attribute updated successfully!');

        redirect()->to('admin/attributes');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-attribute-component')->layout('layouts.base');
    }
}