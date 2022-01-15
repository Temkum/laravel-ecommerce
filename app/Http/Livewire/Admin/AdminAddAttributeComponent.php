<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProductAttribute;
use Livewire\Component;

class AdminAddAttributeComponent extends Component
{
    public $name;

    public function updated($fields)
    {
        $this->validateOnly($fields, ['name' => 'required']);
    }

    public function storeAttribute()
    {
        $this->validate(['name' => 'required']);

        $p_attributes = new ProductAttribute();
        $p_attributes->name = $this->name;
        $p_attributes->save();

        session()->flash('message', 'Attribute added successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-attribute-component')->layout('layouts.base');
    }
}