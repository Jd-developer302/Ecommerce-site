@extends('frontend.layout.master')

@section('content')
    <!-----------Categories Area----->
    <section class="cat" id="cat">
        <style>
            @media only screen and (max-width:480px) {
                .bun .big-slider1 {
                    margin-top: 35px !important;
                }

                .cat-slider .swiper-wrapper {
                    padding-top: 0px !important;
                    padding-bottom: 10px !important;
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
        </style>
        {{-- <h1 id="" style="text-align: center;margin:0">Shop by categories</h1> --}}
        <div class="swiper cat-slider">
            <div class="swiper-wrapper">
                @foreach ($categories as $catitem)
                    <a href="{{ route('cat.view', encryptNumber($catitem->id)) }}">
                        <div class="swiper-slide bigbox">
                            <div class="box">
                                <img src="{{ asset('image/' . $catitem->image) }}" alt="">
                            </div>
                            <a href="{{ route('cat.view', encryptNumber($catitem->id)) }}">{{ $catitem->name }}</a>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="swiper-button-prev hide-mobile"></div>
            <div class="swiper-button-next hide-mobile"></div>
    </section>
    <!-----------Categories Area----->

    <!-----------For You Area ------->

    <!----------Product 1   -------->
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
                    <div class="text">
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
                        <div class="button">
                            <a href="{{ route('products.buy', encryptNumber($item->id)) }}" class="buy-now-btn-4">Shop
                                Now</a>
                            <a href="#" class="add-to-cart-trigger add-to-cart-btn mt-5"
                                data-form-id="add-to-cart-{{ $item->id }}">Add to Cart</a>
                        </div>
                    </div>
                </div>
                <form id="add-to-cart-{{ $item->id }}" action="{{ route('add.cart') }}" method="POST"
                    style="display: none;">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $item->id }}">
                    <input type="hidden" name="event_id" value="">
                </form>
            @endforeach
        </div>

    </section>
    <!----------Product 1   -------->
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
