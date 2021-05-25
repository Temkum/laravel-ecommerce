<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserOrderDetails extends Component
{
    public $order_id;

    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }

    public function cancelOrder()
    {
        $order = Order::find($this->order_id);
        $order->status = 'cancelled';
        $order->date_cancelled = DB::raw('CURRENT_DATE');
        $order->save();

        session()->flash('order_msg', 'Order cancelled successfully!');
    }

    public function render()
    {
        $order = Order::where('user_id', Auth::user()->id)->where('id', $this->order_id)->first();

        return view(
            'livewire.user.user-order-details',
            ['order' => $order]
        )->layout('layouts.base');
    }
}
