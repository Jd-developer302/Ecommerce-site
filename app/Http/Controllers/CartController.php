<?php

namespace App\Http\Controllers;

use App\Models\Bundle;
use App\Models\Consumable;
use App\Models\Missing;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;
use App\Models\Setting;
use App\Services\FacebookEventService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function cartList()
    {
        $count = $this->cartCount();
        // dd($count);
        $setting = Setting::first();
        // $cartItems = session()->get('cart');
        $cartItems = session()->get('tempcart', []);
        // dd($cartItems);
        $total_price = 0;
        $courier = 0;
        $delCharge = null;
        if ($cartItems != null) {
            foreach ($cartItems as $item) {
                $total_price = $total_price + ($item['price'] * $item['quantity']);
                if ($delCharge == null || $item['delivery_charge'] < $delCharge) {
                    $delCharge = $item['delivery_charge'];
                }
            }
            $courier = $delCharge;
        }
        return view('frontend.cart', compact('cartItems', 'total_price', 'count', 'courier', 'setting'));
    }

    public function buyNow(Request $request)
    {
        $cart = session()->get('order_id');
        $quantity = isset($request->qty) ? $request->qty : 1;
        // if cart is empty then this the first product
        $product = Product::find($request->id);

        $latestOrder = Order::latest()->first();
        $orderId = $latestOrder->id + 1;

        $input = $request->all();
        $payment_gateway = @$input['payment_method'];

        $order_id = session()->get('order_id');
        if ($order_id == null) {

            $input['order_id'] = "UAE1000" . $orderId;
            $input['total_qty'] = $quantity;
            if (!isset($input['email'])) {
                $input['email'] = $request->phone . '@gmail.com';
            }
            $input['delivery_charge'] = $product->delivery_charge;
            $input['total_vat'] = $product->price * $quantity * 0.05;
            $input['total_price'] = $product->price * $quantity + $input['total_vat'] + $input['delivery_charge'];
            $input['status'] = 'ORDER PLACED';
            $input['source'] = 'Online Order';
            $input['created_by'] = 'Online Order';
            // $input['delivery_charge'] = 14;
            $order = Order::create($input);
            OrderLine::insert([
                'order_id' => $order->order_id,
                "product_id" => $product->id,
                "name" => $product->name,
                "quantity" => $quantity,
                "price" => $product->price,
                "vat" => ($product->is_vat) ? ($product->price * $quantity * .05) : 0,
                "sub_price" => ($product->is_vat) ? (($product->price * .05 * $quantity) + ($product->price * $quantity)) : ($product->price * $quantity),
                "delivery_charge" => ($quantity > 1) ? 0 : $product->delivery_charge,
                "created_at" => now(),   // ✅
                "updated_at" => now(),
                // "image" => $product->image,
                // "variant" => ''
            ]);
            session()->put('order_id', $order->id);
        } else {
            $order = Order::find($order_id);
            $input['total_qty'] = $order->total_qty + $quantity;
            $input['email'] = $request->phone . '@gmail.com';
            $input['total_price'] = $order->total_price + $product->price * $quantity;
            $order->update($input);
            $line = OrderLine::where('order_id', $order->order_id)->where('product_id', $product->id)->first();
            if (is_null($line)) {
                OrderLine::insert([
                    'order_id' => $order->order_id,
                    "product_id" => $product->id,
                    "name" => $product->name,
                    "quantity" => $quantity,
                    "price" => $product->price,
                    "vat" => ($product->is_vat) ? ($product->price * .05 * $quantity) : 0,
                    "sub_price" => ($product->is_vat) ? (($product->price * .05 * $quantity) + ($product->price  * $quantity)) : ($product->price * $quantity),
                    "delivery_charge" => $product->delivery_charge,
                ]);
            } else {
                $lineupdate['quantity'] = $quantity + $line->quantity;
                $Qtyprice = $product->price * $lineupdate['quantity'];
                $lineupdate['price'] = $product->price;
                $lineupdate['vat'] =  ($product->is_vat) ? ($Qtyprice * .05) : 0;
                $lineupdate['sub_price'] = ($product->is_vat) ? ($lineupdate['vat'] + $Qtyprice) : $Qtyprice;
                $line->update($lineupdate);
            }
        }
        $lines = OrderLine::where('order_id', $order->order_id)->get();
        $delivery_charge = $lines->first()->delivery_charge;
        $total_qty = 0;
        $vat = 0;
        $total_price = 0;
        foreach ($lines as $line) {
            $delivery_charge = ($line->delivery_charge > $delivery_charge) ? $line->delivery_charge : $delivery_charge;
            $total_qty += $line->quantity;
            $vat += $line->vat;
            $total_price += $line->sub_price;
        }
        if ($total_price >= 200) {
            $total_price = $total_price;
            $delivery_charge = 0;
        } else if ($total_qty > 1) {
            $total_price = $total_price;
            $delivery_charge = 0;
        } else {
            $total_price = $delivery_charge + $total_price;
        }
        if ($payment_gateway == 'gateway') {
            return view('checkout');
        }
        Order::where('id', $order_id)->update(['status' => 'ORDER CONFIRMED', 'total_price' => $total_price, 'total_qty' => $total_qty, 'total_vat' => $vat, 'delivery_charge' => $delivery_charge]);

        // Facebook Purchase Event (works without login)
        $eventId = $request->event_id ?? null;
        $fbService = new FacebookEventService();
        $fbService->sendEvent('Purchase', [
            'email' => $input['email'] ?? '',
            'phone' => $input['phone'] ?? '',
        ], [
            'currency' => 'AED',
            'value' => $total_price,
            'content_ids' => $lines->pluck('product_id')->toArray(),
            'content_type' => 'product'
        ], url()->current(), $eventId);

        $miss_id = session()->get('missing_id');
        if (!is_null($miss_id)) {
            $miss = Missing::find($miss_id);
            $miss->order_id = session()->get('order_id');
            $miss->save();
            session()->forget('missing_id');
            $miss->delete();
        }


        return redirect()->route('order.success', compact('order', 'lines'));
    }


    public function orderNow(Request $request)
    {
        $cart = session()->get('tempcart');
        // dd($cart);
        if (!$cart || count($cart) == 0) {
            dd("Cart is empty", session()->all());
            return back();
        }

        $quantity = isset($request->qty) ? $request->qty : 1;
        // if cart is empty then this the first product
        $product = Product::find($request->id);

        $latestOrder = Order::latest()->first();
        $orderId = $latestOrder->id + 1;

        $input = $request->all();
        // dd($input);
        $payment_gateway = @$input['payment_method'];

        $order_id = session()->get('order_id');
        // dd($order_id );
        if ($order_id == null) {

            $input['order_id'] = "UAE1000" . $orderId;
            $input['total_qty'] = $quantity;
            if (!isset($input['email'])) {
                $input['email'] = $request->phone . '@gmail.com';
            }
            $input['delivery_charge'] = $product['delivery_charge'] ?? 0;
            $price = $product['price'] ?? 0;
            $input['total_vat'] = $price * $quantity * 0.05;
            $input['total_price'] = $price * $quantity + $input['total_vat'] + $input['delivery_charge'];
            $input['status'] = 'ORDER PLACED';
            $input['source'] = 'Online Order';
            $input['created_by'] = 'Online Order';
            // $input['delivery_charge'] = 14;
            $order = Order::create($input);
            // dd($order);
            foreach ($cart as $key => $product) {
                OrderLine::insert([
                    'order_id' => $order->order_id,
                    "product_id" => $product['product_id'],
                    "name" => $product['name'],
                    "quantity" => $product['quantity'],
                    "price" => $product['price'],
                    "vat" => ($product['is_vat']) ? ($product['price'] * $quantity * .05) : 0,
                    "sub_price" => ($product['is_vat']) ? (($product['price'] * .05 * $quantity) + ($product['price'] * $quantity)) : ($product['price'] * $quantity),
                    "delivery_charge" => ($quantity > 1) ? 0 : $product['delivery_charge'],
                    // "image" => $product->image,
                    // "variant" => ''
                ]);
            }

            session()->put('order_id', $order->id);
        } else {
            $order = Order::find($order_id);
            // dd( $order);
            $input['total_qty'] = $order->total_qty + $quantity;
            $input['email'] = $request->phone . '@gmail.com';
            // $input['total_price'] = $order->total_price + $product['price'] * $quantity;
            $order->update($input);

            foreach ($cart as $key => $product) {
                $line = OrderLine::where('order_id', $order->order_id)->where('product_id', $product['product_id'])->first();
                if (is_null($line)) {
                    OrderLine::insert([
                        'order_id' => $order->order_id,
                        "product_id" => $product['product_id'],
                        "name" => $product['name'],
                        "quantity" => $quantity,
                        "price" => $product['price'],
                        "vat" => ($product['is_vat']) ? ($product['price'] * .05 * $quantity) : 0,
                        "sub_price" => ($product['is_vat']) ? (($product['price'] * .05 * $quantity) + ($product['price']  * $quantity)) : ($product['price'] * $quantity),
                        "delivery_charge" => $product['delivery_charge'],
                    ]);
                } else {
                    $lineupdate['quantity'] = $quantity + $line->quantity;
                    $Qtyprice = $product['price'] * $lineupdate['quantity'];
                    $lineupdate['price'] = $product['price'];
                    $lineupdate['vat'] =  ($product['is_vat']) ? ($Qtyprice * .05) : 0;
                    $lineupdate['sub_price'] = ($product['is_vat']) ? ($lineupdate['vat'] + $Qtyprice) : $Qtyprice;
                    $line->update($lineupdate);
                }
            }
        }
        $lines = OrderLine::where('order_id', $order->order_id)->get();
        $delivery_charge = $lines->first()->delivery_charge;
        $total_qty = 0;
        $vat = 0;
        $total_price = 0;
        foreach ($lines as $line) {
            $delivery_charge = ($line->delivery_charge > $delivery_charge) ? $line->delivery_charge : $delivery_charge;
            $total_qty += $line->quantity;
            $vat += $line->vat;
            $total_price += $line->sub_price;
        }
        if ($total_price >= 200) {
            $total_price = $total_price;
            $delivery_charge = 0;
        } else if ($total_qty > 1) {
            $total_price = $total_price;
            $delivery_charge = 0;
        } else {
            $total_price = $delivery_charge + $total_price;
        }
        if ($payment_gateway == 'gateway') {
            return redirect()->route('multi.session');
        }
        Order::where('id', $order_id)->update(['status' => 'ORDER CONFIRMED', 'total_price' => $total_price, 'total_qty' => $total_qty, 'total_vat' => $vat, 'delivery_charge' => $delivery_charge]);

        // Facebook Purchase Event (works without login)
        $eventId = $request->event_id ?? null;
        $fbService = new FacebookEventService();
        $fbService->sendEvent('Purchase', [
            'email' => $input['email'] ?? '',
            'phone' => $input['phone'] ?? '',
        ], [
            'currency' => 'AED',
            'value' => $total_price,
            'content_ids' => $lines->pluck('product_id')->toArray(),
            'content_type' => 'product'
        ], url()->current(), $eventId);

        $miss_id = session()->get('missing_id');
        if (!is_null($miss_id)) {
            $miss = Missing::find($miss_id);
            $miss->order_id = session()->get('order_id');
            $miss->save();
            session()->forget('missing_id');
            $miss->delete();
        }
        return redirect()->route('order.success', compact('order', 'lines'));
    }


    // public function orderNow(Request $request)
    // {
    //     // Get cart from session
    //     $cart = session()->get('tempcart', []);
    //     // dd($cart);
    //     // Check if the cart is empty
    //     if (empty($cart)) {
    //         return back()->with('error', 'Your cart is empty.');
    //     }

    //     // Get the requested quantity (default to 1 if not provided)
    //     $quantity = $request->qty ?? 1;

    //     // // Find the product
    //     // $product = Product::find($request->id);
    //     // if (!$product) {
    //     //     return back()->with('error', 'Product not found.');
    //     // }

    //     // Get the latest order to generate a new order ID
    //     $latestOrder = Order::latest()->first();
    //     $orderId = $latestOrder ? $latestOrder->id + 1 : 1;

    //     // Get input values
    //     $input = $request->all();
    //     $payment_gateway = $input['payment_method'] ?? null;

    //     // Retrieve existing order ID from session
    //     $order_id = session()->get('order_id');

    //     // If there's no existing order, create a new order
    //     if (is_null($order_id)) {
    //         $input['order_id'] = "UAE1000" . $orderId;
    //         $input['total_qty'] = $quantity;
    //         $input['email'] = $input['email'] ?? ($request->phone . '@gmail.com');
    //         $input['delivery_charge'] = $product->delivery_charge ?? 0;
    //         $input['total_vat'] = $product->price * $quantity * 0.05;
    //         $input['total_price'] = $product->price * $quantity + $input['total_vat'] + $input['delivery_charge'];
    //         $input['status'] = 'ORDER PLACED';
    //         $input['source'] = 'Online Order';
    //         $input['created_by'] = 'Online Order';

    //         // Create the order
    //         $order = Order::create($input);
    //         dd($order);
    //         session()->put('order_id', $order->id);
    //     } else {
    //         // Find the existing order
    //         $order = Order::find($order_id);
    //         if (!$order) {
    //             return back()->with('error', 'Order not found.');
    //         }

    //         // Update order totals
    //         $order->update([
    //             'total_qty' => $order->total_qty + $quantity,
    //             'email' => $request->phone . '@gmail.com',
    //             'total_price' => $order->total_price + ($product->price * $quantity),
    //         ]);
    //     }

    //     // Process cart items and update order lines
    //     foreach ($cart as $cartItem) {
    //         $line = OrderLine::where('order_id', $order->order_id)
    //             ->where('product_id', $cartItem['id'])
    //             ->first();

    //         if (!$line) {
    //             // Insert new order line
    //             OrderLine::insert([
    //                 'order_id' => $order->order_id,
    //                 "product_id" => $cartItem['id'],
    //                 "name" => $cartItem['name'],
    //                 "quantity" => $cartItem['quantity'],
    //                 "price" => $cartItem['price'],
    //                 "vat" => ($cartItem['is_vat']) ? ($cartItem['price'] * 0.05 * $quantity) : 0,
    //                 "sub_price" => ($cartItem['is_vat']) ? (($cartItem['price'] * 0.05 * $quantity) + ($cartItem['price'] * $quantity)) : ($cartItem['price'] * $quantity),
    //                 "delivery_charge" => ($quantity > 1) ? 0 : $cartItem['delivery_charge'],
    //             ]);
    //         } else {
    //             // Update existing order line
    //             $newQuantity = $quantity + $line->quantity;
    //             $Qtyprice = $cartItem['price'] * $newQuantity;

    //             $line->update([
    //                 'quantity' => $newQuantity,
    //                 'price' => $cartItem['price'],
    //                 'vat' => ($cartItem['is_vat']) ? ($Qtyprice * 0.05) : 0,
    //                 'sub_price' => ($cartItem['is_vat']) ? ($Qtyprice * 1.05) : $Qtyprice,
    //             ]);
    //         }
    //     }

    //     // Recalculate order totals
    //     $lines = OrderLine::where('order_id', $order->order_id)->get();
    //     $delivery_charge = $lines->max('delivery_charge');
    //     $total_qty = $lines->sum('quantity');
    //     $vat = $lines->sum('vat');
    //     $total_price = $lines->sum('sub_price');

    //     // Apply free delivery conditions
    //     if ($total_price >= 200 || $total_qty > 1) {
    //         $delivery_charge = 0;
    //     } else {
    //         $total_price += $delivery_charge;
    //     }

    //     // Update order totals
    //     Order::where('id', $order->id)->update([
    //         'status' => 'ORDER CONFIRMED',
    //         'total_price' => $total_price,
    //         'total_qty' => $total_qty,
    //         'total_vat' => $vat,
    //         'delivery_charge' => $delivery_charge,
    //     ]);

    //     // Handle missing items
    //     if ($miss_id = session()->get('missing_id')) {
    //         $miss = Missing::find($miss_id);
    //         if ($miss) {
    //             $miss->update(['order_id' => $order->id]);
    //             session()->forget('missing_id');
    //             $miss->delete();
    //         }
    //     }

    //     // Redirect to success page
    //     return redirect()->route('multi.session');
    // }


    public function orderSuccess()
    {
        $setting = Setting::first();
        $order_id = session()->get('order_id');
        if (is_null($order_id)) {
            return redirect()->route('home');
        }
        $order = Order::find($order_id);
        $lines = OrderLine::where('order_id', $order->order_id)->get();
        return view('frontend.order_success', compact('order', 'lines', 'setting'));
    }

    public function addToCart(Request $request)
    {
        $cart = session()->get('tempcart');

        $quantity = isset($request->qty) ? $request->qty : 1;
        $id = $request->product_id;
        $product = Product::find($id);

        // if cart is empty then this the first product
        if (!$cart) {
            $cart = [
                $id => [
                    "product_id" => $id,
                    "name" => $product->name,
                    "quantity" => $quantity,
                    "price" => $product->price,
                    "is_vat" => $product->is_vat,
                    "image" => $product->image,
                    "delivery_charge" => $product->delivery_charge,
                ]
            ];
            session()->put('tempcart', $cart);

            // Facebook event fire on first add
            $fbService = new FacebookEventService();
            $eventId = $request->event_id ?? null;
            $fbService->sendEvent('AddToCart', [
                'email' => optional($request->user())->email,
                'phone' => optional($request->user())->phone,
            ], [
                'currency' => 'AED',
                'value' => $product->price,
                'content_ids' => [$id],
                'content_type' => 'product'
            ], url()->current(), $eventId);
            // dd($result);

            return redirect()->back();
        }

        // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
            $cart[$id]['name'] = $product->name;
            $cart[$id]['price'] = $product->price;
            $cart[$id]['is_vat'] = $product->is_vat;
            $cart[$id]['image'] = $product->image;
            $cart[$id]['delivery_charge'] = $product->delivery_charge;

            // Facebook event always fires, even if user is not logged in
            $fbService = new FacebookEventService();
            $eventId = $request->event_id ?? null;
            $fbService->sendEvent('AddToCart', [
                'email' => optional($request->user())->email,
                'phone' => optional($request->user())->phone,
            ], [
                'currency' => 'AED',
                'value' => 499,
                'content_ids' => ['12345'],
                'content_type' => 'product'
            ], url()->current(), $eventId);

            // dd($result);
            session()->put('tempcart', $cart);
            return redirect()->back();
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "product_id" => $id,
            "name" => $product->name,
            "quantity" => $quantity,
            "price" => $product->price,
            "is_vat" => $product->is_vat,
            "image" => $product->image,
            "delivery_charge" => $product->delivery_charge,
        ];
        session()->put('tempcart', $cart);
        return redirect()->back();
    }


    public function addToCart1(Request $request)
    {

        $cart = session()->get('tempcart');
        // if cart is empty then this the first product
        if (!$cart) {

            $id = $request->id;
            $product = Product::find($id);
            $cart = [
                $id => [
                    "product_id" => $id,
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image" => $product->image,
                    "delivery_charge" => $product->delivery_charge,
                ]
            ];
            session()->put('cart', $cart);
            session()->flash('success', 'Product is Added to Cart Successfully !');

            //return redirect()->route('cart.list');
        }
        // if cart not empty then check if this product exist then increment quantity
        $id = $request->id;
        $product = Product::find($id);
        if (isset($cart[$id])) {
            $cart[$id] = [
                "product_id" => $id,
                "name" => $product->name,
                "quantity" => $request->quantity,
                "price" => $product->price,
                "image" => $product->image,
                "delivery_charge" => $product->delivery_charge,
            ];
            session()->put('cart', $cart);
            session()->flash('success', 'Product is Added to Cart Successfully !');

            //return redirect()->route('cart.list');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "product_id" => $id,
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "image" => $product->image,
            "delivery_charge" => $product->delivery_charge,
        ];
        session()->put('cart', $cart);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        //return redirect()->route('cart.list');
    }


    public function updateCart(Request $request)
    {
        $id = $request->id;
        if (str_contains($id, 'i')) {
            $Nid = str_replace('i', '', $id);
            $product = Consumable::find($Nid);
        } else {
            $product = Product::find($id);
        }

        $cartItems = session()->get('tempcart');
        $quantity = $cartItems[$id]['quantity'] + 1;
        if ($product['quantity'] >= $cartItems[$id]['quantity'] + 1) {
            $cartItems[$id] = [
                "product_id" => $id,
                "name" => $cartItems[$id]['name'],
                "quantity" => $quantity,
                "price" => $cartItems[$id]['price'],
                "image" => $cartItems[$id]['image'],
                "variant" => $cartItems[$id]['variant']
            ];
            session()->put('cart', $cartItems);
            session()->flash('success', 'Item Cart is Updated Successfully !');
        } else {
            $cartItems[$id] = [
                "product_id" => $id,
                "name" => $cartItems[$id]['name'],
                "quantity" => $product['quantity'],
                "price" => $cartItems[$id]['price'],
                "image" => $cartItems[$id]['image'],
                "variant" => $cartItems[$id]['variant']
            ];
            session()->put('cart', $cartItems);
            session()->flash('error' . $id . '', 'Only ' . $product['quantity'] . ' quantities available ');
        }


        return redirect()->route('cart.list');
    }
    // public function updateCartAjax(Request $request)
    // {
    //     $id = $request->product_id;
    //     if (str_contains($id, 'i')) {
    //         $Nid = str_replace('i', '', $id);
    //         $product = Bundle::find($Nid);
    //     } else {
    //         $product = Product::find($id);
    //     }
    //     $quantity = $request->quantity;
    //     $cartItems = session()->get('tempcart');
    //     if ($product['stock'] >= $quantity) {
    //         $cartItems[$id] = [
    //             "product_id" => $id,
    //             "name" => $cartItems[$id]['name'],
    //             "quantity" => $quantity,
    //             "price" => $cartItems[$id]['price'],
    //             "image" => $cartItems[$id]['image'],
    //             "delivery_charge" => $cartItems[$id]['delivery_charge']
    //         ];
    //         session()->put('tempcart', $cartItems);
    //         session()->flash('success', 'Item Cart is Updated Successfully !');
    //     } else {
    //         $cartItems[$id] = [
    //             "product_id" => $id,
    //             "name" => $cartItems[$id]['name'],
    //             "quantity" => $product['stock'],
    //             "price" => $cartItems[$id]['price'],
    //             "image" => $cartItems[$id]['image'],
    //             "delivery_charge" => $cartItems[$id]['delivery_charge']
    //         ];
    //         session()->put('tempcart', $cartItems);
    //         session()->flash('error' . $id . '', 'Only ' . $product['quantity'] . ' quantities available ');
    //     }

    //     return redirect()->route('cart.list');
    // }
    public function updateCartAjax(Request $request)
    {
        $id = $request->product_id;

        if (str_contains($id, 'i')) {
            $Nid = str_replace('i', '', $id);
            $product = Bundle::find($Nid);
        } else {
            $product = Product::find($id);
        }

        $quantity = $request->quantity;
        $cartItems = session()->get('tempcart');

        if ($product['stock'] >= $quantity) {
            $cartItems[$id] = [
                "product_id" => $id,
                "name" => $cartItems[$id]['name'],
                "quantity" => $quantity,
                "price" => $cartItems[$id]['price'],
                "is_vat" => $cartItems[$id]['is_vat'] ?? 0,
                "image" => $cartItems[$id]['image'],
                "delivery_charge" => $cartItems[$id]['delivery_charge']
            ];

            // dd($cartItems);


            session()->put('tempcart', $cartItems);

            return response()->json([
                'status' => 'success',
                'message' => 'Item Cart is Updated Successfully!',
                'cart' => $cartItems
            ]);
        } else {
            $cartItems[$id] = [
                "product_id" => $id,
                "name" => $cartItems[$id]['name'],
                "quantity" => $product['stock'],
                "price" => $cartItems[$id]['price'],
                "is_vat" => $cartItems[$id]['is_vat'] ?? 0,
                "image" => $cartItems[$id]['image'],
                "delivery_charge" => $cartItems[$id]['delivery_charge']
            ];

            session()->put('tempcart', $cartItems);

            return response()->json([
                'status' => 'error',
                'message' => 'Only ' . $product['stock'] . ' quantities available for ' . $id,
                'cart' => $cartItems
            ]);
        }
    }

    public function updateSubCart(Request $request)
    {
        $id = $request->id;
        if (str_contains($id, 'i')) {
            $Nid = str_replace('i', '', $id);
            $product = Consumable::find($Nid);
        } else {
            $product = Product::find($id);
        }
        $cart = session()->get('tempcart');
        $quantity = $cart[$id]['quantity'] - 1;
        if ($product['quantity'] >= $cart[$id]['quantity'] - 1) {
            if ($quantity > 0) {
                $cart[$id] = [
                    "product_id" => $id,
                    "name" => $cart[$id]['name'],
                    "quantity" => $quantity,
                    "price" => $cart[$id]['price'],
                    "image" => $cart[$id]['image'],
                    "variant" => $cart[$id]['variant']
                ];
            } else {
                $cart = session()->get('cart');
                unset($cart[$id]);
            }

            session()->put('cart', $cart);
            session()->flash('success', 'Item Cart is Updated Successfully !');
        }

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        $id = $request->id;
        $cart = session()->get('tempcart');
        unset($cart[$id]);
        session()->put('tempcart', $cart);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        $cart = session()->get('tempcart');
        unset($cart);

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }

    public function cartCount()
    {
        $cartItems = session()->get('tempcart');
        $count = 0;
        if ($cartItems != "") {
            $count = count($cartItems);
        } else {
            $count = 0;
        }
        return $count;
    }
}
