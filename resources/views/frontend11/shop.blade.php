@extends('frontend.layout.master')

@section('content')
    <style>
        /* Card container styles */
        .card-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            /* 4 equal-width columns */
            gap: 20px;
            margin: 20px;
        }

        /* Card styles */
        .card {
            width: 100%;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.185);
            border-radius: 25px !important;
            margin-top: 20px;
            transition: transform 0.3s ease;
            height: 100%;
            /* Ensures equal height */
            display: flex;
            flex-direction: column;
        }

        .card-footer {
            border-bottom-left-radius: 25% !important;
            border-bottom-right-radius: 25% !important;
            background: #fff !important;
            border-top: 0px !important;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-img-bac {
            height: 220px;
            /* background: linear-gradient(90deg, rgba(255, 210, 0, 1) 54%, rgba(247, 154, 28, 1) 100%); */
            border-top-left-radius: 25px !important;
            border-top-right-radius: 25px !important;
            width: 100%;
        }

        .card-img {
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border-radius: 10px;
        }

        .card-img img {
            width: auto;
            height: 160px;
            max-width: 90%;
            object-fit: contain;
            display: block;
            border-radius: 10px;
            margin-top: 20px;
            padding: 10px;
        }

        .card-body {
            flex-grow: 1;
            padding: 15px;
            /* text-align: center; */
        }

        .card-body .card-title {
            font-size: 1.2rem;
            margin-bottom: 10px;
            overflow: hidden;
            text-overflow: ellipsis;
            text-align: center;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            /* Allows two lines */
            -webkit-box-orient: vertical;
            max-height: 48px;
            word-wrap: break-word;
        }

        .btn-theme {
            background-color: var(---lightgray);
            color: var(---black);
            padding: 10px 15px;
            border-radius: 100px;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            font-weight: 600;
            transition: background 0.3s ease;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .star {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .star i {
            font-size: 16px;
            color: var(---yellow);
            margin: 0px 2px;
        }

        .btn-theme:hover {
            background-color: #fdb916;
        }

        .content-link {
            text-decoration: none;
            font-size: 16px;
            font-weight: 600;
            color: #000;
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px 0;
            list-style-type: none;
            padding: 0;
        }

        /* Pagination links */
        .pagination li {
            margin: 0 5px;
        }

        /* Style for the links */
        .pagination a,
        .pagination span {
            display: block;
            padding: 10px 15px;
            background-color: #f4f4f4;
            color: #333;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        /* Active or current page */
        .pagination .active a {
            background-color: #ffb74d;
            color: #fff;
            border-color: #ffb74d;
        }

        /* Hover effect for links */
        .pagination a:hover {
            background-color: #ff9800;
            color: #fff;
            border-color: #ff9800;
        }

        /* Disabled page links */
        .pagination .disabled a {
            background-color: #e0e0e0;
            color: #b0b0b0;
            cursor: not-allowed;
            border-color: #ddd;
        }

        .pagination .prev,
        .pagination .next {
            display: none;
        }


        /* Breadcrumb container */
        nav[aria-label="breadcrumb"] {
            padding: 10px 0;
            border-radius: 5px;
        }

        /* Breadcrumb list */
        .breadcrumb {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 0;
            padding-left: 0;
            list-style: none;
        }

        /* Breadcrumb items */
        .breadcrumb-item {
            font-size: 14px;
            margin-right: 5px;
            font-weight: normal;
            color: #6c757d;
            /* Gray color for inactive links */
        }

        /* Active breadcrumb item */
        .breadcrumb-item.active {
            font-weight: bold;
            color: #fdb916;
            /* Custom color for active item */
        }

        /* Breadcrumb item separator */
        .breadcrumb-item+.breadcrumb-item::before {
            content: "›";
            padding: 0 5px;
            color: #6c757d;
            /* Same gray color */
        }

        /* Links in breadcrumb */
        .breadcrumb-item a {
            color: #007bff;
            /* Blue color for links */
            text-decoration: none;
            /* Remove underline */
        }

        /* Links hover effect */
        .breadcrumb-item a:hover {
            text-decoration: underline;
        }

        /* Responsive styles */

        /* Container for heading and sorting dropdown */
        .d-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px 0;
        }

        /* Styling for the heading */
        .showing_re {
            font-size: 16px;
            font-weight: 600;
            color: #333;
            margin: 0;
            /* To remove default margin */
        }

        /* Styling for the sorting dropdown */
        #sortSelect {
            font-size: 12px;
            font-weight: 500;
            padding: 10px 30px;
            border-radius: 5px;
            border: 1px solid #ddd;
            background-color: #fff;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        /* Hover effect for the dropdown */
        #sortSelect:hover {
            border-color: #ff9800;
            /* Highlight border color on hover */
        }



        /* Focused state for the dropdown */
        #sortSelect:focus {
            outline: none;
            border-color: #ff9800;
            /* Focused border color */
            box-shadow: 0 0 5px rgba(255, 152, 0, 0.5);
            /* Subtle glow effect */
        }

        .price {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: auto;
            height: auto !important;
        }

        .price .cut {
            font-size: 25px;
            color: var(---black);
            font-weight: 500;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .price .cuts {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 30px;
            background-color: var(---yellow);
            border-radius: 10px;
            font-size: 16px;
            margin-left: 5px;
        }

        .price .cut::before {
            position: absolute;
            width: 100%;
            height: 1px;
            background-color: var(---red);
            top: 18px;
            content: "";
        }

        .price .pri {
            color: var(---yellow);
            font-size: 26px;
            font-weight: 700;
            margin-left: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .red {
            background-color: var(---red);
            color: var(---white);
            border-radius: 10px;
            width: 61px;
            height: 31px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            margin-left: 5px;
        }


        /* Mobile responsive styling */
        @media (max-width: 768px) {
            .card-container {
                grid-template-columns: repeat(2, 1fr);
                /* 2 equal-width columns */
            }

            .d-flex {
                flex-direction: column;
                /* Stack items vertically on smaller screens */
                align-items: flex-start;
                /* Align to the left for smaller screens */
            }

            .showing_re {
                font-size: 14px;
                /* Smaller text on mobile */
                margin-bottom: 10px;
                /* Add some space below the heading */
            }

            #sortSelect {
                width: 100%;
                /* Make the dropdown full-width on mobile */
                margin-top: 10px;
                /* Add spacing between dropdown and heading */
            }

            .breadcrumb {
                font-size: 12px;
                /* Smaller font size on mobile */
            }
        }



        @media (max-width: 480px) {
            .card-container {
                grid-template-columns: 1fr;
                /* 1 column for mobile */
            }

            #sortSelect {
                font-size: 10px;
            }

            .select_show {
                display: flex;
            }

            .showing_re {
                font-size: 12px;
            }

            .btn-theme {
                margin-bottom: 20px;
            }
        }

        .btns-flex {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 10px;
            margin-left: auto;
            margin-right: auto;
            max-width: 350px;
        }

        .btns-flex .buy-now-btn-4,
        .btns-flex .add-to-cart-2 {
            min-width: 110px;
            text-align: center;
            flex: 1 1 0;
            font-size: 13px;
            margin: 0 !important;
        }

        @media (max-width: 576px) {
            .btns-flex {
                max-width: 100%;
                width: 100%;
                box-sizing: border-box;
                padding-left: 8px;
                padding-right: 8px;
                gap: 6px;
            }

            .btns-flex .buy-now-btn-4,
            .btns-flex .add-to-cart-2 {
                min-width: 0;
                max-width: 100%;
                width: 100%;
                font-size: 10px;
                padding: 4px 0;
                white-space: nowrap;
                text-align: center;
                overflow: hidden;
                text-overflow: ellipsis;
            }
        }

        .add-to-cart-btn {
            background-color: #fdb916;
            color: #222222;
            padding: 12px 20px;
            border-radius: 100px;
            font-size: 14px;
            font-weight: 600;
            margin: 0px 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: background 0.2s;
            border: none;
        }

        .add-to-cart-btn:hover,
        .add-to-cart-btn:focus {
            box-shadow: 0px 10px 15px #fdb81685;
            background-color: #efefef;
            color: #222222;
            text-decoration: none;
        }

        .button.btns-flex {
            display: flex;
            gap: 16px;
            align-items: center;
            justify-content: center;
            margin-top: 10px;
        }

        .buy-now-btn-4,
        .add-to-cart-btn {
            margin: 0 !important;
            min-width: 140px !important;
            padding: 12px 20px !important;
            border-radius: 100px !important;
            font-size: 14px !important;
            font-weight: 600 !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            height: 44px !important;
            line-height: 1 !important;
            box-sizing: border-box !important;
            border: none !important;
            background: #efefef !important;
            color: #222 !important;
        }
    </style>

    <section class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/" class="text-decoration-none text-black">Home</a>
                </li>
                <li class="breadcrumb-item active fw-bold" style="color: #fdb916;" aria-current="page">
                    Shop
                </li>
            </ol>
        </nav>
        {{-- <div class="select_show"> --}}
        <div class="d-flex justify-content-between flex-row align-items-center">
            <h3 class="showing_re">Showing all {{ $totalProducts }} results</h3>
            <form method="GET" action="{{ route('shop') }}" class="mb-3">
                <select id="sortSelect" name="sort" class="form-select w-auto" onchange="this.form.submit()">
                    <option value="" {{ request('sort') == '' ? 'selected' : '' }}>Default sorting</option>
                    <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Sort A-Z</option>
                    <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Sort Z-A</option>
                    <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest</option>
                    <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest</option>
                </select>
            </form>
        </div>
        {{-- </div> --}}
    </section>
    {{-- <section>
        <div class="card-container">
            @foreach ($products as $product)
                <div class="card h-100">
                    <!-- Image section -->
                    <div class="card-img-bac">
                        <div class="card-img">
                            <img class="embed-responsive-item" src="/image/{{ $product->image }}"
                                alt="{{ $product->name }}">
                        </div>
                    </div>
                    <!-- Card content -->
                    <div class="card-body" style="height: 40px">
                        <h5 class="card-title">
                            <a class="content-link"
                                href="{{ route('products.buy', encryptNumber($product->id)) }}">{{ $product->name }}</a>
                        </h5>
                    </div>
                    <div class="price">
                        @if ($product->old_price != $product->price)
                            <span class="cut">{{ $product->old_price }} <strong class="cuts">AED</strong></span>
                        @endif
                        <span class="pri">{{ $product->price }} <strong class="red">AED</strong></span>
                    </div>
                    <div class="star">
                        <i class="fi fi-ss-star"></i>
                        <i class="fi fi-ss-star"></i>
                        <i class="fi fi-ss-star"></i>
                        <i class="fi fi-ss-star"></i>
                        <i class="fi fi-ss-star"></i>
                    </div>
                    <div class="card-footer">
                        <a class="btn-theme sticky-bottom" href="{{ route('products.buy', encryptNumber($product->id)) }}">
                            Shop Now!
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        @include('components.admin.link')
    </section> --}}
    <section class="bun " id="bun">
        {{-- <p style="font-size: 17px;text-align: center">{{ $cat->name }}</p> --}}

        <div class="big-slider1">
            @foreach ($products as $item)
                <div class="swiper-slide1 box">
                    @if ($item->delivery_charge == 0)
                        <p>free shipping</p>
                    @endif
                    <div class="image">
                        <a href="{{ route('products.buy', encryptNumber($item->id)) }}"><img
                                src="{{ asset('image/' . $item->image) }}" alt=""></a>
                    </div>
                    <div class="text" style="margin: 10px">
                        <h3 class="product_name">{{ $item->name }}</h3>
                        <div class="price">
                            @if ($item->old_price != $item->price)
                                <span class="cut">{{ $item->old_price }} <strong class="cuts">AED</strong></span>
                            @endif
                            <span class="pri">{{ $item->price }} <strong class="red">AED</strong></span>
                        </div>
                        <div class="star">
                            <i class="fi fi-ss-star"></i>
                            <i class="fi fi-ss-star"></i>
                            <i class="fi fi-ss-star"></i>
                            <i class="fi fi-ss-star"></i>
                            <i class="fi fi-ss-star"></i>
                        </div>
                        <div class="button btns-flex">
                            <a href="{{ route('products.buy', encryptNumber($item->id)) }}" class="buy-now-btn-4"
                                style="text-decoration: none;">Shop Now</a>
                            <a href="#" class="add-to-cart-trigger add-to-cart-btn"
                                data-form-id="add-to-cart-{{ $item->id }}">Add to Cart</a>
                        </div>
                    </div>
                    <form id="add-to-cart-{{ $item->id }}" action="{{ route('add.cart') }}" method="POST"
                        style="display: none;">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                        <input type="hidden" name="event_id" value="">
                    </form>
                </div>
            @endforeach
        </div>
        @include('components.admin.link')
    </section>
    <script>
        function generateEventId() {
            return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
                var r = Math.random() * 16 | 0,
                    v = c === 'x' ? r : (r & 0x3 | 0x8);
                return v.toString(16);
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.add-to-cart-trigger').forEach(function(link) {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    var formId = link.getAttribute('data-form-id');
                    var form = document.getElementById(formId);
                    var eventId = generateEventId();

                    // Fire Facebook Pixel event
                    if (typeof fbq !== 'undefined') {
                        fbq('track', 'AddToCart', {
                            // Optionally add more event data here
                        }, {
                            eventID: eventId
                        });
                    }

                    // Set the event_id in the hidden input
                    form.querySelector('input[name="event_id"]').value = eventId;

                    // Submit the form
                    form.submit();
                });
            });
        });
    </script>
@endsection
