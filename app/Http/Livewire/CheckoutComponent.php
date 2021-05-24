<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Cart;
use Exception;
use Stripe;

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

    // stripe setup
    public $card_no;
    public $exp_month;
    public $exp_year;
    public $cvc;

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

        // stripe
        if ($this->paymentmode == 'card') {
            $this->validateOnly($fields, [
                'card_no' => 'required|numeric',
                'exp_month' => 'required|numeric',
                'exp_year' => 'required|numeric',
                'cvc' => 'required|numeric',
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

        // stripe
        if ($this->paymentmode == 'card') {
            $this->validate([
                'card_no' => 'required|numeric',
                'exp_month' => 'required|numeric',
                'exp_year' => 'required|numeric',
                'cvc' => 'required|numeric',
            ]);
        }

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
            $this->makeTransaction($order->id, 'pending');
            $this->resetCart();
        } elseif ($this->paymentmode == 'card') {

            $stripe = Stripe::make(env('STRIPE_API_KEY'));

            try {
                $token = $stripe->tokens()->create([
                    'card' => [
                        'number' => $this->card_no,
                        'exp_month' => $this->exp_month,
                        'exp_year' => $this->exp_year,
                        'cvc' => $this->cvc,
                    ]
                ]);

                if (!isset($token['id'])) {
                    session()->flash('stripe_error', 'The stripe token was not generated correctly!');
                    $this->thankyou = 0;
                } else {
                    $customer = $stripe->customers()->create([
                        'name' => $this->firstname . ' ' . $this->lastname,
                        'email' => $this->email,
                        'phone' => $this->mobile,
                        'address' => [
                            'line1' => $this->line1,
                            'postal_code' => $this->zipcode,
                            'city' => $this->city,
                            'state' => $this->state,
                            'country' => $this->country
                        ],
                        'shipping' => [
                            'name' => $this->firstname . ' ' . $this->lastname,
                            'address' => [
                                'line1' => $this->line1,
                                'postal_code' => $this->zipcode,
                                'city' => $this->city,
                                'state' => $this->state,
                                'country' => $this->country
                            ],
                        ],
                        'source' => $token['id']
                    ]);

                    $charge = $stripe->charge()->create([
                        'customer' => $customer['id'],
                        'currency' => 'USD',
                        'amount' => session()->get('checkout')['total'],
                        'description' => 'Payment for order No ' . $order->id
                    ]);

                    if ($charge['status'] == 'succeeded') {
                        $this->makeTransaction($order->id, 'approved');
                        $this->resetCart();
                    } else {
                        session()->flash('stripe_error', 'Transaction Error!');
                        $this->thankyou = 0;
                    }
                }
            } catch (Exception $e) {
                session()->flash('stripe_error', $e->getMessage());
                $this->thankyou = 0;
            }
        }
    }

    public function resetCart()
    {
        $this->thankyou = 1;

        Cart::instance('cart')->destroy();
        session()->forget('checkout');
    }

    public function makeTransaction($order_id, $status)
    {
        $transaction = new Transaction();
        $transaction->user_id = Auth::user()->id;
        $transaction->order_id = $order_id;
        $transaction->mode = $this->paymentmode;
        $transaction->status = $status;
        $transaction->save();
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
