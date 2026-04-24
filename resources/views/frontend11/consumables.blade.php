@extends('frontend.layout.master')

@section('content')
    <section class="after-head top-block-page with-back white-curve-after section-white-text">
        <div class="overflow-back bg-orange" style="background-color: #ffffff!important;"></div>
        <div class="content-offs-stick my-5 container">
            <div class="section-solid with-back">
                <div class="full-block">
                    <div class="section-back-text">Shop</div>
                </div>
                <div class="z-index-4 position-relative text-center">
                    <h1 class="section-title">&nbsp;</h1>
                    {{-- <div class="mt-3">
                        <div class="page-breadcrumbs">
                            <a class="content-link" href="">Home</a>
                            <span class="mx-2">\</span>
                            <a class="content-link" href="">Shop</a>
                            <span class="mx-2">\</span>
                            <span>Product</span>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    <section class="bg-light-green white-curve-before curve-before-0 white-curve-after curve-after-40">

        <div class="container">
            <div class="sidebar-container">
                <div class="content">
                    <section class="section">
                        <div class="entity">
                            <div class="grid col-auto px-0 row">
                                <div class="col-md-6">
                                    {{-- <div class="position-relative entity-image">
                                        <img class="w-100" src="/image/{{ $product->image}}" alt="printer">

                                    </div> --}}
                                    <div class="slider-for">
                                        <div class="product1"><img src="/image/{{ $product->image }}" width="250px"
                                                height="auto" alt=""></div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <h2 class="mb-2 entity-title">{{ $product->name }}</h2>
                                    <p style="color: black">{{ $product->description }}</p>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <h2 class="mb-2 entity-title" style="    text-align: center;">Consumables</h2>
                                </div>
                                <div class="container">
                                    <div class="grid row">
                                        @foreach ($consumables as $consumable)
                                            <div class="col-sm-6 col-lg-4">
                                                <article
                                                    class="entity-block entity-hover-shadow text-center entity-preview-show-up products">
                                                    <div class="entity-preview">
                                                        <div class="embed-responsive embed-responsive-4by3"><img
                                                                class="embed-responsive-item"
                                                                src="/image/{{ $consumable->image }}"
                                                                alt="{{ $consumable->name }}"></div>

                                                    </div>
                                                    <div class="pb-4 entity-content">
                                                        <h4 class="entity-title"><a class="content-link"
                                                                href="shop-product-sidebar-right.html">{{ $consumable->name }}</a>
                                                        </h4>
                                                        <h6>{{ $consumable->price }} AED</h6>
                                                        <div class="mx-auto mt-auto mb-4 text-center"><a
                                                                class="btn-wide mr-2 btn btn-theme"
                                                                href="{{ url('buy-consumable', $consumable->id) }}">buy now</a></div>
                                                        <!--   <div class="entity-price"><span class="currency">$</span>1.80 <span class="price-unit">/ kg</span></div> -->
                                                    </div>
                                                </article>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>


                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
    {{-- <div class="cart-sidebar collapse" data-block="cart" data-show-block-class="animation-scale-top-right"
        data-hide-block-class="animation-unscale-top-right">
        <a class="close-link" href="#" data-close-block="true">
            <i class="fas fa-times"></i>
        </a>
        <div class="cart-inner">
            <h4 class="text-title mb-2">Cart</h4>
            <div class="separator-line mb-4"></div>
            <div class="entity">
                <div class="grid-sm row">
                    <div class="col-5">
                        <a class="entity-preview-show-up entity-preview" href="shop-product-sidebar-right.html">
                            <span class="embed-responsive embed-responsive-4by3">
                                <img class="embed-responsive-item" src="assets/images/content/720x540/4.png"
                                    alt="">
                            </span>
                            <span class="with-back entity-preview-content">
                                <span class="h3 m-auto text-theme text-center">
                                    <i class="fas fa-search"></i>
                                </span>
                                <span class="overflow-back bg-body-back opacity-70"></span>
                            </span>
                        </a>
                    </div>
                    <div class="col">
                        <h4 class="h5 mb-1 entity-title">
                            <a class="content-link" href="shop-product-sidebar-right.html">Product Name</a>
                        </h4>
                        <div class="entity-price">
                            <span class="currency">$</span>12.50 <span class="entity-quantity">&nbsp;x&nbsp;10</span>
                        </div>
                        <div class="entity-total">total:&nbsp;&nbsp;&nbsp;$125.00</div>
                    </div>
                </div>
            </div>
            <div class="entity">
                <div class="grid-sm row">
                    <div class="col-5">
                        <a class="entity-preview-show-up entity-preview" href="shop-product-sidebar-right.html">
                            <span class="embed-responsive embed-responsive-4by3">
                                <img class="embed-responsive-item" src="assets/images/content/720x540/3.png"
                                    alt="">
                            </span>
                            <span class="with-back entity-preview-content">
                                <span class="h3 m-auto text-theme text-center">
                                    <i class="fas fa-search"></i>
                                </span>
                                <span class="overflow-back bg-body-back opacity-70"></span>
                            </span>
                        </a>
                    </div>
                    <div class="col">
                        <h4 class="h5 mb-1 entity-title">
                            <a class="content-link" href="shop-product-sidebar-right.html">Product name</a>
                        </h4>
                        <div class="entity-price">
                            <span class="currency">$</span>4.99 <span class="entity-quantity">&nbsp;x&nbsp;5</span>
                        </div>
                        <div class="entity-total">total:&nbsp;&nbsp;&nbsp;$24.95</div>
                    </div>
                </div>
            </div>
            <div class="separator-line mt-4 mb-3"></div>
            <ul class="cart-totals list-titled">
                <li>
                    <span class="list-item-title">Sub Total</span>
                    <span class="list-item-value">$149.95</span>
                </li>
                <li>
                    <span class="list-item-title">Shipping</span>
                    <span class="list-item-value">$10.00</span>
                </li>
                <li class="separator-line"></li>
                <li class="cart-total">
                    <span class="list-item-title">Total</span>
                    <span class="list-item-value">$159.95</span>
                </li>
            </ul>
            <a class="w-100 mb-2 btn btn-theme-bordered" href="cart.html">view cart&nbsp;&nbsp;&nbsp; <i
                    class="fas fa-shopping-bag"></i>
            </a>
            <!-- <a class="w-100 btn btn-theme" href="shop-checkout.html">checkout&nbsp;&nbsp;&nbsp; <i class="fas fa-shopping-cart"></i>
            </a> -->
        </div>
    </div> --}}
    {{-- <div class="scroll-top">
        <i class="fas fa-long-arrow-alt-up"></i>
    </div> --}}
@endsection
