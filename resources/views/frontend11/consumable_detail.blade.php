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
                            <span>Consumable</span>
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
                                        <img class="w-100" src="/image/{{ $consumable->image}}" alt="printer">

                                    </div> --}}
                                    <div class="slider-for">
                                        <div class="product1"><img src="/image/{{ $consumable->image }}" width="250px"
                                                height="auto" alt=""></div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <h2 class="mb-2 entity-title">{{ $consumable->name }}</h2>
                                    <div class="mb-3 entity-price">
                                        <span class="entity-price-current">AED {{ $consumable->price }}</span>
                                        {{-- <span class="entity-price-old">$6.00</span> --}}
                                    </div>
                                    <div class="entity-action-btns">
                                        <form method="POST" action="{{ route('cart.store') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row grid">
                                                <div class="col-auto">
                                                    <input type="hidden" name="id" value="i{{ $consumable->id }}">
                                                    <input type="hidden" name="name" value="{{ $consumable->name }}">
                                                    <input type="hidden" name="price" value="{{ $consumable->price }}">
                                                    <input type="hidden" name="image" value="{{ $consumable->image }}">
                                                    <input type="hidden" name="quantity" value="1">
                                                </div>
                                                @if ($consumable->quantity > 0)
                                                    <div class="col-auto col-lg" style="padding-left: 0;">
                                                        <button class="btn btn-theme" type="submit">Add to cart</button>
                                                    </div>
                                                @else
                                                    <div class="col-auto col-lg" style="padding-left: 0;">
                                                        <button class="btn btn-warning" disabled>Out of stock</button>
                                                    </div>
                                                @endif
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h6>Description</h6>
                            <div class="mb-4 entity-body" style="color: black">
                                {!! nl2br(e($consumable->description)) !!}
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <h2 class="mb-2 entity-title" style="    text-align: center;">Related Products</h2>
                            </div>

                        </div>
                        <div class="container">
                            <div class="grid row">
                                @foreach ($related as $item)
                                    <div class="col-sm-6 col-lg-4">
                                        <article
                                            class="entity-block entity-hover-shadow text-center entity-preview-show-up products">
                                            <div class="entity-preview">
                                                <div class="embed-responsive embed-responsive-4by3"><img
                                                        class="embed-responsive-item" src="/image/{{ $item->image }}"
                                                        alt="{{ $item->name }}">
                                                </div>

                                            </div>
                                            <div class="pb-4 entity-content">
                                                <h4 class="entity-title"><a class="content-link"
                                                        href="shop-product-sidebar-right.html">{{ $item->name }}</a>
                                                </h4>
                                                <p><span class="text-danger"><b>AED
                                                        {{ $item->price }}</b>
                                                    </span>
                                                </p>
                                                <div class="mx-auto mt-auto mb-4 text-center"><a
                                                        class="btn-wide mr-2 btn btn-theme"
                                                        href="{{ url('buy', $item->id) }}">buy now</a></div>

                                                <!--   <div class="entity-price"><span class="currency">$</span>1.80 <span class="price-unit">/ kg</span></div> -->
                                            </div>
                                        </article>
                                    </div>
                                @endforeach
                                @foreach ($consumables as $item)
                                @if ($item->id != $cid)
                                    <div class="col-sm-6 col-lg-4">
                                        <article
                                            class="entity-block entity-hover-shadow text-center entity-preview-show-up products">
                                            <div class="entity-preview">
                                                <div class="embed-responsive embed-responsive-4by3"><img
                                                        class="embed-responsive-item" src="/image/{{ $item->image }}"
                                                        alt="{{ $item->name }}">
                                                </div>

                                            </div>
                                            <div class="pb-4 entity-content">
                                                <h4 class="entity-title"><a class="content-link"
                                                        href="shop-product-sidebar-right.html">{{ $item->name }}</a>
                                                </h4>
                                                <p><span class="text-danger"><b>AED
                                                        {{ $item->price }}</b>
                                                    </span>
                                                </p>
                                                <div class="mx-auto mt-auto mb-4 text-center"><a
                                                        class="btn-wide mr-2 btn btn-theme"
                                                        href="{{ url('buy', $item->id) }}">buy now</a></div>

                                                <!--   <div class="entity-price"><span class="currency">$</span>1.80 <span class="price-unit">/ kg</span></div> -->
                                            </div>
                                        </article>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
    {{-- <div class="scroll-top">
        <i class="fas fa-long-arrow-alt-up"></i>
    </div> --}}
@endsection
