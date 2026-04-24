@extends('frontend.layout.master')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        .cart-wrapper {
            min-height: 100vh;
            padding: 40px 0;
        }

        .product-card {
            background-color: #f8f9fa;
            border-radius: 12px;
            transition: transform 0.2s;
        }

        .product-card:hover {
            transform: translateY(-2px);
        }

        .quantity-input {
            width: 60px;
            text-align: center;
            border: 1px solid #dee2e6;
            border-radius: 6px;
        }

        .product-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
        }

        .summary-card {
            background-color: #f8f9fa;
            border-radius: 12px;
            position: sticky;
            top: 20px;
        }

        .checkout-btn {
            background: #f5ad3c;
            border: none;
            transition: transform 0.2s;
        }

        .checkout-btn:hover {
            transform: translateY(-2px);
            background: #F8A103;
        }

        .remove-btn {
            color: #dc2626;
            cursor: pointer;
            transition: all 0.2s;
        }

        .remove-btn:hover {
            color: #991b1b;
        }

        .quantity-btn {
            width: 28px;
            height: 28px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            background: #f3f4f6;
            border: none;
            transition: all 0.2s;
        }

        .quantity-btn:hover {
            background: #e5e7eb;
        }

        .discount-badge {
            background: #dcfce7;
            color: #166534;
            font-size: 0.875rem;
            padding: 4px 8px;
            border-radius: 6px;
        }
    </style>
    <div class="cart-wrapper">
        <div class="container">
            <div class="row">
                <!-- Cart Items Section -->
                <div class="col-lg-7">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="mb-0">Shopping Cart</h4>
                        <span class="text-muted">{{ count($cartItems) }} items</span>
                    </div>

                    <!-- Product Cards -->
                    <div class="d-flex flex-column gap-3" style="display: flex;">
                        @foreach ($cartItems as $item)
                            <div class="product-card shadow-sm">
                                <div class="row align-items-center">
                                    <div class="col-md-2">
                                        <img src="{{ 'image/' . $item['image'] }}" alt="Product" class="product-image">
                                    </div>
                                    <div class="col-md-4">
                                        <h6 class="mb-1">{{ $item['name'] }}</h6>
                                        {{-- <p class="text-muted mb-0">{{ $item['description'] }}</p>
                                    @if ($item['discount'] > 0)
                                        <span class="discount-badge mt-2">{{ $item['discount'] }}% OFF</span>
                                    @endif --}}
                                    </div>
                                    <div class="col-md-3">
                                        <div class="d-flex align-items-center gap-2">
                                            <meta name="csrf-token" content="{{ csrf_token() }}">
                                            <button type="button" class="quantity-btn"
                                                onclick="updateCart({{ $item['product_id'] }}, -1, event)">-</button>
                                            <input type="number" class="quantity-input" value="{{ $item['quantity'] }}"
                                                min="1">
                                            <button type="button" class="quantity-btn"
                                                onclick="updateCart({{ $item['product_id'] }}, 1, event)">+</button>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <span
                                            class="fw-bold">AED{{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                                    </div>

                                    <div class="col-md-1">
                                        <i class="bi bi-trash remove-btn"
                                            onclick="removeItem({{ $item['product_id'] }})"></i>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Summary Section -->
                <div class="col-lg-4 mt-5">
                    <div class="summary-card p-4 shadow-sm">
                        <h5 class="mb-4">Order Summary</h5>

                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">Subtotal</span>
                            <span>AED{{ number_format($total_price, 2) }}</span>
                        </div>
                        {{-- @if ($discount > 0)
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">Discount</span>
                            <span class="text-success">- ${{ number_format($discount, 2) }}</span>
                        </div>
                    @endif --}}
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">Shipping</span>
                            {{-- <span>${{ number_format($shipping, 2) }}</span> --}}
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-4">
                            <span class="fw-bold">Total</span>
                            {{-- <span class="fw-bold">${{ number_format($total, 2) }}</span> --}}
                        </div>

                        <button class="btn btn-primary checkout-btn w-100 mb-3"
                            onclick="window.location.href='{{ route('checkout') }}'">
                            Proceed to Checkout
                        </button>

                        <div class="d-flex justify-content-center gap-2">
                            <i class="bi bi-shield-check text-success"></i>
                            <small class="text-muted">Secure checkout</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateCart(productId, quantityChange, event) {
            // Get the input field for the quantity
            var quantityInput = $(event.target).closest('.d-flex').find('.quantity-input');

            // Get the current quantity
            var currentQuantity = parseInt(quantityInput.val());

            // Calculate the new quantity
            var newQuantity = currentQuantity + quantityChange;

            // Ensure the quantity doesn't go below 1
            if (newQuantity < 1) newQuantity = 1;

            // Set the new value in the input field
            quantityInput.val(newQuantity);

            // Send the updated quantity via AJAX
            $.ajax({
                url: "{{ route('cart.updateajax') }}",
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                data: {
                    product_id: productId,
                    quantity: newQuantity
                },
                success: function(response) {
                    alert(response.message); // Show success message
                    // Optionally reload or update the cart UI with new data
                    location.reload();
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                    alert('Failed to update cart.');
                }
            });
        }



        function removeItem(productId) {
            if (!confirm('Are you sure you want to remove this item?')) return;

            $.ajax({
                url: "{{ route('cart.remove') }}",
                type: "POST",
                data: {
                    id: productId, // Ensure 'id' is being sent
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    alert(response.message);
                    location.reload();
                },
                error: function(xhr) {
                    console.log(xhr.responseText); // Debugging: Check error response
                    alert('Failed to remove item from the cart.');
                }
            });
        }
    </script>
@endsection
