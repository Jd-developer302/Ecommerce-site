@extends('frontend.layout.master')

@section('content')
    <style>
        .container {
            padding: 20px;
        }

        .term {
            position: relative;
            display: inline-block;
            font-size: 1.2rem;
            font-weight: bold;
            color: #333;
            padding-bottom: 10px;
        }

        .term::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 2px;
            background-color: #F8A103;
        }
    </style>
    <section>
        <div class="container">
            <h1 class="term">Warranty and Return Policies</h1>
        </div>
        <div class="container">
            <div class="row">
                <p class="description">
                    Note - Replacement, Exchange or Refund policy is applicable only for the products which have technical
                    issues within warranty period. We can Replace, Exchange or Refund if the product is damaged but customer
                    needs to raise a complaint in our website within 24hrs from the delivery date. No refund or exchange
                    will be given if product has no issues like - damage or technical issues.
                </p>


                <p class="description"> Note- Any refund will be processed only for actual product price, delivery charges
                    and processing fee will not be refunded.
                </p>
            </div>
            <div class="row">
                <h4 class="intro">CUSTOMER SATISFACTION (STANDARD RETURN POLICY)</h4>
                <p>
                    Return for replacement or exchange with in: 7 days<br>
                    Return for refund within: 3 days<br>
                    Restocking Fee: Yes<br>
                    This is our Standard Return Policy. Items covered by this policy must be returned within 7 days of the
                    invoice date. Will be applied Restocking Fee from 15%. For more details and policy please visit Customer
                    satisfaction policy.
                </p>
            </div>
            <div class="row">
                <h4 class="intro">PROMOTIONAL, DEALS, SALE, DISCOUNT AND SELLING WITH SUPER LOW PRICE PRODUCTS STANDARD
                    RETURN POLICY</h4>
                <p>
                    Return for replacement within: No<br>
                    Return for refund within: 24hrs<br>
                    Restocking Fee: Yes<br>
                    This is our Standard Return Policy for Promotional, Deals, Sale, Discount Stock Clearance Sale and
                    Selling with Super Low Price Products doesn’t cover warranty/replacement/refund. Items covered by this
                    policy must be returned for replacement within 24hrs of the invoice date. Will be applied Restocking Fee
                    from 15%. For more details and policy please visit Customer satisfaction policy.<br>
                    No warranty of any kind would be available on any products that are provided as part of promotional
                    deals, special offers, bundle offers, clearance stock, or noted as free or super low price.
                </p>
            </div>
            <div class="row">
                <h4 class="intro">MOBILE PHONES, SMART PHONES STANDARD RETURN POLICY FOR WARRANTIED MODELS ONLY</h4>
                <p>
                    Return for replacement within: 7 days (must be unopened, brand new condition)<br>
                    Return for refund within: 3 days (must be unopened, brand new condition all product must be inside the
                    box, customer must call Winshopee Customer Care team within 24 hours to register the compliant)<br>
                    Restocking Fee: Yes<br>
                    Warranty: As per mention on Winshopee web site<br>
                    Note: Mobile Phones or Smart Phones if we are selling with warranty, we will indicate about warranty
                    period in invoice. If in invoice we did not indicate warranty this is meaning Mobile Phone or Smart
                    Phone without warranty!<br>
                    Branded Mobiles phones/Smart phone warranty can be claimed from brand dealers or through Ourshopee (TRA
                    Products only) This is our Standard Return and Warranty policy for Warrantied Mobiles Phones, Smart
                    Phones. Items covered by this policy can be returned within 7 days of the invoice date. Warranty pick &
                    drop from customer location (only within UAE) will be free of charge within 7 days of the invoice
                    date,
                    after 7 days there will charges for pick-up and delivery. For exchanging & service product deliver
                    charges will apply.
                </p>
                <p>
                    The following conditions are not acceptable for return, warranty and replacement.<br>
                    Any physical damage<br>
                    In invoice not indicated warranty period<br>
                    Mobiles Phones, Smart Phones that are missing the manufacturer label containing model number and part
                    number<br>
                    Mobiles Phones, Smart Phones that are missing the manufacturer warranty label<br>
                    Mobiles Phones, Smart Phones that were missing parts, box, headphones or any other accessories from the
                    original box<br>
                    Returned without original invoice<br>
                    Mobiles Phones, Smart Phones which not satisfying manufacturer warranty policy<br>
                    Mobiles Phones, Smart Phones which is not satisfying Customer Satisfaction policy<br>
                    TABLETS STANDARD RETURN POLICY<br>
                    Return for replacement within: 7 days<br>
                    Return for refund within: 3 days<br>
                    Restocking Fee: Yes<br>
                    Warranty: As Per Mention on Winshopee Web Site<br>
                    This is our Standard Return and Warranty policy for Tablets. Items covered by this policy can be replace
                    or exchange within 7 days of the invoice date. Warranty pick & drop from customer location (only within
                    UAE) will be free of charge within 7 days of the invoice date. But for exchanging product deliver
                    charges will apply.<br>
                    The following conditions are not acceptable for return, warranty and replacement.<br>
                    Any physical damage<br>
                    Tablets that are missing the manufacturer label containing model number and part number<br>
                    Tablets that are missing the manufacturer warranty label<br>
                    Tablets that were missing parts, box, headset or any other accessories from the original box<br>
                    Returned without original invoice<br>
                    Tablets which not satisfying manufacturer warranty policy<br>
                    Tablets which is not satisfying Customer Satisfaction policy
                </p>
            </div>
            <div class="row">
                <h4 class="intro">TABLETS STANDARD RETURN POLICY</h4>
                <p>Return for replacement within: 7 days<br>
                    Return for refund within: 3 days<br>
                    Restocking Fee: Yes<br>
                    Warranty: As Per Mention on Winshopee Web Site<br>
                    This is our Standard Return and Warranty policy for Tablets. Items covered by this policy can be replace
                    or exchange within 7 days of the invoice date. Warranty pick & drop from customer location (only within
                    UAE) will be free of charge within 7 days of the invoice date. But for exchanging product deliver
                    charges will apply.
                    The following conditions are not acceptable for return, warranty and replacement.<br>
                    Any physical damage<br>
                    Tablets that are missing the manufacturer label containing model number and part number<br>
                    Tablets that are missing the manufacturer warranty label<br>
                    Tablets that were missing parts, box, headset or any other accessories from the original box<br>
                    Returned without original invoice<br>
                    Tablets which not satisfying manufacturer warranty policy<br>
                    Tablets which is not satisfying Customer Satisfaction policy
                </p>
            </div>
            <div class="row">
                <h4 class="intro">LAPTOPS, NETBOOKS AND DESKTOPS STANDARD RETURN POLICY</h4>
                <p>
                    Return for replacement within: 7 days<br>
                    Return for refund within: 3 days<br>
                    Restocking Fee: Yes<br>
                    Warranty: As per mention on Ourshopee web site<br>
                    This is our Standard Return and Warranty policy for Laptops and Netbooks. Items covered by this policy
                    can be replacement or exchange within 7 days of the invoice date. Warranty pick & drop from customer
                    location (only within UAE) will be free of charge within 7 days of the invoice date. But for
                    exchanging
                    product deliver charges will apply.Branded Laptops, Netbooks and Desktops warranty can be claimed from
                    brand dealers or through Winshopee (TRA Products only)

                    The following conditions are not acceptable for return, warranty and replacement.<br>
                    Any physical damage<br>
                    Laptops and Netbooks that are missing the manufacturer label containing model number and part number<br>
                    Laptops and Netbooks that are missing the manufacturer warranty label<br>
                    Laptops and Netbooks that were missing parts, box, adapters or any other accessories from the original
                    box<br>
                    Returned without original invoice<br>
                    Laptops and Netbooks which not satisfying manufacturer warranty policy<br>
                    Laptops and Netbooks which is not satisfying Customer Satisfaction policy<br>
                    Laptops and Netbooks models which are coming with original Windows or any other software, after using
                    them, activating or starting software cannot be returned or replaced.
                </p>
            </div>
            <div class="row">
                <h4 class="intro">DIGITAL AND DSLR CAMERAS STANDARD RETURN POLICY FOR WARRANTIED MODELS ONLY</h4>
                <p>
                    Return for replacement with in: 7 days<br>
                    Return for refund within: 3 days<br>
                    Restocking Fee: Yes<br>
                    Warranty: As per mention on Ourshopee web site<br>
                    This is our Standard Return and Warranty policy for Warrantied Cameras. Items covered by this policy can
                    be returned within 7 days of the invoice date. Warranty pick & drop from customer location (only within
                    UAE) will be free of charge within 7 days of the invoice date. But for exchanging product deliver
                    charges will apply.<br>

                    The following conditions are not acceptable for return, warranty and replacement.<br>
                    Any physical damage<br>
                    Cameras that are missing the manufacturer label containing model number and part number<br>
                    Cameras that are missing the manufacturer warranty label<br>
                    Cameras that were missing parts, box, headphones or any other accessories from the original box<br>
                    Returned without original invoice<br>
                    Cameras which not satisfying manufacturer warranty policy<br>
                    Cameras which is not satisfying Customer Satisfaction policy
                </p>
            </div>
            <div class="row" style="display:block">
                <h4 class="intro">DIGITAL AND DSLR CAMERAS STANDARD RETURN POLICY FOR NON WARRANTIED MODELS ONLY</h4>
                <p>
                    Return for refund within: No<br>
                    Return for replacement with in: No<br>
                    Restocking Fee: No<br>
                    Restocking Fee: No<br>
                    Warranty: No
                </p>
            </div>
            <div class="row" style="display:block">
                <h4 class="intro">MOBILE PHONES, SMART PHONES STANDARD RETURN POLICY FOR NON WARRANTIED MODELS ONLY</h4>
                <p>
                    Return for refund within: No<br>
                    Return for replacement with in: No<br>
                    Restocking Fee: No<br>
                    Warranty: No<br>
                    This is our Standard Return and Warranty policy for NON Warrantied Mobiles Phones, Smart Phones. Items
                    covered by this policy can not be returned.
                </p>
            </div>
            <div class="row">
                <h4 class="intro">REFURBISHED OR RECERTIFIED LAPTOPS, NETBOOKS STANDARD RETURN POLICY</h4>
                <p>
                    Return for refund within: 3 days<br>
                    Return for replacement within: 7 days<br>
                    Restocking Fee: No<br>
                    Warranty: As per mention on winshopee web site<br>
                    This is our Standard Return and Warranty policy for Refurbished or Recertified Laptops and Netbooks.
                    Items covered by this policy can be returned within 3 days of the invoice date. Warranty pick & drop
                    from customer location (only within UAE) will be free of charge within 7 days of the invoice date. But
                    for exchanging product deliver charges will apply.<br>

                    The following conditions are not acceptable for return, warranty and replacement.<br>
                    Any physical damage<br>
                    Laptops and Netbooks that are missing the manufacturer label containing model number and part number<br>
                    Laptops and Netbooks that are missing the manufacturer warranty label<br>
                    Laptops and Netbooks that were missing parts, box, adapters or any other accessories from the original
                    box<br>
                    Returned without original invoice<br>
                    Laptops and Netbooks which not satisfying manufacturer warranty policy<br>
                    Laptops and Netbooks which is not satisfying Customer Satisfaction policy<br>
                    Laptops and Netbooks models which are coming with original Windows or any other software, after using
                    them, activating or starting software can not be returned or replaced.
                </p>

            </div>
            <div class="row " style="display:block">
                <h4 class="intro">HEALTH AND BEAUTY PRODUCTS WARRANTY POLICY.</h4>
            
                <p>
                    Health and Beauty products don’t cover under warranty/replacement/refund.
                </p>
            </div>
        </div>
    </section>
@endsection
