<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Carbon\Carbon;
use Livewire\Component;

class AdminDashboardComponent extends Component
{
    public function render()
    {
        $orders = Order::orderBy('created_at', 'DESC')->get()->take(10);
        $total_sales = Order::where('status', 'delivered')->count();
        $total_revenue = Order::where('status', 'delivered')->sum('total');
        $today_sales = Order::where('status', 'delivered')->whereDate('created_at', Carbon::today())->count();
        $today_revenue = Order::where('status', 'delivered')->whereDate('created_at', Carbon::today())->sum('total');

        return view('livewire.admin.admin-dashboard-component', ['orders' => $orders,
            'total_sales' => $total_sales,
            'total_revenue' => $total_revenue,
            'today_sales' => $today_sales,
            'today_revenue' => $today_revenue,
        ])->layout('layouts.base');
    }
}