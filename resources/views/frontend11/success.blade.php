@extends('frontend.layout.master')

@section('content')
<section class="after-head top-block-page with-back white-curve-after section-white-text">
    <div class="overflow-back bg-orange" style="background-color: #ffffff!important;"></div>
</section>
<div class="overflow-back bg-orange" style="background-color: #ffffff!important;"></div>
    <center>
        <div class="card my-5"
            style="background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;">
            <img src="{{ URL::asset('front/main/tick.png') }}" alt="success">
            <h2 style="color: green">Success</h2>
            <h4>Order Id : #00{{ $order_id }}</h4>
            <h5>Amount: AED {{ $total_price }}</h5>
            <p style="color: black">We received your purchase request;<br /> we'll be in touch shortly!</p>
        </div>
    </center>
@endsection
