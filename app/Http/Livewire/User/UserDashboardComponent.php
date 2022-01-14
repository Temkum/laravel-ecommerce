<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserDashboardComponent extends Component
{
    public function render()
    {
        $orders = Order::orderBy('created_at', 'DESC')->where('user_id', Auth::user()->id)->get()->take(10);
        $total_cost = Order::where('status', '!=', 'cancelled')->where('user_id', Auth::user()->id)->sum('total');
        $total_purchase = Order::where('status', '!=', 'cancelled')->where('user_id', Auth::user()->id)->count();
        $total_delivered = Order::where('status', 'delivered')->where('user_id', Auth::user()->id)->count();
        $total_cancelled = Order::where('status', 'cancelled')->where('user_id', Auth::user()->id)->count();

        $data = [
            'orders' => $orders,
            'total_cost' => $total_cost,
            'total_delivered' => $total_delivered,
            'total_cancelled' => $total_cancelled,
            'total_purchase' => $total_purchase,
        ];
        return view('livewire.user.user-dashboard-component', $data)->layout('layouts.base');
    }
}