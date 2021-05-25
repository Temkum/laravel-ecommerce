<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserOrders extends Component
{
    public function render()
    {
        $orders = Order::where('user_id', Auth::user()->id)->paginate(12);

        return view(
            'livewire.user.user-orders',
            ['orders' => $orders]
        )->layout('layouts.base');
    }
}
