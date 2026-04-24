@extends('frontend.layout.master', ['setting' => $setting])
@section('content')
    <!-- Page Conttent -->
    <main class="page-content">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Shopping Cart Area -->
        <div class="cart-page-area ptb-30 bg-white">
            @if ($cartItems != null)
                <div class="container">
                    <!-- Cart Products -->
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered table-hover mb-0">
                            <thead>
                                <tr>
                                    <th class="cart-column-image" scope="col">IMAGE</th>
                                    <th class="cart-column-productname" scope="col">PRODUCT</th>
                                    <th class="cart-column-price" scope="col">PRICE</th>
                                    <th class="cart-column-quantity" scope="col">QUANTITY</th>
                                    <th class="cart-column-total" scope="col">TOTAL</th>
                                    <th class="cart-column-remove" scope="col">REMOVE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item)
                                    <tr>
                                        <td class="tdClass">
                                            <a href="#" class="product-image">
                                                <img src="image/{{ $item['image'] }}" alt="product image">
                                            </a>
                                        </td>
                                        <td class="tdClass">
                                            <a href="#" class="product-title">{{ $item['name'] }}</a>
                                        </td>
                                        <td class="tdClass">AED {{ $item['price'] }}</td>
                                        <td class="tdClass">
                                            <div class="quantity-select">
                                                <input type="number" id="update-cart" data-id="{{ $item['product_id'] }}"
                                                    value="{{ $item['quantity'] }}">
                                                <div class="inc qtybutton">+<i class="ion ion-ios-arrow-up"></i></div>
                                                <div class="dec qtybutton">-<i class="ion ion-ios-arrow-down"></i></div>
                                            </div>
                                        </td>
                                        <td class="tdClass">
                                            <span class="total-price">AED {{ $item['price'] * $item['quantity'] }}</span>
                                        </td>
                                        <td class="tdClass">
                                            <button class="remove-product" data-id="{{ $item['product_id'] }}"><i
                                                    class="ion ion-ios-close"></i></button>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                    <!--// Cart Products -->


                    <!-- Cart Content -->
                    <div class="cart-content">
                        <div class="row justify-content-between">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="cart-content-left">
                                    <div class="ho-buttongroup">
                                        <a href="#" class="ho-button ho-button-sm">
                                            <span>Update Cart</span>
                                        </a>
                                        <a href="shop-rightsidebar.html" class="ho-button ho-button-sm">
                                            <span>Continue Shopping</span>
                                        </a>
                                    </div>
                                    <div class="cart-content-coupon">
                                        <h6>COUPON</h6>
                                        <p>Enter your coupon code if you have one.</p>
                                        <form action="#" class="coupon-form">
                                            <input type="text" placeholder="Coupon code">
                                            <button class="ho-button">
                                                <span>Apply Coupon</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="cart-content-right">
                                    <h2>CART TOTALS</h2>
                                    <table class="cart-pricing-table">
                                        <tbody>
                                            <tr class="cart-subtotal">
                                                <th>SUBTOTAL</th>
                                                <td class="tdClass">AED {{ $total_price }}</td>
                                            </tr>
                                            <tr class="cart-shipping">
                                                <th>SHIPPING</th>
                                                <td class="tdClass">AED {{ $courier }}</td>
                                            </tr>
                                            <tr class="cart-total">
                                                <th>Total</th>
                                                <td class="tdClass">AED {{ $total_price + $courier }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a href="#" class="ho-button">
                                        <span>Proceed to Checkout</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--// Cart Content -->

                </div>
            @else
                <center>
                    <h5>Your cart is empty!!</h5>
                </center>
            @endif
        </div>
        <!--// Shopping Cart Area -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                // Get the product ID from the button's data attribute
                // var productId = $(this).data('id');
                $("#update-cart").change(function(event) {
                    var quantity = $(this).val();
                    var productId = $(this).data('id');
                    $.ajax({
                        type: "POST",
                        url: "{{ url('update-cart-ajax') }}",
                        data: {
                            '_token': CSRF_TOKEN,
                            'quantity': quantity,
                            'product_id': productId
                        },
                        cache: false,
                        success: function(data) {
                            // console.log(data); // I get error and success function does not execute
                            window.location.reload();
                        }
                    });

                });
                $(".remove-product").click(function(event) {
                    var productId = $(this).data('id');
                    $.ajax({
                        type: "POST",
                        url: "{{ url('remove') }}",
                        data: {
                            '_token': CSRF_TOKEN,
                            'id': productId
                        },
                        cache: false,
                        success: function(data) {
                            // console.log(data); // I get error and success function does not execute
                            window.location.reload();
                        }
                    });

                });
                $('.inc').click(function() {
                    // var currentValue = $('.inc').val();
                    var currentValue = $('#update-cart').val();
                    currentValue++;
                    $('.inc').val(currentValue);
                    $("#update-cart").trigger('change');
                });
                $('.dec').click(function() {
                    var currentValue = $('#update-cart').val();
                    currentValue--;
                    $('.dec').val(currentValue);
                    $("#update-cart").trigger('change');
                });

            });
        </script>
    @endsection
