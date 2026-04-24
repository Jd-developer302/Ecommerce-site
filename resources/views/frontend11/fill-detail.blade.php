<style>
    .contactform .row.grid.justify-content-center {
        width: 100% !important;
        margin: 0 auto;
    }

    .input-radio-grp {
        display: flex;
        justify-content: flex-start;
        gap: 10px;
        border: 1px solid #80808036;
        padding: 9px;
    }

    .input-radio-grp label {
        margin: 0;
        padding-left: 45px;
        font-size: 16px;
    }

    .input-radio-grp:first-child {
        border-bottom: 0
    }

    .delivery {
        padding: 15px 0 0;
    }

    .containers-radio {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 22px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Hide the browser's default radio button */
    .containers-radio input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    /* Create a custom radio button */

    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 25px !important;
        width: 25px !important;
        background-color: #ffff !important;
        border-radius: 50%;
        box-shadow: 0px 0px 7px 1px #8080801f !important;
        border: 1px solid #8080801f;
    }

    /* On mouse-over, add a grey background color */
    .containers-radio:hover input~.checkmark {
        background-color: #ccc;
    }

    /* When the radio button is checked, add a blue background */
    .containers-radio input:checked~.checkmark {
        background-color: #ffffff;
    }

    /* Create the indicator (the dot/circle - hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the indicator (dot/circle) when checked */
    .containers-radio input:checked~.checkmark:after {
        display: block;
    }

    /* Style the indicator (dot/circle) */
    .containers-radio .checkmark:after {
        top: 50%;
        left: 50%;
        width: 15px;
        height: 15px;
        border-radius: 50%;
        background: #C80000;
        transform: translate(-50%, -50%);
    }

    .delivery-title {
        font-size: 20px;
        font-family: "Poppins";
    }

    .coupon-bg {
        background-color: #f5f6f9;
        border-radius: 10px;
    }

    .right-area-coupon {
        padding: 15px 15px 42px;
    }

    .order-subtotal+.order-subtotal {
        padding-top: 16px !important;
    }

    .input-view-flat.input-gray-shadow.input-group input {
        border-radius: 30px;
        padding: 17px;
    }

    form.coupon-code input[type=text] {
        background-color: white;
        padding: 22px 25px;
    }

    form.coupon-code button {
        background: #C80000;
        font-size: 15px;
        padding: 10px 15px;
    }
</style>@extends('frontend.layout.master')

