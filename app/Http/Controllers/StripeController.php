<?php

/** @noinspection ALL */

namespace App\Http\Controllers;

use App\Mail\EmailOrder;
use App\Mail\EmailAdmin;
use App\Models\Bundle;
use App\Models\Consumable;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Stripe;
use Session;
use Illuminate\Support\Facades\DB;

class StripeController extends Controller
{
    public function checkout()
    {
        return view('checkout');
    }

    // public function session()
    // {

    //     $order_id = session()->get('order_id');

    //     $order = Order::find($order_id);
    //     dd($order );
    //     $order->payment_status = 'PENDING';
    //     $order->save();
    //     $lineItems = [];

    //     \Stripe\Stripe::setApiKey(config('services.stripe.secret'));



    //     $items = OrderLine::where('order_id', $order->order_id)
    //         ->where(function ($query) {
    //             $query->where('payment_status', '<>', 'SUCCESS')
    //                 ->orWhereNull('payment_status');
    //         })->get();

    //     $total_amount = 0;
    //     foreach ($items as $item) {
    //         $product_name = '';
    //         if (is_null($item->product_id)) {
    //             $product_name = Bundle::find($item->bundle_id)->name;
    //         } else {
    //             $product_name = Product::find($item->product_id)->name;
    //         }
    //         $lineItems[] = [
    //             'price_data' => [
    //                 'currency' => 'aed',
    //                 'product_data' => [
    //                     'name' => $product_name,
    //                 ],
    //                 'unit_amount' => $item['price'] * 100,
    //             ],
    //             'quantity' => $item['quantity'],
    //         ];
    //         $total_amount = $total_amount + $item['price'];
    //     }

    //     $session = \Stripe\Checkout\Session::create([
    //         'payment_method_types' => ['card'],
    //         'line_items' => $lineItems,
    //         'mode'        => 'payment',
    //         'success_url' => route('success'),
    //         'cancel_url'  => route('home'),
    //         'billing_address_collection' => 'auto', 
    //         'metadata' => [
    //             'order_id' => $order->order_id,
    //         ],

    //     ]);
    //     $order_id = session()->get('order_id');

    //     $trans = Transaction::create([
    //         'transaction_id' => $session->id,
    //         'status' => 'PENDING',
    //         'amount' => $total_amount,
    //         'currency' => 'AED',
    //         'items' => json_encode($items),
    //         'order_id' => $order_id
    //     ]);

    //     $trans_id = $trans->id;

    //     Order::where('id', $order_id)->update([
    //         'trans_id' => $trans_id,
    //         'payment_status' => 'PENDING',
    //     ]);

    //     OrderLine::where('order_id', $order->order_id)
    //         ->where(function ($query) {
    //             $query->where('payment_status', '<>', 'SUCCESS')
    //                 ->orWhereNull('payment_status');
    //         })->update([
    //             'trans_id' => $trans_id,
    //             'payment_status' => 'PENDING',
    //         ]);
    //     session()->put('stripe_session_id', $session->id);
    //     session()->put('trans_id', $trans_id);


    //     return redirect()->away($session->url);
    // }
    public function session()
    {
        $order_id = session()->get('order_id');
        $order = Order::find($order_id);

        if (!$order) {
            return redirect()->route('home')->with('error', 'Order not found.');
        }

        // Update total price before proceeding
        $order->updateTotalPrice();

        // Debugging: Check if total_price is updated
        if ($order->total_price == 0) {
            dd('Total price is zero, check OrderLine records:', $order->toArray());
        }

        $order->payment_status = 'PENDING';
        $order->save();

        $lineItems = [];
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        $items = OrderLine::where('order_id', $order->order_id)
            ->where(function ($query) {
                $query->where('payment_status', '<>', 'SUCCESS')
                    ->orWhereNull('payment_status');
            })->get();

        $total_amount = 0;
        foreach ($items as $item) {
            $product_name = is_null($item->product_id) ? Bundle::find($item->bundle_id)->name : Product::find($item->product_id)->name;

            $lineItems[] = [
                'price_data' => [
                    'currency' => 'aed',
                    'product_data' => ['name' => $product_name],
                    'unit_amount' => $item->price * 100, // Convert to cents
                ],
                'quantity' => $item->quantity,
            ];
            $total_amount += $item->price * $item->quantity;
        }

        // Debugging: Ensure total amount is calculated correctly
        if ($total_amount == 0) {
            dd('Total amount is zero, check OrderLine records:', $items->toArray());
        }

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('home'),
            'billing_address_collection' => 'auto',
            'metadata' => ['order_id' => $order->order_id],
        ]);

        $trans = Transaction::create([
            'transaction_id' => $session->id,
            'status' => 'PENDING',
            'amount' => $total_amount,
            'currency' => 'AED',
            'items' => json_encode($items),
            'order_id' => $order_id
        ]);

        Order::where('id', $order_id)->update([
            'trans_id' => $trans->id,
            'payment_status' => 'PENDING',
        ]);

        OrderLine::where('order_id', $order->order_id)
            ->where(function ($query) {
                $query->where('payment_status', '<>', 'SUCCESS')
                    ->orWhereNull('payment_status');
            })->update([
                'trans_id' => $trans->id,
                'payment_status' => 'PENDING',
            ]);

        session()->put('stripe_session_id', $session->id);
        session()->put('trans_id', $trans->id);

        return redirect()->away($session->url);
    }
  


    public function success()
    {
        $order_id = session()->get('order_id');
        $stripe_session_id = session()->get('stripe_session_id');
        $trans_id = session()->get('trans_id');

        // $details->products =  OrderLine::where('order_id', $order_id)->get();
        // Mail::to('support@proximaenergyme.com')->send(new EmailAdmin($details));
        // Mail::to($details->email)->send(new EmailOrder($details));

        // Create transaction record

        Transaction::where('transaction_id', $stripe_session_id)->update([
            'payment_status' => 'SUCCESS'
        ]);

        Order::where('id', $order_id)->update([
            'payment_status' => 'SUCCESS',
            'status' => 'ORDER CONFIRMED',
            'trans_id' => $trans_id
        ]);
        $order = Order::find($order_id);

        OrderLine::where('order_id', $order->order_id)
            ->where('trans_id', $trans_id)->update([
                'payment_status' => 'SUCCESS',
            ]);

        $lines = OrderLine::where('order_id', $order_id)->get();



        return redirect()->route('order.success', compact('order', 'lines'));
    }
    public function cartCount()
    {
        $cartItems = session()->get('cart');
        $count = 0;
        if ($cartItems != "") {
            $count = count($cartItems);
        } else {
            $count = 0;
        }
        return $count;
    }
}
