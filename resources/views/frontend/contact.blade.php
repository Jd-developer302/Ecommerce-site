@extends('frontend.layout.master')

@section('content')
    <!---------- contact us  Area ----->
    <section class="contact" id="contact">
        <style>
            .search{
                display:none;
            }
        </style>
        <div class="heading">
            <h1>YOUR CONTACT DETAILS</h1>
        </div>
        <div class="container">
            <div class="left-data">
                <div class="icon">
                    <i class="fi fi-ss-marker"></i>
                    <div class="text">
                        <h5>Address</h5>
                        <p>NAS Electronic General a<br>
                            Trading LLC-Sharjah-UAE<br>
                            Yaser Bin Ammar St - Al<br>
                            Qasimia - Al Nud - Sharjah</p>
                    </div>
                </div>
                <div class="icon">
                    <i class="fi fi-sr-circle-phone-flip"></i>
                    <div class="text">
                        <h5>phone</h5>
                        <p>058 658 3113</p>
                    </div>
                </div>
                <div class="icon">
                    <i class="fi fi-sr-envelope"></i>
                    <div class="text">
                        <h5>email</h5>
                        <p>info@winscart.com</p>
                    </div>
                </div>


            </div>

            <div class="right-data">
                <div class="form">
                    <div class="data-input">
                        <div class="input">
                            <input type="name" placeholder="FIRST NAME">
                        </div>
                        <div class="input">
                            <input type="email" placeholder="EMAIL">
                        </div>
                    </div>

                    <div class="data-input">
                        <div class="input">
                            <input type="password" placeholder="PASSWORD">
                        </div>
                        <div class="input">
                            <input type="phone" placeholder="PHONE">
                        </div>
                    </div>

                    <textarea name="message" id="message" placeholder="MESSAGE"></textarea>

                    <button>submit</button>

                </div>
            </div>
        </div>
    </section>
    <!---------- contact us  Area ----->

















    <!---------- Maps  Area ----->
    <section class="map" id="map">
        <div class="container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3605.80663850776!2d55.38899557611973!3d25.34426872572677!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f5d61f759fefb%3A0x3dda6f86e7d1f82e!2sWinsCart-UAE!5e0!3m2!1sen!2s!4v1702382451269!5m2!1sen!2s"
                width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <!---------- Maps  Area ----->
@endsection
