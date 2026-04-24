@extends('frontend.layout.master')

@section('content')
    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area bg-grey">
        <div class="container">
            <div class="ho-breadcrumb">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="">Product</a></li>
                    {{-- <li>SonicFuel Wireless Over-Ear Headphones</li> --}}
                </ul>
            </div>
        </div>
    </div>
    <!--// Breadcrumb Area -->
    <!-- Product Details Area -->
    <div class="product-details-area bg-white ptb-30">
        <div class="container">

            <div class="pdetails">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="pdetails-images">
                            <div class="pdetails-largeimages pdetails-imagezoom">
                                <div class="pdetails-singleimage" data-src="{{ asset('image/' . @$product->image) }}">
                                    <img src="{{ asset('image/' . @$product->image) }}" alt="product image">
                                </div>
                                @if (isset($product->images))
                                    @foreach ($product->images as $item)
                                        <div class="pdetails-singleimage" data-src="{{ asset('images/' . @$item->image) }}">
                                            <img src="{{ asset('images/' . @$item->image) }}" alt="product image">
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            <div class="pdetails-thumbs">
                                <div class="pdetails-singlethumb">
                                    <img src="{{ asset('image/' . @$product->image) }}" alt="product thumb">
                                </div>
                                @foreach ($product->images as $item)
                                    <div class="pdetails-singlethumb">
                                        <img src="{{ asset('images/' . @$item->image) }}" alt="product thumb">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="pdetails-content">

                            <div class="rattingbox">
                                <span class="active"><i class="ion ion-ios-star"></i></span>
                                <span class="active"><i class="ion ion-ios-star"></i></span>
                                <span class="active"><i class="ion ion-ios-star"></i></span>
                                <span class="active"><i class="ion ion-ios-star"></i></span>
                                <span class="active"><i class="ion ion-ios-star"></i></span>
                            </div>
                            <h3>{{ $product->name }}</h3>
                            <div class="pdetails-pricebox">
                                @if ($product->old_price != $product->price)
                                    <del class="oldprice">AED {{ $product->old_price }}</del>
                                @endif
                                <span class="price">AED {{ $product->price }}</span>
                                @if (!isset($product->old_price))
                                    @php
                                        $product->old_price = $product->price;
                                    @endphp
                                @endif
                                @if ($product->old_price != $product->price)
                                    @php
                                        $percentage = (($product->old_price - $product->price) / $product->old_price) * 100;
                                    @endphp
                                    <span class="badge">Save {{ number_format($percentage, 2) }}%</span>
                                @endif
                            </div>
                            <p>{!! $product->description !!}</p>
                            <form action="{{ route('add.cart') }}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="pdetails-quantity">
                                    <div class="quantity-select">
                                        <input type="text" value="1" name="qty">
                                        <div class="inc qtybutton">+<i class="ion ion-ios-arrow-up"></i></div>
                                        <div class="dec qtybutton">-<i class="ion ion-ios-arrow-down"></i></div>
                                    </div>
                                    <button type="submit" class="ho-button">
                                        <i class="lnr lnr-cart"></i>
                                        <span>Add to cart</span>
                                    </button>
                                </div>
                            </form>
                            {{-- <div class="pdetails-categories">
                                <span>Categories :</span>
                                <ul>
                                    <li><a href="shop-rightsidebar.html">Accessories</a></li>
                                    <li><a href="shop-rightsidebar.html">Kids</a></li>
                                    <li><a href="shop-rightsidebar.html">Women</a></li>
                                </ul>
                            </div> --}}
                            {{-- <div class="pdetails-tags">
                                <span>Tags :</span>
                                <ul>
                                    <li><a href="shop-rightsidebar.html">Electronic</a></li>
                                    <li><a href="shop-rightsidebar.html">Television</a></li>
                                </ul>
                            </div> --}}
                            {{-- <div class="pdetails-socialshare">
                                <span>Share :</span>
                                <ul>
                                    <li><a href="#"><i class="ion ion-logo-facebook"></i></a></li>
                                    <li><a href="#"><i class="ion ion-logo-twitter"></i></a></li>
                                    <li><a href="#"><i class="ion ion-logo-googleplus"></i></a></li>
                                    <li><a href="#"><i class="ion ion-logo-pinterest"></i></a></li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="pdetails-allinfo">

                <ul class="nav pdetails-allinfotab justify-content-center" id="product-details" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="product-details-area1-tab" data-bs-toggle="tab"
                            href="#product-details-area1" role="tab" aria-controls="product-details-area1"
                            aria-selected="true">Overview
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" id="product-details-area2-tab" data-bs-toggle="tab"
                            href="#product-details-area2" role="tab" aria-controls="product-details-area2"
                            aria-selected="false">Overview</a>
                    </li> --}}
                </ul>

                <div class="tab-content" id="product-details-ontent">
                    <div class="tab-pane fade show active" id="product-details-area1" role="tabpanel"
                        aria-labelledby="product-details-area1-tab">
                        <div class="pdetails-description">
                            {!! $product->specification !!}
                        </div>
                    </div>
                    {{-- <div class="tab-pane fade" id="product-details-area2" role="tabpanel"
                        aria-labelledby="product-details-area2-tab">
                        <div class="pdetails-moreinfo">
                            <a href="#">
                                <img src="images/others/product-author-logo.jpg" alt="brand logo">
                            </a>
                            <p><b>Reference:</b> demo_3</p>
                            <p><b>In Stock:</b> 1195 Items</p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="product-details-area3" role="tabpanel"
                        aria-labelledby="product-details-area3-tab">
                        <div class="pdetails-reviews">
                            <div class="product-review">
                                <div class="commentlist">
                                    <h5>1 REVIEW FOR AENEAN EU TRISTIQUE</h5>
                                    <div class="single-comment">
                                        <div class="single-comment-thumb">
                                            <img src="images/others/author-image-1.png" alt="hastech logo">
                                        </div>
                                        <div class="single-comment-content">
                                            <div class="single-comment-content-top">
                                                <h6>ADMIN – September 17, 2017</h6>
                                                <div class="rattingbox">
                                                    <span class="active"><i class="ion ion-ios-star"></i></span>
                                                    <span class="active"><i class="ion ion-ios-star"></i></span>
                                                    <span class="active"><i class="ion ion-ios-star"></i></span>
                                                    <span class="active"><i class="ion ion-ios-star"></i></span>
                                                    <span class="active"><i class="ion ion-ios-star"></i></span>
                                                </div>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam
                                                fringilla augue nec est tristique auctor. Donec non est at
                                                libero vulputate rutrum.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="commentbox mt-5">
                                    <h5>ADD A REVIEW</h5>
                                    <form action="#" class="ho-form">
                                        <div class="ho-form-inner">
                                            <div class="single-input">
                                                <label>Your Rating</label>
                                                <div class="rattingbox hover-action">
                                                    <span class="active"><i class="ion ion-ios-star"></i></span>
                                                    <span class="active"><i class="ion ion-ios-star"></i></span>
                                                    <span class="active"><i class="ion ion-ios-star"></i></span>
                                                    <span><i class="ion ion-ios-star"></i></span>
                                                    <span><i class="ion ion-ios-star"></i></span>
                                                </div>
                                            </div>
                                            <div class="single-input">
                                                <label for="new-review-textbox">Your Review</label>
                                                <textarea id="new-review-textbox" cols="30" rows="5"></textarea>
                                            </div>
                                            <div class="single-input">
                                                <label for="new-review-name">Name*</label>
                                                <input type="text" id="new-review-name">
                                            </div>
                                            <div class="single-input">
                                                <label for="new-review-email">Email*</label>
                                                <input type="email" id="new-review-email">
                                            </div>
                                            <div class="single-input">
                                                <button class="ho-button" type="submit"><span>SUBMIT</span></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div> --}}
                </div>

            </div>

        </div>
        @if (isset($products) && $products->count() > 0)
            <div class="container">
                <div class="col-lg-2"></div>
                <div class="section-title col-lg-3 col-sm-5 col-7 pt-3" style="position:relative">
                    <h3>Related Products</h3>
                </div>
                <div class="product-slider deal-of-the-day-slider slider-navigation-2 slider-dots">
                    @foreach ($products as $item)
                        @if ($item->id != $product->id)
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
                        @endif
                    @endforeach

                </div>
            </div>
        @endif
        <div style="background:white;padding:4px"></div>
    </div>
    <!--// Product Details Area -->
@endsection
