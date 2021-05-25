<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class AdminOrder extends Component
{
    use WithPagination;

    public function updateOrderStatus($order_id, $status)
    {
        $order = Order::find($order_id);
        $order->status = $status;

        if ($status == 'delivered') {
            $order->date_delivered = DB::raw('CURRENT_DATE');
        } elseif ($status == 'cancelled') {
            $order->date_cancelled = DB::raw('CURRENT_DATE');
        }
        $order->save();

        session()->flash('order_msg', 'Order status updated successfully!');
    }

    public function render()
    {
        $orders = Order::orderBy('created_at', 'DESC')->paginate(12);

        return view('livewire.admin.admin-order', ['orders' => $orders])->layout('layouts.base');
    }
}
