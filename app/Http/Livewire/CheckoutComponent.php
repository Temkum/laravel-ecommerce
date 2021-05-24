<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Cart;

class CheckoutComponent extends Component
{
    public $ship_to_different;

    public $firstname;
    public $lastname;
    public $email;
    public $mobile;
    public $line1;
    public $line2;
    public $city;
    public $state;
    public $country;
    public $zipcode;

    // alternative shipping address
    public $alt_firstname;
    public $alt_lastname;
    public $alt_email;
    public $alt_mobile;
    public $alt_line1;
    public $alt_line2;
    public $alt_city;
    public $alt_state;
    public $alt_country;
    public $alt_zipcode;

    public $paymentmode;

    public $thankyou;

    public function updated($fields)
    {
        // billing address
        $this->validateOnly($fields, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'line1' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
            'paymentmode' => 'required',
        ]);

        // shipping address form
        if ($this->ship_to_different) {

            $this->validateOnly($fields, [
                'alt_firstname' => 'required',
                'alt_lastname' => 'required',
                'alt_email' => 'required|email',
                'alt_mobile' => 'required|numeric',
                'alt_line1' => 'required',
                'alt_city' => 'required',
                'alt_state' => 'required',
                'alt_country' => 'required',
                'alt_zipcode' => 'required',
            ]);
        }
    }

    public function placeOrder()
    {
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'line1' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
            'paymentmode' => 'required',
        ]);

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->discount = session()->get('checkout')['discount'];
        $order->tax = session()->get('checkout')['tax'];
        $order->total = session()->get('checkout')['total'];

        $order->first_name = $this->firstname;
        $order->last_name = $this->lastname;
        $order->email = $this->email;
        $order->mobile = $this->mobile;
        $order->line1 = $this->line1;
        $order->line2 = $this->line2;
        $order->city = $this->city;
        $order->state = $this->state;
        $order->country = $this->country;
        $order->zip_code = $this->zipcode;
        $order->status = 'ordered';
        $order->is_shipping_different = $this->ship_to_different ? 1 : 0;
        $order->save();

        foreach (Cart::instance('cart')->content() as $item) {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }

        // alternative shipping address
        if ($this->ship_to_different) {
            $this->validate([
                'alt_firstname' => 'required',
                'alt_lastname' => 'required',
                'alt_email' => 'required|email',
                'alt_mobile' => 'required|numeric',
                'alt_line1' => 'required',
                'alt_city' => 'required',
                'alt_state' => 'required',
                'alt_country' => 'required',
                'alt_zipcode' => 'required',
            ]);

            $shipping = new Shipping();
            $shipping->order_id = $order->id;
            $shipping->first_name = $this->alt_firstname;
            $shipping->last_name = $this->alt_lastname;
            $shipping->email = $this->alt_email;
            $shipping->mobile = $this->alt_mobile;
            $shipping->line1 = $this->alt_line1;
            $shipping->line2 = $this->alt_line2;
            $shipping->city = $this->alt_city;
            $shipping->state = $this->alt_state;
            $shipping->country = $this->alt_country;
            $shipping->zip_code = $this->alt_zipcode;
            $shipping->save();
        }

        // payment mode
        if ($this->paymentmode == 'cod') {
            $transaction = new Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = $order->id;
            $transaction->mode = 'cod';
            $transaction->status = 'pending';
            $transaction->save();
        }

        $this->thankyou = 1;

        Cart::instance('cart')->destroy();
        session()->forget('checkout');
    }

    public function verifyCheckout()
    {
        if (!Auth::check()) {

            return redirect()->route('login');
        } elseif ($this->thankyou) {

            return redirect()->route('thankyou');
        } elseif (!session()->get('checkout')) {

            return redirect()->route('product.cart');
        }
    }

    public function render()
    {
        $this->verifyCheckout();

        return view('livewire.checkout-component')->layout('layouts.base');
    }
}