@section('content')
    <section class="after-head top-block-page with-back white-curve-after section-white-text">
        <div class="overflow-back bg-orange" style="background-color: #ffffff!important;"></div>
        <div class="content-offs-stick my-5 container">
            <div class="section-solid with-back">
                <div class="full-block">
                    {{-- <div class="section-back-text">Shop</div> --}}
                    <!--  <img class="d-none d-lg-block z-index-3" src="assets/images/content/x/mandarin.png" alt="" data-size="280px" data-at="10%;bottom 35%">
                                                                                                                                                                                            <img class="d-none d-lg-block z-index-3" src="assets/images/content/x/kiwi-blur.png" alt="" data-size="137px" data-at="right 5%;35%"> -->

                </div>
                <div class="z-index-4 position-relative text-center">
                    <h1 class="section-title">Purchase</h1>
                    {{-- <div class="mt-3">
                        <div class="page-breadcrumbs">
                            <a class="content-link" href="">Home</a>
                            <span class="mx-2">\</span>
                            <span>Fill Details</span>
                        </div>
                    </div> --}}
                </div>

            </div>
        </div>

    </section>
    <div class="container contactform">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 ">

                <form autocomplete="off" method="post" action="{{ route('fill-detail.post') }}">
                    @csrf
                    <div class="row grid justify-content-center">
                        <div class="col-12 col-sm-12 col-lg-12 col-xl-6">
                            <h3 class="delivery-title">Delivery Method</h3>
                            <div class="delivery">
                                <div class="input-radio-grp">
                                    <label class="containers-radio">Ship
                                        <input type="radio" value="ship"
                                            @if (empty($details->delivery_type)) :
                                            checked="checked" @endif;
                                            @if (isset($details->delivery_type)) @if ($details->delivery_type == 'ship') checked="checked" @endif
                                            @endif
                                        name="delivery_type">
                                        <span class="checkmark"></span>
                                    </label>
                                    {{-- <span class="text-danger" style="float: right">AED 25</span> --}}
                                </div>
                                <div class="input-radio-grp">
                                    <label class="containers-radio">Pickup
                                        <input type="radio" value="pickup"
                                            @if (isset($details->delivery_type)) @if ($details->delivery_type == 'pickup') checked="checked" @endif
                                            @endif name="delivery_type">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-lg-12 col-xl-6">
                            <h3 class="delivery-title">Shipping Address </h3>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-6 col-xl-6">

                            <div class="input-view-flat input-gray-shadow form-group">
                                <label class="required1">Name<span class="text-danger">*</span></label>
                                <div class="input-group" style="display: block;">
                                    <input class="form-control" name="name" type="text" placeholder="Name"
                                        value="{{ $details->name ?? '' }}" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-6 col-xl-6">
                            <div class="input-view-flat input-gray-shadow form-group">
                                <label class="required1">Your Company</label>
                                <div class="input-group" style="display: block;">
                                    <input class="form-control" name="company_name" type="text"
                                        placeholder="Company Name" value="{{ $details->company_name ?? '' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row grid justify-content-center">
                        <div class="col-12 col-sm-6 col-lg-6 col-xl-6">
                            <div class="input-view-flat input-gray-shadow form-group">
                                <label class="required1">Company Address</label>
                                <div class="input-group" style="display: block;">
                                    <input class="form-control" name="company_address" type="text"
                                        placeholder="Company Address" value="{{ $details->company_address ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-6 col-xl-6">
                            <div class="input-view-flat input-gray-shadow form-group">
                                <label class="required1">Email<span class="text-danger">*</span></label>
                                <div class="input-group" style="display: block;">
                                    <input class="form-control" name="email" type="email" placeholder="Email"
                                        value="{{ $details->email ?? '' }}" required="required">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row grid justify-content-center">
                        <div class="col-12 col-sm-6 col-lg-6 col-xl-6">
                            <div class="input-view-flat input-gray-shadow form-group">
                                <label class="required1">Phone Number<span class="text-danger">*</span></label>
                                <div class="input-group" style="display: block;">
                                    <input class="form-control" name="phone" type="number" placeholder="Phone"
                                        value="{{ $details->phone ?? '' }}" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-6 col-xl-6">
                            <div class="input-view-flat input-gray-shadow form-group">
                                <label class="required1">Your City<span class="text-danger">*</span></label>
                                <div class="input-group" style="display: block;">
                                    <input class="form-control" name="city" type="text" placeholder="City"
                                        value="{{ $details->city ?? '' }}" required="required">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row grid justify-content-center">
                        <div class="col-12 col-lg-20 col-xl-6">
                            <div class="input-view-flat input-gray-shadow form-group">
                                <label class="required1">Country</label>
                                <div class="input-group" style="display: block;">
                                    <select class="form-control" id="country" name="country" placeholder="Country">
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Afghanistan') : selected @endif;
                                            @endif; value="Afghanistan">
                                            Afghanistan</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Albania') : selected @endif;
                                            @endif; value="Albania">
                                            Albania
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Algeria') : selected @endif;
                                            @endif; value="Algeria">
                                            Algeria
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'American Samoa') : selected @endif;
                                            @endif;
                                            value="American Samoa">
                                            American Samoa</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Andorra') : selected @endif;
                                            @endif; value="Andorra">
                                            Andorra
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Angola') : selected @endif;
                                            @endif; value="Angola">Angola
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Anguilla') : selected @endif;
                                            @endif; value="Anguilla">
                                            Anguilla
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Antartica') : selected @endif;
                                            @endif; value="Antartica">
                                            Antarctica</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Antigua and Barbuda') : selected @endif;
                                            @endif;
                                            value="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Argentina') : selected @endif;
                                            @endif; value="Argentina">
                                            Argentina</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Armenia') : selected @endif;
                                            @endif; value="Armenia">
                                            Armenia
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Aruba') : selected @endif;
                                            @endif; value="Aruba">Aruba
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Australia') : selected @endif;
                                            @endif; value="Australia">
                                            Australia</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Austria') : selected @endif;
                                            @endif; value="Austria">
                                            Austria
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Azerbaijan') : selected @endif;
                                            @endif; value="Azerbaijan">
                                            Azerbaijan</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Bahamas') : selected @endif;
                                            @endif; value="Bahamas">
                                            Bahamas
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Bahrain') : selected @endif;
                                            @endif; value="Bahrain">
                                            Bahrain
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Bangladesh') : selected @endif;
                                            @endif; value="Bangladesh">
                                            Bangladesh</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Barbados') : selected @endif;
                                            @endif; value="Barbados">
                                            Barbados</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Belarus') : selected @endif;
                                            @endif; value="Belarus">
                                            Belarus
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Belgium') : selected @endif;
                                            @endif; value="Belgium">
                                            Belgium
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Belize') : selected @endif;
                                            @endif; value="Belize">Belize
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Benin') : selected @endif;
                                            @endif; value="Benin">Benin
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Bermuda') : selected @endif;
                                            @endif; value="Bermuda">
                                            Bermuda
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Bhutan') : selected @endif;
                                            @endif; value="Bhutan">Bhutan
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Bolivia') : selected @endif;
                                            @endif; value="Bolivia">
                                            Bolivia
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Bosnia and Herzegowina') : selected @endif;
                                            @endif;
                                            value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Botswana') : selected @endif;
                                            @endif; value="Botswana">
                                            Botswana</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Bouvet Island') : selected @endif;
                                            @endif;
                                            value="Bouvet Island">
                                            Bouvet Island</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Brazil') : selected @endif;
                                            @endif; value="Brazil">Brazil
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'British Indian Ocean Territory') : selected @endif;
                                            @endif;
                                            value="British Indian Ocean Territory">British Indian Ocean Territory
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Brunei Darussalam') : selected @endif;
                                            @endif;
                                            value="Brunei Darussalam">Brunei Darussalam</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Bulgaria') : selected @endif;
                                            @endif; value="Bulgaria">
                                            Bulgaria</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Burkina Faso') : selected @endif;
                                            @endif; value="Burkina Faso">
                                            Burkina Faso</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Burundi') : selected @endif;
                                            @endif; value="Burundi">
                                            Burundi
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Cambodia') : selected @endif;
                                            @endif; value="Cambodia">
                                            Cambodia</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Cameroon') : selected @endif;
                                            @endif; value="Cameroon">
                                            Cameroon</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Canada') : selected @endif;
                                            @endif; value="Canada">Canada
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Cape Verde') : selected @endif;
                                            @endif; value="Cape Verde">
                                            Cape
                                            Verde</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Cayman Islands') : selected @endif;
                                            @endif;
                                            value="Cayman Islands">
                                            Cayman Islands</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Central African Republic') : selected @endif;
                                            @endif;
                                            value="Central African Republic">Central African Republic</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Chad') : selected @endif;
                                            @endif; value="Chad">Chad
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Chile') : selected @endif;
                                            @endif; value="Chile">Chile
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'China') : selected @endif;
                                            @endif; value="China">China
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Christmas Island') : selected @endif;
                                            @endif;
                                            value="Christmas Island">Christmas Island</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Cocos Islands') : selected @endif;
                                            @endif;
                                            value="Cocos Islands">
                                            Cocos (Keeling) Islands</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Colombia') : selected @endif;
                                            @endif; value="Colombia">
                                            Colombia</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Comoros') : selected @endif;
                                            @endif; value="Comoros">
                                            Comoros
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Congo') : selected @endif;
                                            @endif; value="Congo">Congo
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Congo') : selected @endif;
                                            @endif; value="Congo">Congo,
                                            the Democratic Republic of the</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Cook Islands') : selected @endif;
                                            @endif; value="Cook Islands">
                                            Cook Islands</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Costa Rica') : selected @endif;
                                            @endif; value="Costa Rica">
                                            Costa Rica</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Cota D Ivoire') : selected @endif;
                                            @endif;
                                            value="Cota D Ivoire">
                                            Cote d'Ivoire</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Croatia') : selected @endif;
                                            @endif; value="Croatia">
                                            Croatia
                                            (Hrvatska)</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Cuba') : selected @endif;
                                            @endif; value="Cuba">Cuba
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Cyprus') : selected @endif;
                                            @endif; value="Cyprus">Cyprus
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Czech Republic') : selected @endif;
                                            @endif;
                                            value="Czech Republic">
                                            Czech Republic</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Denmark') : selected @endif;
                                            @endif; value="Denmark">
                                            Denmark
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Djibouti') : selected @endif;
                                            @endif; value="Djibouti">
                                            Djibouti</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Dominica') : selected @endif;
                                            @endif; value="Dominica">
                                            Dominica</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Dominican Republic') : selected @endif;
                                            @endif;
                                            value="Dominican Republic">Dominican Republic</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'East Timor') : selected @endif;
                                            @endif; value="East Timor">
                                            East
                                            Timor</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Ecuador') : selected @endif;
                                            @endif; value="Ecuador">
                                            Ecuador
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Egypt') : selected @endif;
                                            @endif; value="Egypt">Egypt
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'El Salvador') : selected @endif;
                                            @endif; value="El Salvador">
                                            El
                                            Salvador</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Afghanistan') : selected @endif;
                                            @endif;
                                            value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Afghanistan') : selected @endif;
                                            @endif; value="Eritrea">
                                            Eritrea
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Estonia') : selected @endif;
                                            @endif; value="Estonia">
                                            Estonia
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Ethiopia') : selected @endif;
                                            @endif; value="Ethiopia">
                                            Ethiopia</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == ' Islands (Malvinas)') : selected @endif;
                                            @endif;
                                            value="Falkland Islands">Falkland Islands (Malvinas)</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Faroe Islands') : selected @endif;
                                            @endif;
                                            value="Faroe Islands">
                                            Faroe Islands</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Fiji') : selected @endif;
                                            @endif; value="Fiji">Fiji
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Finland') : selected @endif;
                                            @endif; value="Finland">
                                            Finland
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'France') : selected @endif;
                                            @endif; value="France">France
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'France, Metropolitan') : selected @endif;
                                            @endif;
                                            value="France Metropolitan">France, Metropolitan</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'French Guiana') : selected @endif;
                                            @endif;
                                            value="French Guiana">
                                            French Guiana</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'French Polynesia') : selected @endif;
                                            @endif;
                                            value="French Polynesia">French Polynesia</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'French Southern Territories') : selected @endif;
                                            @endif;
                                            value="French Southern Territories">French Southern Territories</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Afghanistan') : selected @endif;
                                            @endif; value="Gabon">Gabon
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Gabon') : selected @endif;
                                            @endif; value="Gambia">Gambia
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Georgia') : selected @endif;
                                            @endif; value="Georgia">
                                            Georgia
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Germany') : selected @endif;
                                            @endif; value="Germany">
                                            Germany
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Ghana') : selected @endif;
                                            @endif; value="Ghana">Ghana
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Gibraltar') : selected @endif;
                                            @endif; value="Gibraltar">
                                            Gibraltar</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Greece') : selected @endif;
                                            @endif; value="Greece">Greece
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Greenland') : selected @endif;
                                            @endif; value="Greenland">
                                            Greenland</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Grenada') : selected @endif;
                                            @endif; value="Grenada">
                                            Grenada
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Guadeloupe') : selected @endif;
                                            @endif; value="Guadeloupe">
                                            Guadeloupe</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Guam') : selected @endif;
                                            @endif; value="Guam">Guam
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Guatemala') : selected @endif;
                                            @endif; value="Guatemala">
                                            Guatemala</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Guinea') : selected @endif;
                                            @endif; value="Guinea">Guinea
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Guinea-Bissau') : selected @endif;
                                            @endif;
                                            value="Guinea-Bissau">
                                            Guinea-Bissau</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Guyana') : selected @endif;
                                            @endif; value="Guyana">Guyana
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Haiti') : selected @endif;
                                            @endif; value="Haiti">Haiti
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country ==
                                                'Holy
                                                                                                                                                                                                                                                                                                        See (Vatican City State)') : selected @endif;
                                            @endif;
                                            value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Vatican City State') : selected @endif;
                                            @endif; value="Holy See">Holy
                                            See (Vatican City State)</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Honduras') : selected @endif;
                                            @endif; value="Honduras">
                                            Honduras</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Hong Kong') : selected @endif;
                                            @endif; value="Hong Kong">
                                            Hong
                                            Kong</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Hungary') : selected @endif;
                                            @endif; value="Hungary">
                                            Hungary
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Iceland') : selected @endif;
                                            @endif; value="Iceland">
                                            Iceland
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'India') : selected @endif;
                                            @endif; value="India">India
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Indonesia') : selected @endif;
                                            @endif; value="Indonesia">
                                            Indonesia</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Iran') : selected @endif;
                                            @endif; value="Iran">Iran
                                            (Islamic Republic of)</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Iraq') : selected @endif;
                                            @endif; value="Iraq">Iraq
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Ireland') : selected @endif;
                                            @endif; value="Ireland">
                                            Ireland</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Israel') : selected @endif;
                                            @endif; value="Israel">Israel
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Italy') : selected @endif;
                                            @endif; value="Italy">Italy
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Jamaica') : selected @endif;
                                            @endif; value="Jamaica">
                                            Jamaica</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Japan') : selected @endif;
                                            @endif; value="Japan">Japan
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Jordan') : selected @endif;
                                            @endif; value="Jordan">Jordan
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Kazakhstan') : selected @endif;
                                            @endif; value="Kazakhstan">
                                            Kazakhstan</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Kenya') : selected @endif;
                                            @endif; value="Kenya">Kenya
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Kiribati') : selected @endif;
                                            @endif; value="Kiribati">
                                            Kiribati</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country ==
                                                'Democratic Peoples
                                                                                                                                                                                                                                                                                                        Republic of') : selected @endif;
                                            @endif;
                                            value="Democratic Peoples Republic of Korea">Korea, Democratic People's
                                            Republic of</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Korea') : selected @endif;
                                            @endif; value="Korea">Korea,
                                            Republic of</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Kuwait') : selected @endif;
                                            @endif; value="Kuwait">Kuwait
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Kyrgyzstan') : selected @endif;
                                            @endif; value="Kyrgyzstan">
                                            Kyrgyzstan</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Lao') : selected @endif;
                                            @endif; value="Lao">Lao
                                            People's Democratic Republic</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Latvia') : selected @endif;
                                            @endif; value="Latvia">Latvia
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Lebanon') : selected @endif;
                                            @endif; value="Lebanon">
                                            Lebanon</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Lesotho') : selected @endif;
                                            @endif; value="Lesotho">
                                            Lesotho</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Liberia') : selected @endif;
                                            @endif; value="Liberia">
                                            Liberia</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Libyan Arab Jamahiriya') : selected @endif;
                                            @endif;
                                            value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Liechtenstein') : selected @endif;
                                            @endif;
                                            value="Liechtenstein">Liechtenstein</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Lithuania') : selected @endif;
                                            @endif; value="Lithuania">
                                            Lithuania</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Luxembourg') : selected @endif;
                                            @endif; value="Luxembourg">
                                            Luxembourg</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Macau') : selected @endif;
                                            @endif; value="Macau">Macau
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Macedonia') : selected @endif;
                                            @endif; value="Macedonia">
                                            Macedonia, The Former Yugoslav Republic of</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Madagascar') : selected @endif;
                                            @endif; value="Madagascar">
                                            Madagascar</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Malawi') : selected @endif;
                                            @endif; value="Malawi">Malawi
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Malaysia') : selected @endif;
                                            @endif; value="Malaysia">
                                            Malaysia</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Maldives') : selected @endif;
                                            @endif; value="Maldives">
                                            Maldives</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Mali') : selected @endif;
                                            @endif; value="Mali">Mali
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Malta') : selected @endif;
                                            @endif; value="Malta">Malta
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Marshall Islands') : selected @endif;
                                            @endif;
                                            value="Marshall Islands">Marshall Islands</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Martinique') : selected @endif;
                                            @endif; value="Martinique">
                                            Martinique</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Mauritania') : selected @endif;
                                            @endif; value="Mauritania">
                                            Mauritania</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Mauritius') : selected @endif;
                                            @endif; value="Mauritius">
                                            Mauritius</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Mayotte') : selected @endif;
                                            @endif; value="Mayotte">
                                            Mayotte</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Mexico') : selected @endif;
                                            @endif; value="Mexico">Mexico
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Micronesia') : selected @endif;
                                            @endif; value="Micronesia">
                                            Micronesia, Federated States of</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Moldova') : selected @endif;
                                            @endif; value="Moldova">
                                            Moldova, Republic of</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Monaco') : selected @endif;
                                            @endif; value="Monaco">Monaco
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Mongolia') : selected @endif;
                                            @endif; value="Mongolia">
                                            Mongolia</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Montserrat') : selected @endif;
                                            @endif; value="Montserrat">
                                            Montserrat</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Morocco') : selected @endif;
                                            @endif; value="Morocco">
                                            Morocco</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Mozambique') : selected @endif;
                                            @endif; value="Mozambique">
                                            Mozambique</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Myanmar') : selected @endif;
                                            @endif; value="Myanmar">
                                            Myanmar</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Namibia') : selected @endif;
                                            @endif; value="Namibia">
                                            Namibia</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Nauru') : selected @endif;
                                            @endif; value="Nauru">Nauru
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Nepal') : selected @endif;
                                            @endif; value="Nepal">Nepal
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Netherlands') : selected @endif;
                                            @endif; value="Netherlands">
                                            Netherlands</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Netherlands Antilles') : selected @endif;
                                            @endif;
                                            value="Netherlands Antilles">Netherlands Antilles</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'New Caledonia') : selected @endif;
                                            @endif;
                                            value="New Caledonia">New Caledonia</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'New Zealand') : selected @endif;
                                            @endif; value="New Zealand">
                                            New Zealand</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Nicaragua') : selected @endif;
                                            @endif; value="Nicaragua">
                                            Nicaragua</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Niger') : selected @endif;
                                            @endif; value="Niger">Niger
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Nigeria') : selected @endif;
                                            @endif; value="Nigeria">
                                            Nigeria</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Niue') : selected @endif;
                                            @endif; value="Niue">Niue
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Norfolk Island') : selected @endif;
                                            @endif;
                                            value="Norfolk Island">Norfolk Island</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Northern Mariana Islands') : selected @endif;
                                            @endif;
                                            value="Northern Mariana Islands">Northern Mariana Islands</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Norway') : selected @endif;
                                            @endif; value="Norway">Norway
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Oman') : selected @endif;
                                            @endif; value="Oman">Oman
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Pakistan') : selected @endif;
                                            @endif; value="Pakistan">
                                            Pakistan</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Palau') : selected @endif;
                                            @endif; value="Palau">Palau
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Panama') : selected @endif;
                                            @endif; value="Panama">Panama
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Papua New Guinea') : selected @endif;
                                            @endif;
                                            value="Papua New Guinea">Papua New Guinea</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Paraguay') : selected @endif;
                                            @endif; value="Paraguay">
                                            Paraguay</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Peru') : selected @endif;
                                            @endif; value="Peru">Peru
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Philippines') : selected @endif;
                                            @endif; value="Philippines">
                                            Philippines</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Pitcairn') : selected @endif;
                                            @endif; value="Pitcairn">
                                            Pitcairn</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Poland') : selected @endif;
                                            @endif; value="Poland">Poland
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Portugal') : selected @endif;
                                            @endif; value="Portugal">
                                            Portugal</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Puerto Rico') : selected @endif;
                                            @endif; value="Puerto Rico">
                                            Puerto Rico</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Qatar') : selected @endif;
                                            @endif; value="Qatar">Qatar
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Reunion') : selected @endif;
                                            @endif; value="Reunion">
                                            Reunion</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Romania') : selected @endif;
                                            @endif; value="Romania">
                                            Romania</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Russia') : selected @endif;
                                            @endif; value="Russia">
                                            Russian Federation</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Rwanda') : selected @endif;
                                            @endif; value="Rwanda">Rwanda
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Saint Kitts and Nevis') : selected @endif;
                                            @endif;
                                            value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Saint LUCIA') : selected @endif;
                                            @endif; value="Saint LUCIA">
                                            Saint LUCIA</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Saint Vincent') : selected @endif;
                                            @endif;
                                            value="Saint Vincent">Saint Vincent and the Grenadines</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Samoa') : selected @endif;
                                            @endif; value="Samoa">Samoa
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'San Marino') : selected @endif;
                                            @endif; value="San Marino">
                                            San Marino</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Sao Tome and Principe') : selected @endif;
                                            @endif;
                                            value="Sao Tome and Principe">Sao Tome and Principe</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Saudi Arabia') : selected @endif;
                                            @endif; value="Saudi Arabia">
                                            Saudi Arabia</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Senegal') : selected @endif;
                                            @endif; value="Senegal">
                                            Senegal</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Seychelles') : selected @endif;
                                            @endif; value="Seychelles">
                                            Seychelles</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Sierra') : selected @endif;
                                            @endif; value="Sierra">Sierra
                                            Leone</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Singapore') : selected @endif;
                                            @endif; value="Singapore">
                                            Singapore</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Slovakia') : selected @endif;
                                            @endif; value="Slovakia">
                                            Slovakia (Slovak Republic)</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Slovenia') : selected @endif;
                                            @endif; value="Slovenia">
                                            Slovenia</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Solomon Islands') : selected @endif;
                                            @endif;
                                            value="Solomon Islands">Solomon Islands</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Somalia') : selected @endif;
                                            @endif; value="Somalia">
                                            Somalia</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'South Africa') : selected @endif;
                                            @endif; value="South Africa">
                                            South Africa</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'South Georgia') : selected @endif;
                                            @endif;
                                            value="South Georgia">South Georgia and the South Sandwich Islands</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Spain') : selected @endif;
                                            @endif; value="Spain">Spain
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'SriLanka') : selected @endif;
                                            @endif; value="SriLanka">Sri
                                            Lanka</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Helena') : selected @endif;
                                            @endif; value="St. Helena">
                                            St. Helena</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'St. Pierre and Miguelon') : selected @endif;
                                            @endif;
                                            value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Sudan') : selected @endif;
                                            @endif; value="Sudan">Sudan
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Suriname') : selected @endif;
                                            @endif; value="Suriname">
                                            Suriname</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Svalbard') : selected @endif;
                                            @endif; value="Svalbard">
                                            Svalbard and Jan Mayen Islands</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Swaziland') : selected @endif;
                                            @endif; value="Swaziland">
                                            Swaziland</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Sweden') : selected @endif;
                                            @endif; value="Sweden">Sweden
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Switzerland') : selected @endif;
                                            @endif; value="Switzerland">
                                            Switzerland</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Syrian') : selected @endif;
                                            @endif; value="Syria">Syrian
                                            Arab Republic</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Taiwan') : selected @endif;
                                            @endif; value="Taiwan">
                                            Taiwan, Province of China</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Tajikistan') : selected @endif;
                                            @endif; value="Tajikistan">
                                            Tajikistan</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Tanzania') : selected @endif;
                                            @endif; value="Tanzania">
                                            Tanzania, United Republic of</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Thailand') : selected @endif;
                                            @endif; value="Thailand">
                                            Thailand</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Togo') : selected @endif;
                                            @endif; value="Togo">Togo
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Tokelau') : selected @endif;
                                            @endif; value="Tokelau">
                                            Tokelau</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Tonga') : selected @endif;
                                            @endif; value="Tonga">Tonga
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Trinidad and Tobago') : selected @endif;
                                            @endif;
                                            value="Trinidad and Tobago">Trinidad and Tobago</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Tunisia') : selected @endif;
                                            @endif; value="Tunisia">
                                            Tunisia</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Turkey') : selected @endif;
                                            @endif; value="Turkey">Turkey
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Turkmenistan') : selected @endif;
                                            @endif; value="Turkmenistan">
                                            Turkmenistan</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Turks and Caicos Islands') : selected @endif;
                                            @endif;
                                            value="Turks and Caicos">Turks and Caicos Islands</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Tuvalu') : selected @endif;
                                            @endif; value="Tuvalu">Tuvalu
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Uganda') : selected @endif;
                                            @endif; value="Uganda">Uganda
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Ukraine') : selected @endif;
                                            @endif; value="Ukraine">
                                            Ukraine</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'United Arab Emirates') : selected @endif;
                                            @endif;
                                            value="United Arab Emirates">United Arab Emirates</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'United Kingdom') : selected @endif;
                                            @endif;
                                            value="United Kingdom">United Kingdom</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'United States') : selected @endif;
                                            @endif;
                                            value="United States">United States</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'United States Minor Outlying Islands') : selected @endif;
                                            @endif;
                                            value="United States Minor Outlying Islands">United States Minor Outlying
                                            Islands</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Uruguay') : selected @endif;
                                            @endif; value="Uruguay">
                                            Uruguay</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Uzbekistan') : selected @endif;
                                            @endif; value="Uzbekistan">
                                            Uzbekistan</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Vanuatu') : selected @endif;
                                            @endif; value="Vanuatu">
                                            Vanuatu</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Venezuela') : selected @endif;
                                            @endif; value="Venezuela">
                                            Venezuela</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Viet') : selected @endif;
                                            @endif; value="Vietnam">Viet
                                            Nam</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Virgin Islands (British)') : selected @endif;
                                            @endif;
                                            value="Virgin Islands (British)">Virgin Islands (British)</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Virgin Islands (U.S)') : selected @endif;
                                            @endif;
                                            value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Wallis and Futana Islands') : selected @endif;
                                            @endif;
                                            value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Western Sahara') : selected @endif;
                                            @endif;
                                            value="Western Sahara">Western Sahara</option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Yemen') : selected @endif;
                                            @endif; value="Yemen">Yemen
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Serbia') : selected @endif;
                                            @endif; value="Serbia">Serbia
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Zambia') : selected @endif;
                                            @endif; value="Zambia">Zambia
                                        </option>
                                        <option
                                            @if (isset($details->country)) : @if ($details->country == 'Zimbabwe') : selected @endif;
                                            @endif; value="Zimbabwe">
                                            Zimbabwe</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-20 col-xl-6">
                            <div class="input-view-flat input-gray-shadow form-group">
                                <label class="required1">TRN</label>
                                <div class="input-group" style="display: block;">
                                    <input type="text" class="form-control" name="trn" placeholder="TRN"
                                        value="{{ $details->trn ?? '' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row grid justify-content-center">
                        <div class="col-12 col-lg-20 col-xl-12">
                            <div class="input-view-flat input-gray-shadow form-group">
                                <label class="required1">Billing Address<span class="text-danger">*</span></label>
                                <div class="input-group" style="display: block;">
                                    <textarea class="form-control" name="address" placeholder="Address" required="required">{{ $details->address ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row grid justify-content-center">
                        <div class="col-12 col-lg-20 col-xl-12">
                            <div class="input-view-flat input-gray-shadow form-group">
                                <label class="required1">Delivery Address<span class="text-danger">*</span></label>
                                <div class="input-group" style="display: block;">
                                    <textarea class="form-control" name="delivery_address" placeholder="Delivery Address" required="required">{{ $details->delivery_address ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row grid justify-content-center">
                        <div class="col-12 col-lg-20 col-xl-12">
                            <div class="input-view-flat input-gray-shadow form-group">
                                <label class="required1">Note</label>
                                <div class="input-group" style="display: block;">
                                    <textarea class="form-control" name="notes" placeholder="Note">{{ $details->note ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <h6 class="country"><span class="text-danger">*</span><span class="text-danger">*</span>Shipping charges may apply.</h6>
                    <div class="row grid justify-content-center">
                        <div class="col-12">
                            <button class="btn-wide mb-0 btn btn-theme send-msg" type="submit"
                                style="margin-top: 5px;">Continue
                                to
                                checkout</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-1 col-lg-1 col-sm-12 col-xs-12"></div>
            <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12 coupon-bg ">
                <div class="right-area-coupon">
                    <div class="row grid">
                        <div class="col-12 col-sm-7 cl-lg-12 col-md-12" style="padding-left: 0;">
                            {{-- <form class="coupon-code" method="post" action="http://localhost:8000/search">
                                <input type="hidden" name="_token" value="">
                                <input type="text" placeholder="Enter Coupon Code.." name="search">
                                <button type="submit">Apply Coupon</button>

                            </form> --}}
                            <!-- <div class="input-view-flat input-gray-shadow input-group">
                                                                            <input class="form-control" name="text" type="text" placeholder="Enter Your Coupon Code Here!" required="required">
                                                                        </div> -->
                        </div>
                        <!-- <div class="col-12 col-sm-5">
                                                                        <button class="w-100 btn btn-theme-bordered" type="submit">apply coupon</button>
                                                                    </div> -->
                    </div>
                    <div class="order-items mb-5">

                        <div class="order-item order-subtotal">
                            <div class="order-line-title">Sub Total</div>
                            <div class="order-line-total">AED {{ $total_price }}</div>
                        </div>
                        <div class="order-subtotal dvtext">
                            <div class="order-line-title">Shipping</div>
                            <div class="order-line-total">AED {{ $courier }}</div>
                        </div>
                        <div class="separator-line"></div>
                        <div class="order-total dvttext">
                            <div class="order-line-title">Total</div>
                            <div class="order-line-total">AED {{ $total_price + $courier }}</div>
                        </div>
                        <div class="order-total dvvtext">
                            <div class="order-line-title">Total</div>
                            <div class="order-line-total">AED {{ $total_price }}</div>
                        </div>
                    </div>

                    <div class="container dvvtext">
                        <br>
                        <p style="color:gray">--------------------------------------------<p>
                        <h5>PICK UP Address:<h5>
                        <p>Saif Belhasa Warehouse,<br> Industrial Area 18,<br> Sharjah , UAE</p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <script>
             $('.dvvtext').hide();country
            $("input[type=radio]").on("change", function() {
                //check if radio is checked and value of checked one is `others
                var val = $(this).val();
                if (val == "ship") {
                    console.log(val);
                    $('.dvtext').show();
                    $('.dvttext').show();
                    $('.dvvtext').hide()
                } else {
                    $('dvtext').hide();
                    $('.dvvtext').show()
                    $('.dvtext').hide();
                    $('.dvttext').hide();
                }
            })
            $("#country").on("change", function() {
                var val1 = $(this).val();
                if (val1 == "United Arab Emirates") {
                    $('.country').hide();
                }else{
                    $('.country').show();
                }
                
            })
        </script>
    @endsection
