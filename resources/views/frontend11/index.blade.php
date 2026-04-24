@extends('frontend.layout.master')

@section('content')
    {{-- <div id="loader-wrapper">
        <div id="loader">
            <img src="{{ asset('front/loader.gif') }}" alt="Loading...">
</div>
</div> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Brand Logo Area -->
    {{-- <div class="ho-section brand-logos-area deal-of-the-day-area bg-white">
        <div class="product-slider">
            <div class="brand-logo-slider slider-navigation-3">
                @foreach ($categories as $item)
                    <div class="brandlogo">
                        <a href="#">
                            <div style="border: 1px solid #fcb816;border-radius:100%;padding:4px;">
                                <figure>
                                    <img src="{{ asset('image/' . $item->image) }}" alt="brand logo">
                                </figure>
                            </div>
                        </a>
                        <p class="blackTxt">{{ $item->name }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}

    <div class="ho-section brand-logos-area deal-of-the-day-area bg-white">
        <div class="product-slider">
            <div class="brand-logo-slider slider-navigation-3">
                @foreach ($categories as $item)
                    <div class="brandlogo">
                        <a href="#">
                            <div style="border: 1px solid #fcb816;border-radius:100%;padding:4px;">
                                <figure>
                                    <img src="{{ asset('image/' . $item->image) }}" alt="brand logo">
                                </figure>
                            </div>
                        </a>
                        <p class="blackTxt">{{ $item->name }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!--// Brand Logo Area -->

    <!-- Banners Area -->
    <div class="banners-area">
        {{-- <div class="container"> --}}
        <div class="row">
            <div class="col-md-12">
                <!-- Hero Area -->
                <div class="herobanner slider-navigation slider-dots">

                    <!-- Herobanner Single -->
                    <div class="herobanner-single">
                        <img src="front/banner/banner1.jpg" alt="hero image">
                        {{-- <div class="herobanner-content">
                                <div class="herobanner-box">
                                    <h4>T800 Ultra</h4>
                                </div>
                                <div class="herobanner-box">
                                    <h1>SMART WATCH</h1>
                                </div>

                                <div class="herobanner-box">
                                    <a href="shop-rightsidebar.html" class="ho-button">
                                        <i class="lnr lnr-cart"></i>
                                        <span>Shop Now</span>
                                    </a>
                                </div>
                            </div> --}}
                        <span class="herobanner-progress"></span>
                    </div>
                    <!--// Herobanner Single -->

                    <!-- Herobanner Single -->
                    <div class="herobanner-single">
                        <img src="front/banner/banner2.jpg" alt="hero image">
                        {{-- <div class="herobanner-content">
                                <div class="herobanner-box">
                                    <h4>ONE - DAY SEMINAR</h4>
                                </div>
                                <div class="herobanner-box">
                                    <h1>Writing & Product <span>For VR</span></h1>
                                </div>
                                <div class="herobanner-box">
                                    <p>Learn how to write and produce cinematic Virtual Reality content by revered
                                        industry leaders.</p>
                                </div>
                                <div class="herobanner-box">
                                    <a href="shop-rightsidebar.html" class="ho-button">
                                        <i class="lnr lnr-cart"></i>
                                        <span>Shop Now</span>
                                    </a>
                                </div>
                            </div> --}}
                        <span class="herobanner-progress"></span>
                    </div>
                    <!--// Herobanner Single -->

                </div>
                <!--// Hero Area -->
            </div>

        </div>
        {{-- </div> --}}
    </div>
    <!--// Banners Area -->

    <!-- Page Conttent -->
    <main class="page-content">

        @if (count($megaDeals) > 0)
            <div class="container mega-deal">
                <div class="row">
                    <h2>MEGA DEALS OF THE DAY</h2>
                </div>
                <div class="row deal-wrapper slider-navigation-2 slider-dots">
                    @foreach ($megaDeals as $item)
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <div class="mega-item">
                                <figure>
                                    <a
                                        href="{{ route('products.detail', ['name' => str_replace([' ', '-'], '_', $item->name), 'id' => $item->id]) }}">
                                        <img src="{{ asset('image/' . $item->image) }}">
                                    </a>
                                    {{-- <span class="arrival-cart add-to-cart curseP" data-id="{{ $item->id }}">
                        <i class="lnr lnr-cart"></i>
                        </span> --}}
                                </figure>

                                <a
                                    href="{{ route('products.detail', ['name' => str_replace([' ', '-'], '_', $item->name), 'id' => $item->id]) }}">
                                    <h5>{{ $item->name }}</h5>
                                </a>
                                <div class="hoproduct-pricebox">
                                    <p class="timer">00:04:36:15</p>
                                    @if ($item->old_price != $item->price)
                                        <span class="price-strike">
                                            <span class="strike-rate">{{ $item->price }} <span
                                                    class="strike-aed">AED</span></span>
                                    @endif
                                    </span>
                                    <div class="pricebox">
                                        <span class="price">{{ $item->old_price }} <span class="aed">AED</span></span>

                                    </div>
                                    <a href="" class="deal-buy">Buy Now !</a>
                                    @if ($item->delivery_charge == 0)
                                        <span class="free-delivery">Free Delivery</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- april 3rd start-->
        <div class="container offer-section">
            <div class="row">
                <div class="col-md-6">
                    <div class="offer-right">
                        <h2>BRAND</h2>
                        <h4>MEGA OFFER</h4>
                        <div class="brand-content">
                            <div class="brandbox">
                                <img src="front/images/deal1.png" />
                                <div class="brand-price">
                                    <h6>1300 AED</h6>
                                    <h4 style="color: red">800 AED</h4>
                                    <a href="">shop now!</a>
                                </div>
                            </div>

                            <div class="brandbox">
                                <img src="front/images/arrival5.png" />
                                <div class="brand-price">
                                    <h6>1300 AED</h6>
                                    <h4 style="color: red">800 AED</h4>
                                    <a href="">shop now!</a>
                                </div>
                            </div>

                            <div class="brandbox">
                                <img src="front/images/deal1.png" />
                                <div class="brand-price">
                                    <h6>1300 AED</h6>
                                    <h4 style="color: red">800 AED</h4>
                                    <a href="">shop now!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="offer-right">
                        <h2>BRAND</h2>
                        <h4>MEGA OFFER</h4>
                        <div class="brand-content">
                            <div class="brandbox">
                                <img src="front/images/deal1.png" />
                                <div class="brand-price">
                                    <h6>1300 AED</h6>
                                    <h4 style="color: red">800 AED</h4>
                                    <a href="">shop now!</a>
                                </div>
                            </div>

                            <div class="brandbox">
                                <img src="front/images/arrival5.png" />
                                <div class="brand-price">
                                    <h6>1300 AED</h6>
                                    <h4 style="color: red">800 AED</h4>
                                    <a href="">shop now!</a>
                                </div>
                            </div>

                            <div class="brandbox">
                                <img src="front/images/deal1.png" />
                                <div class="brand-price">
                                    <h6>1300 AED</h6>
                                    <h4 style="color: red">800 AED</h4>
                                    <a href="">shop now!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- april 3rd end-->

        <!-- april 3rd start-->
        <img src="front/images/cover-img.jpeg" style="width: 100%" />
        <!-- april 3rd end-->

        <!-- new arrival iteam Area -->
        <div class="ho-section features-area bg-white">
            <div class="container">
                {{-- <div class="row">
                    <img src="front/images/arrival-title.png" class="arrivaltitle">
                </div> --}}
                <div class="row arrival-row slider-navigation-2 slider-dots">
                    @foreach ($newArrivals as $item)
                        <div class="col-md-3 col-sm-6 col-xs-6 arrival-col">
                            <div class="arrival-item">
                                <figure>
                                    <a
                                        href="{{ route('products.detail', ['name' => str_replace([' ', '-'], '_', $item->name), 'id' => $item->id]) }}">
                                        <img src="{{ asset('image/' . $item->image) }}">
                                    </a>
                                    {{-- <span class="arrival-cart curseP">
                                        <i class="lnr lnr-cart add-to-cart" data-id="{{ $item->id }}"></i>
                            </span> --}}
                                </figure>

                                <a
                                    href="{{ route('products.detail', ['name' => str_replace([' ', '-'], '_', $item->name), 'id' => $item->id]) }}">
                                    <h5>{{ $item->name }}</h5>
                                </a>
                                <div class="hoproduct-pricebox">
                                    <div class="pricebox">
                                        <span class="price">AED {{ $item->price }}</span>
                                        @if ($item->old_price != $item->price)
                                            <del class="oldprice">AED {{ $item->old_price }}</del>
                                        @endif

                                    </div>
                                </div>
                                @if ($item->delivery_price == 0)
                                    <span class="free-delivery">Free Delivery</span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!--// Features Area -->
        @foreach ($listed as $list)
            <!-- Banner Area -->
            <div class="banners-area">
                <div class="row">
                    <div class="col-md-12">
                        <img src="{{ asset('banner/' . $list->banner) }}" alt="hero image">
                    </div>
                </div>
            </div>
            <!--// Banner Area -->

            <!-- Category Area -->
            <div class="ho-section features-area bg-white">
                <div class="container">
                    <div class="row arrival-row slider-navigation-2 slider-dots">
                        @foreach ($list->products as $prod)
                            <div class="col-md-3 col-sm-6 col-xs-6 arrival-col">
                                <div class="arrival-item1">
                                    <figure>
                                        <a
                                            href="{{ route('products.detail', ['name' => str_replace([' ', '-'], '_', $prod->name), 'id' => $prod->id]) }}">
                                            <img src="{{ asset('image/' . $prod->image) }}">
                                        </a>
                                    </figure>

                                    <a href="">
                                        <h5>{{ $prod->name }}</h5>
                                    </a>
                                    <div class="hoproduct-pricebox">
                                        @if ($prod->price != $prod->old_price)
                                            <span class="price-strike">
                                                <span class="strike-rate">{{ $prod->old_price }} <span
                                                        class="strike-aed">AED</span></span>
                                            </span>
                                        @endif
                                        <div class="pricebox" style="padding: 8px 0px">
                                            <span class="price">{{ $prod->price }} <span
                                                    class="aed">AED</span></span>
                                        </div>
                                        <a href="{{ route('products.detail', ['name' => str_replace([' ', '-'], '_', $prod->name), 'id' => $prod->id]) }}"
                                            class="deal-buy">Buy Now !</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!--// Category Area -->
        @endforeach


        <!-- Deal Of The Day Area -->
        <div class="ho-section deal-of-the-day-area bg-grey">
            <div class="container">
                <div class="col-lg-2"></div>
                <div class="section-title col-lg-3 col-sm-5 col-7 pt-3" style="position:relative">
                    <img src="front/images/section_title.png" alt="Snow">
                    <h3
                        style="position: absolute;top: 60%;left: 45%;transform: translate(-50%, -50%);color:#fff;font-size:20px">
                        Bundles </h3>
                </div>
                <div class="product-slider deal-of-the-day-slider slider-navigation-2 slider-dots">
                    @foreach ($bundles as $item)
                        <div class="product-slider-col">
                            <article class="hoproduct hoproduct-2">
                                <div style="text-align:right">
                                    @if ($item->delivery_charge == 0)
                                        <span class="free-delivery">Free Delivery</span>
                                    @endif
                                </div>
                                <div class="hoproduct-image">
                                    <a class="hoproduct-thumb"
                                        href="{{ route('bundles.detail', ['name1' => str_replace([' ', '-'], '_', $item->name), 'id' => $item->id]) }}">
                                        <img class="hoproduct-frontimage" src="{{ asset('image/' . $item->image) }}"
                                            alt="product image">
                                        <img class="hoproduct-backimage" src="{{ asset('images/' . $item->image_url) }}"
                                            alt="product image">
                                    </a>
                                </div>
                                <div class="hoproduct-content">
                                    <h5 class="hoproduct-title" style="text-align:center"><a
                                            href="{{ route('bundles.detail', ['name1' => str_replace([' ', '-'], '_', $item->name), 'id' => $item->id]) }}">{{ $item->name }}</a>
                                    </h5>

                                    <div class="hoproduct-pricebox" style="text-align:center">
                                        <div style="padding:8px 0px">
                                            @if ($item->old_price != $item->price)
                                                <span class="price-strike">
                                                    <span class="strike-rate">{{ $item->price }} <span
                                                            class="strike-aed">AED</span></span>
                                            @endif
                                            </span>
                                            <span class="price"
                                                style="font-size:17px;font-weight:700;color:#000">{{ $item->old_price }}
                                                <span class="aed">AED</span></span>
                                        </div>
                                        <div class="row px-2">
                                            <a href="{{ route('bundles.detail', ['name1' => str_replace([' ', '-'], '_', $item->name), 'id' => $item->id]) }}"
                                                class="col-sm-12 deal-buy">Buy Now !</a>
                                            <a href="{{ route('bundles.detail', ['name1' => str_replace([' ', '-'], '_', $item->name), 'id' => $item->id]) }}"
                                                class="
                                                col-sm-12 deal-buy">Add
                                                to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach

                </div>
            </div>
            <div style="background:white;padding:4px"></div>
            @foreach ($featuredCats as $cats)
                <div class="container">
                    <div class="col-lg-2"></div>
                    <div class="section-title col-lg-3 col-sm-5 col-7 pt-3" style="position:relative">
                        <img src="front/images/section_title.png" alt="Snow">
                        <h3
                            style="position: absolute;top: 60%;left: 45%;transform: translate(-50%, -50%);color:#fff;font-size:20px">
                            {{ $cats->name }}</h3>
                    </div>
                    <div class="product-slider deal-of-the-day-slider slider-navigation-2 slider-dots">
                        @foreach ($cats->products as $item)
                            <div class="product-slider-col">
                                <article class="hoproduct hoproduct-2" style="max-height:540px">
                                    <div style="text-align:right">
                                        @if ($item->delivery_charge == 0)
                                            <span class="free-delivery">Free Delivery</span>
                                        @endif
                                    </div>
                                    <div class="hoproduct-image">
                                        <a class="hoproduct-thumb"
                                            href="{{ route('products.detail', ['name' => str_replace([' ', '-'], '_', $item->name), 'id' => $item->id]) }}">
                                            <img class="hoproduct-frontimage" src="{{ asset('image/' . $item->image) }}"
                                                alt="product image">
                                            <img class="hoproduct-backimage"
                                                src="{{ asset('images/' . $item->image_url) }}" alt="product image">
                                        </a>
                                    </div>
                                    <div class="hoproduct-content">
                                        <h5 class="hoproduct-title" style="text-align:center"><a
                                                href="{{ route('products.detail', ['name' => str_replace([' ', '-'], '_', $item->name), 'id' => $item->id]) }}">{{ $item->name }}</a>
                                        </h5>

                                        <div class="hoproduct-pricebox" style="text-align:center">
                                            <div style="padding:8px 0px">
                                                @if ($item->old_price != $item->price)
                                                    <span class="price-strike">
                                                        <span class="strike-rate">{{ $item->price }} <span
                                                                class="strike-aed">AED</span></span>
                                                @endif
                                                </span>
                                                <span class="price"
                                                    style="font-size:17px;font-weight:700;color:#000">{{ $item->old_price }}
                                                    <span class="aed">AED</span></span>
                                            </div>
                                            <div class="row px-2">
                                                <a href="{{ route('products.detail', ['name' => str_replace([' ', '-'], '_', $item->name), 'id' => $item->id]) }}"
                                                    class="col-sm-12 deal-buy">Buy Now !</a>
                                                <a href="{{ route('products.detail', ['name' => str_replace([' ', '-'], '_', $item->name), 'id' => $item->id]) }}"
                                                    class="col-sm-12 deal-buy">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div style="background:white;padding:4px"></div>
            @endforeach
        </div>
        <!--catgories section-->
        <div class="category-bottom pb-30" style="padding-top:5px">
            <div class="container">
                <div class="row services-cat">
                    <div class="cat-box">
                        <img src="front/images/all.png" />
                        <p>All</p>
                    </div>
                    <div class="cat-box">
                        <img src="front/images/sale.png" />
                        <p>Sale</p>
                    </div>
                    <div class="cat-box">
                        <img src="front/images/selection.png" />
                        <p>Great Selection</p>
                    </div>
                    <div class="cat-box">
                        <img src="front/images/quallity.png" />
                        <p>Assurred Quality</p>
                    </div>
                    <div class="cat-box">
                        <img src="front/images/delivery.png" />
                        <p>Fast Delivery</p>
                    </div>
                    <!-- <div class="col-1"></div> -->
                    <!-- <div class="col-2" width="100%">
                                                                                                <div class="cat-box">
                                                                                                    <img src="front/images/all.png" />
                                                                                                    <p>All</p>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-2">
                                                                                                <div class="cat-box">
                                                                                                    <img src="front/images/sale.png" />
                                                                                                    <p>Sale</p>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-2">
                                                                                                <div class="cat-box">
                                                                                                    <img src="front/images/selection.png" />
                                                                                                    <p>Great Selection</p>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-2">
                                                                                                <div class="cat-box">
                                                                                                    <img src="front/images/quallity.png" />
                                                                                                    <p>Assurred Quality</p>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-2">
                                                                                                <div class="cat-box">
                                                                                                    <img src="front/images/delivery.png" />
                                                                                                    <p>Fast Delivery</p>
                                                                                                </div>
                                                                                            </div> -->
                    <!-- <div class="col-1"></div> -->
                </div>
            </div>
        </div>
        <!--categories section end-->


    </main>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <input type="tel" id="mobileNumber" class="form-control" placeholder="Enter your mobile number">
            <br>
            <button id="submitMobile" class="btn btn-sm" style="background-color: #FAB936">Submit</button>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.multiple-items').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 3
            });
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $(".add-to-cart").click(function() {
                $("#myModal").show();
            });

            $(".close").click(function() {
                $("#myModal").hide();
            });
            $("#submitMobile").click(function(event) {
                var mobileNumber = $("#mobileNumber").val();
                if (mobileNumber.length > 8) {
                    $.ajax({
                        type: "POST",
                        url: "{{ url('register-customer-phone') }}",
                        data: {
                            '_token': CSRF_TOKEN,
                            'phone': mobileNumber
                        },
                        cache: false,
                        success: function(data) {
                            // console.log(data); // I get error and success function does not execute
                            // window.location.reload();
                            $("#myModal").hide();
                        }
                    });
                } else {
                    alert('Mobile Number is Invalid');
                }

            });
        });
        $('.add-to-cart').click(function(e) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            // Get the product ID from the button's data attribute
            var productId = $(this).data('id');
            var csrf = $('#csrf').val();
            // Ajax request to add the product to the cart
            $.ajax({
                type: 'POST',
                url: '/add-to-cart',
                data: {
                    '_token': CSRF_TOKEN,
                    'id': productId
                },
                cache: false,
                success: function(response) {
                    // Handle success response
                },
                error: function(xhr, textStatus, error) {
                    // Handle error response
                }
            });
        });
    </script>
@endsection
