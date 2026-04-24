@extends('frontend.layout.master')

@section('content')
    <section class="after-head top-block-page with-back white-curve-after section-white-text">
        <div class="overflow-back bg-orange" style="background-color: #ffffff!important;"></div>
        <div class="content-offs-stick my-5 container">
            <div class="section-solid with-back">
                <div class="full-block">
                    <div class="section-back-text">Contact</div>
                    <!--  <img class="d-none d-lg-block z-index-3" src="assets/images/content/x/mandarin.png" alt="" data-size="280px" data-at="10%;bottom 35%">
                            <img class="d-none d-lg-block z-index-3" src="assets/images/content/x/kiwi-blur.png" alt="" data-size="137px" data-at="right 5%;35%"> -->

                </div>
                <div class="z-index-4 position-relative text-center">
                    <h1 class="section-title">&nbsp;</h1>
                    {{-- <div class="mt-3">
                        <div class="page-breadcrumbs">
                            <a class="content-link" href="">Home</a>

                            <span class="mx-2">\</span>
                            <span>Contact</span>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    <section class="section contact">
        <div class="section-head">
            <div class="section-icon">
                <span class="svg-fill-jazzberry-jam svg-content" data-svg="assets/images/svg/title-rasberry.svg"></span>
            </div>
            <div class="section-head-content">
                <h2 class="section-title">Have something to say?</h2>
                <p class="section-text">Here is the place</p>
            </div>
        </div>
        @if (Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif
        <div class="container contactform">
            <form method="post" action="{{ route('contact.post') }}">
                @csrf
                <div class="row grid justify-content-center">
                    <div class="col-12 col-sm-6 col-lg-6 col-xl-6">
                        <div class="input-view-flat input-gray-shadow form-group">
                            <label class="required">Your Name</label>
                            <div class="input-group" style="display: block;">
                                <input class="form-control" name="name" type="text" placeholder="Name"
                                    required="required">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-6 col-xl-6">
                        <div class="input-view-flat input-gray-shadow form-group">
                            <label class="required">Your Email</label>
                            <div class="input-group" style="display: block;">
                                <input class="form-control" name="email" type="email" placeholder="Email"
                                    required="required">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row grid justify-content-center">
                    <div class="col-12 col-lg-20 col-xl-12">
                        <div class="input-view-flat input-gray-shadow form-group">
                            <label class="required">Your Message</label>
                            <div class="input-group" style="display: block;">
                                <textarea class="form-control" name="message" placeholder="Message"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row grid justify-content-center">
                    <div class="col-12">
                        <button class="btn-wide mb-0 btn btn-theme send-msg" type="submit" style="margin-top: 5px;">send
                            message</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <section class="section-solid-map white-curve-before curve-before-60 white-curve-after curve-after-90">

        <div class="section-map-container container">
            <div class="text-center grid row">
                <div class="col-md-4">
                    <h4 class="entity-title">Address</h4>
                    <p class="mb-0 entity-subtext">Saif Belhasa Warehouse,</p><p class="entity-subtext">Industrial Area 18 ,</p><p class="mb-0 entity-subtext">Sharjah ,UAE</p>
                </div>
                <div class="col-md-4">
                    <h4 class="entity-title">Email</h4>
                    <p class="mb-0 entity-subtext">
                        support@proximaenergyme.com
                    </p>
                </div>
                <div class="col-md-4">
                    <h4 class="entity-title">Support</h4>
                    <p class="mb-0 entity-subtext">+971565791033</p>
                </div>
            </div>
        </div>
    </section>
@endsection
