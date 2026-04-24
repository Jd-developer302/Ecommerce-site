@extends('frontend.layout.master')

@section('content')
    <!-----------Abouts Area--------->
    <section class="abo" id="abo">
        <div class="container">
            <div class="image" data-aos="flip-left">
                <img src="{{ URL::asset('front/img/about.png') }}" alt="">
            </div>
            <div class="text hidden-text">
                <h1 id="text-uppercase">About us</h1>
                <h3 id="text-uppercase">Our Mission & Vision</h3>
                <p>Winscart is a leading version of the e-commerce platform in the Middle<br>East. We started our
                    journey in 2018 in Oman and extended our presence<br>in Qatar in 2019 and UAE in 2020. Our wide
                    range of products includes<br>sterling quality electronics, fashion, beauty care, baby care,
                    and<br>home and kitchen accessories.
                </p>
                <p id="para2">We set our sights on providing satisfaction to customers with our genuine<br>
                    electronics goods. The smart collection at our store inspires fashion<br>
                    lovers and tickled-pink their hearts. Amuse your shopping fun with<br>
                    our popular range.</p>
                <a href="javascript:void(0)" class="add-to-cart mt-20">Shop Now</a>
            </div>
            <div class="text hidden-text1">
                <h1 id="text-uppercase">About us</h1>
                <h3 id="text-uppercase">Our Mission & Vision</h3>
                <p>Winscart is a leading version of the e-commerce platform in the Middle East. We started our
                    journey in 2018 in Oman and extended our presence in Qatar in 2019 and UAE in 2020. Our wide
                    range of products includes sterling quality electronics, fashion, beauty care, baby care,
                    and home and kitchen accessories.
                </p>
                <p id="para2">We set our sights on providing satisfaction to customers with our genuine
                    electronics goods. The smart collection at our store inspires fashion
                    lovers and tickled-pink their hearts. Amuse your shopping fun with
                    our popular range.</p>
                <a href="javascript:void(0)" class="add-to-cart mt-20">Shop Now</a>
            </div>
        </div>
    </section>
    <!-----------Abouts Area--------->

    <!-----------Service Area-------->
    <section class="choose" id="choose">
        <div class="heading">
            <h1 id="text-uppercase">Why Choose Us?</h1>
        </div>
        <div class="container">
            <div class="box" data-aos="flip-up">
                <div class="text">
                    <h1 id="text-uppercase">100% guarantee</h1>
                    <p>We have the friendliest and most dedicated<br>
                        customer support who stay online 24/7 to<br>
                        help you with your needs.
                    </p>
                    <a href="">read more<i class="fi fi-rr-arrow-right"></i></a>
                </div>
            </div>

            <div class="box" data-aos="flip-up">
                <div class="text">
                    <h1 id="text-uppercase">24/7 Support</h1>
                    <p>We only sell 100% genuine products, which are<br>
                        supplied directly by manufacturers andvback by<br>
                        returning within 7 days of purchase Winscart.
                    </p>
                    <a href="">read more<i class="fi fi-rr-arrow-right"></i></a>
                </div>
            </div>

            <div class="box" data-aos="flip-up">
                <div class="text">
                    <h1 id="text-uppercase">UAE-based shipping</h1>
                    <p>is available for all orders! At no additional<br>
                        charge, our Customer Services team will arrange<br>
                        for your parcel to be delivered on a specific day.
                    </p>
                    <a href="">read more<i class="fi fi-rr-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-----------Service Area-------->

    <!-----------Brands  Area-------->
    <section class="bra" id="bra">
        <div class="container">
            <img src="{{ URL::asset('front/img/brand1.png') }}" alt="">
            <img src="{{ URL::asset('front/img/brand2.png') }}" alt="">
            <img src="{{ URL::asset('front/img/brand3.png') }}" alt="">
            <img src="{{ URL::asset('front/img/brand4.png') }}" alt="">
            <img src="{{ URL::asset('front/img/brand5.png') }}" alt="">
        </div>
    </section>
    <!-----------Brands  Area-------->

    <!-------- TestimonialArea ------>
    <section class="tes" id="tes">
        <div class="heading">
            <h1 id="text-uppercase">what our customer says</h1>
        </div>
        <div class="swiper all-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide box" data-aos="flip-down">
                    <div class="image">
                        <img src="{{ URL::asset('front/img/t1.jpg') }}" alt="">
                    </div>
                    <div class="text">
                        <div class="data">
                            <h5>Gloria C. Hall</h5>
                            <p> Crafted from the finest materials, it served as a symbol of prestige<br>
                                and significance making it a prized possession in the world of</p>
                            <div class="star">
                                <i class="fi fi-ss-star"></i>
                                <i class="fi fi-ss-star"></i>
                                <i class="fi fi-ss-star"></i>
                                <i class="fi fi-ss-star"></i>
                                <i class="fi fi-ss-star"></i>
                                <span>5.0</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide box" data-aos="flip-up">
                    <div class="image">
                        <img src="{{ URL::asset('front/img/t2.jpg') }}" alt="">
                    </div>
                    <div class="text">
                        <div class="data">
                            <h5>Nancy G. Kirby</h5>
                            <p> Crafted from the finest materials, it served as a symbol of prestige<br>
                                and significance making it a prized possession in the world of</p>
                            <div class="star">
                                <i class="fi fi-ss-star"></i>
                                <i class="fi fi-ss-star"></i>
                                <i class="fi fi-ss-star"></i>
                                <i class="fi fi-ss-star"></i>
                                <i class="fi fi-ss-star"></i>
                                <span>5.0</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide box" data-aos="flip-up">
                    <div class="image">
                        <img src="{{ URL::asset('front/img/t3.jpg') }}" alt="">
                    </div>
                    <div class="text">
                        <div class="data">
                            <h5>Mickey T. Mills</h5>
                            <p> Crafted from the finest materials, it served as a symbol of prestige<br>
                                and significance making it a prized possession in the world of</p>
                            <div class="star">
                                <i class="fi fi-ss-star"></i>
                                <i class="fi fi-ss-star"></i>
                                <i class="fi fi-ss-star"></i>
                                <i class="fi fi-ss-star"></i>
                                <i class="fi fi-ss-star"></i>
                                <span>5.0</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!------- TestimonialArea ------>

    <!------- Banner Areas --------->
    <section class="blueban" id="blueban">
        <img src="{{ URL::asset('front/img/offer.png') }}" alt="" data-aos="fade-right">
    </section>
    <!------- Banner Areas --------->
@endsection
