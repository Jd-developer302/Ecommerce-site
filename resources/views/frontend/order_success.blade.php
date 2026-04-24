@extends('frontend.layout.master')

@section('content')
    <div class="container2">
        <h2 style="margin: 1em; font-size: 24px; color: #333;">Order Confirmation</h2>
        <div class="row">

            <div class="col-12">
                @foreach ($lines as $i => $line)
                    <div
                        style="display: flex; border-bottom: {{ count($lines) == $i + 1 ? '0px' : '1px' }} solid #ddd; padding: 10px 0; align-items: center;">
                        <!-- Product Info -->
                        <div style="flex: 1; display: flex; align-items: center;">
                            <img src="image/{{ @$line->product->image }}" alt="Product Image"
                                style="width: 50px; height: auto; margin-right: 10px; border-radius: 5px;">
                            <div>
                                <h2 style="font-size: 14px; font-weight: bold; color: #333; margin-bottom: 5px;">
                                    {{ @$line->product->name }}</h2>
                                {{-- <p style="margin: 0; font-size: 12px; color: #555;">Shoe</p> --}}
                            </div>
                        </div>

                        <!-- Quantity -->
                        <div style="flex: 1; text-align: center;">
                            <h2 style="font-size: 12px; font-weight: bold; color: #333; margin-bottom: 5px;">Qty</h2>
                            <p style="font-size: 14px; color: #000; margin: 5px 0;">{{ $line->quantity }}</p>
                        </div>

                        <!-- Price -->
                        <div style="flex: 1; text-align: center;">
                            <h2 style="font-size: 12px; font-weight: bold; color: #333; margin-bottom: 5px;">Price</h2>
                            <p style="font-size: 14px; color: #000; margin: 5px 0;">{{ $line->price }}<span
                                    style="font-size: 12px; color: #888; margin-left: 3px;"> AED</span></p>
                        </div>

                        <!-- Subtotal -->
                        <div style="flex: 1; text-align: center;">
                            <h2 style="font-size: 12px; font-weight: bold; color: #333; margin-bottom: 5px;">Sub Total</h2>
                            <p style="font-size: 14px; color: #000; margin: 5px 0;">{{ $line->sub_price }}<span
                                    style="font-size: 12px; color: #888; margin-left: 3px;"> AED</span></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row" style="padding: 20px;">
            <div class="col-12" style="display: flex; justify-content: flex-end;">
                <div class="col-12 summary-box"
                    style="display: inline-block; margin-right: 10px; text-align: right; padding: 20px; border-radius: 8px; ">
                    <h2 style="margin-bottom: 15px; font-size: 24px; color: #333;">Summary</h2>
                    <p style="margin-bottom: 10px; font-size: 18px; color: #555; line-height: 1.6;">Shipping Fee:
                        <strong>{{ $order->delivery_charge }} AED</strong>
                    </p>
                    <p style="margin-bottom: 10px; font-size: 18px; color: #555; line-height: 1.6;">VAT:
                        <strong>{{ $order->total_vat }} AED</strong>
                    </p>
                    <p style="margin-top: 20px; font-size: 20px; font-weight: bold; color: #333; line-height: 1.6;">Grand
                        Total: <span style="color: #d9534f;">{{ $order->total_price }} AED</span></p>

                    <!-- Left-aligned message with enhanced spacing and alignment -->
                    <div style="text-align: left; margin-top: 25px; padding-top: 15px; border-top: 1px solid #ddd;">
                        <p style="font-size: 14px; color: #02950d; line-height: 1.5;">Your order has been placed
                            successfully!
                            Thank you for shopping with us.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @if ($order->total_qty < 2)
        <div class="container2" style="text-align: center;margin-top:20px !important">
            <div class="row d-flex justify-content-center align-items-center">
                <!-- Image Section for Desktop (40%) -->
                <div class="col-12 col-md-5" style="display: flex; justify-content: center;">
                    <img src="{{ asset('front/img/free_Shipping.svg') }}" alt="Free Delivery"
                        style="width: 100%; max-width: 70vw;height:325px">
                </div>

                <!-- Text Section for Desktop (remaining 60%) -->
                <div class="col-12 col-md-7" style="display: flex; flex-direction: column; align-items: center;">
                    <h1>FREE SHIPPING AWAITS</h1>
                    <br>
                    <p style="color:#ff1717"><b>Add 1 more item to your cart for free shipping on orders with 2 or more
                            products.</b></p>

                    <br>
                    <a href="/" class="success-btn">Continue Shopping</a>
                </div>
            </div>
        </div>
    @else
        <div class="container3">
            <div class="row">
                <div class="col-12">
                    <a href="/" class="success-btn">Continue Shopping</a>
                </div>
            </div>
        </div>
    @endif
@endsection
