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
            <h1 class="term">Terms and Conditions</h1>
        </div>
        <div class="container">
            <div class="row">
                <h4 class="intro">INTRODUCTION</h4>
                <p class="description">
                    You agree to use <strong>uae.winscart.com</strong> website (the "Website") only for purposes that are
                    permitted by this
                    Terms & Condition and any applicable law, regulation or generally accepted practices or guidelines in
                    the relevant jurisdictions.</p>


                <p class="description"> You agree that you will not access or attempt to access the Website other than
                    through the interface
                    that is provided by <strong>uae.winscart.com</strong>, unless you have specifically been permitted to
                    do so in a
                    separate written agreement signed by an authorized representative of
                    <strong>uae.winscart.com</strong>.
                </p>
                <p class="description">You specifically agree not to access or attempt to access the Website, or any portion
                    thereof, through
                    any automated means, including but not limited to the use of scripts or web crawlers. You agree that you
                    will not engage in any activity that disrupts or otherwise interferes with the Website (or the servers
                    and networks which are connected to the Website). You agree that you will not duplicate, reproduce,
                    copy, sell, trade or resell the Website for any purpose.</p>

                <p class="description">You agree that you are solely responsible for any breach of your obligations under
                    this Terms &
                    Condition and for the consequences (including any loss or damage which
                    <strong>uae.winscart.com</strong> may suffer) of
                    any such breach.
                </p>
            </div>
            <div class="row">
                <h4 class="intro">YOUR ACCOUNT AND AMENDMENT TO THE TERMS OF USE</h4>
                <p>
                    You may be required to register with <strong>uae.winscart.com</strong> in order to access certain
                    services or areas of
                    the Site. With respect to any such registration, we may refuse to grant to you the user name you
                    request. Your user name and password are for your personal use only. If you use the Site, you are
                    responsible for maintaining the confidentiality of your account and password and for restricting access
                    to your computer, and you agree to accept responsibility for all activities that occur under your
                    account or password. In addition to all other rights available to <strong>uae.winscart.com</strong>
                    including those set
                    forth in these Terms & Conditions, <strong>uae.winscart.com</strong> reserves the right, in its sole
                    discretion, to
                    terminate your account, refuse service to you, or cancel orders.
                </p>
                <p>
                    We may from time to time modify or change the Terms and Condition. The revised Terms of Use will govern
                    your future use of our Site and Service, so we strongly suggest that you visit and review our Terms of
                    Use periodically. Each version is specifically dated. If you do not agree to the revised version, you
                    must immediately stop using our Site and Service. Our Terms of Use were last updated on march 30 2024,
                    Terms and Conditions Agreement applies from this date onwards.
                </p>
            </div>
            <div class="row">
                <h4 class="intro">INTELLECTUAL PROPERTY</h4>
                <p>
                    All content included on the Site, such as text, graphics, logos, images, audio clips, video, data,
                    music, software, and other material (collectively "Content") is owned or licensed property of
                    <strong>uae.winscart.com</strong> or its suppliers or licensors and is protected by copyright,
                    trademark, patent, or other
                    proprietary rights. The collection, arrangement, and assembly of all Content on the Site is the
                    exclusive property of <strong>uae.winscart.com</strong> FZE. <strong>uae.winscart.com</strong> and
                    its suppliers and licensors expressly
                    reserve all intellectual property rights in all Content.
                </p>
            </div>
            <div class="row">
                <h4 class="intro">GAL CAPACITY TO MAKE AGREEMENTS AND TRANSACT</h4>
                <p>
                    All content included on the Site, such as text, graphics, logos, images, audio clips, video, data,
                    music, software, and other material (collectively "Content") is owned or licensed property of
                    <strong>uae.winscart.com</strong> or its suppliers or licensors and is protected by copyright,
                    trademark, patent, or
                    other proprietary rights. The collection, arrangement, and assembly of all Content on the Site is the
                    exclusive property of <strong>uae.winscart.com</strong> FZE. <strong>uae.winscart.com</strong> and
                    its suppliers and licensors expressly
                    reserve all intellectual property rights in all Content
                </p>
            </div>
            <div class="row">
                <h4 class="intro">PRICES</h4>
                <p>Base Currency.<br>
                    All fees and prices are in UAE Dirhams (AED)<br>
                    Changing of Prices.<br>
                    <strong>uae.winscart.com</strong> prices are subject to modification at any time. Prices may also vary
                    due to a
                    launching price, a promotional offer or sales. Prices of items that are not in stock or that are
                    available for a pre-order are valid during its promotional period after the order was placed. Should the
                    price of those items change with respect to the pre-order price, Customer will be informed and will have
                    the possibility to cancel the order. We reserve the right to update prices displayed on the website from
                    time to time and once updated, they cannot be claimed against an order that has already been confirmed
                    or delivered.
                </p>
            </div>
            <div class="row">
                <h4 class="intro">Typographical</h4>
                <p>
                    Errors <strong>uae.winscart.com</strong> strives for accuracy in all item descriptions, photographs,
                    compatibility
                    references, detailed specifications, pricing, links and any other product-related information contained
                    herein or referenced on our Website. Due to human error and other determinates we cannot guarantee that
                    all item descriptions, photographs, compatibility references, detailed specifications, pricing, links
                    and any other product-related information listed is entirely accurate, complete or current, nor can we
                    assume responsibility for these errors. In the event a product listed on our Web site is labeled with an
                    incorrect price due to some typographical, informational, technical or other error,
                    <strong>uae.winscart.com</strong>
                    shall at its sole discretion have the right to refuse and/or cancel any order for said product and
                    immediately amend, correct and/or remove the inaccurate information.
                </p>
                <p>
                    Additionally, all hyperlinks to other Web sites from <strong>uae.winscart.com</strong> are provided as
                    resources to
                    customers looking for additional information and/or professional opinion.
                    <strong>uae.winscart.com</strong> does not
                    assume responsibility for the claims and/or representations made on these or any other Web sites.
                </p>
            </div>
            <div class="row">
                <h4 class="intro">SHIPPING METHODS</h4>
                <p>
                    All orders may require 24-48 hours processing time before shipping.<br>
                    <strong>uae.winscart.com</strong> does not guarantee same day shipping.<br>
                    <strong>uae.winscart.com</strong> does not offer International shipping options at this time.<br>
                    Exact delivery times cannot be guaranteed.<br>
                    <strong>uae.winscart.com</strong> will NOT deal with or provide any services or products to OFAC
                    sanctioned countries in
                    accordance with the law of UAE.
                    This shipping method available only for UAE but except some areas which is far from the city,
                </p>
            </div>
            <div class="row">
                <h4 class="intro">ORDERS</h4>
                <div class="text-des">
                    <br>
                    <h5>Placing An Order</h5>
                    <p>
                        Placing an order can be done from the website, by telephone <strong>uae.winscart.com</strong>.
                        Should you place an
                        order from the website, you have to be sure that personal data is correct and updated.
                        <strong>uae.winscart.com</strong>. suggests the Customer to proof-read his/her form several times
                        before validating
                        an order. <strong>uae.winscart.com</strong>. is neither responsible for sending e-mails to the
                        wrong e-mail address
                        nor for sending parcels to the wrong delivery address if the form is incorrectly filled-out.
                    </p>
                    <br>
                    <h5>Processing Time</h5>
                    <p>
                        You can expect your order to be processed within approximately 24-48 hours, provided the items are
                        in stock and there are no problems with payment verification. <strong>uae.winscart.com</strong>
                        does not guarantee
                        same day-shipping. Orders are not processed on weekends and holidays.
                    </p>
                    <br>
                    <h5>Order Acceptance Policy</h5>
                    <p>
                        Your receipt of an electronic or other form of order confirmation does not signify our acceptance of
                        your order, nor does it constitute confirmation of our offer to sell.
                        <strong>uae.winscart.com</strong> reserves the
                        right at any time after receipt of your order to accept or decline your order for any reason.
                        <strong>uae.winscart.com</strong>. reserves the right at any time after receipt of your order,
                        without prior notice
                        to you, to supply less than the quantity you ordered of any item. We may require additional
                        verification or information before accepting any order.
                    </p>
                    <br>
                    <h5>Order Acknowledgement</h5>
                    <p>
                        <strong>uae.winscart.com</strong> will keep you informed of your order status via e-mail. All
                        tracking information
                        will be emailed to your <strong>uae.winscart.com</strong> ID once your order has processed or
                        changed status. You
                        may also acquire your order status and other live updates by logging in to your account on our Web
                        site.
                    </p>
                    <br>
                    <h5>Change Orders</h5>
                    <p>
                        You may request a change to your order provided the order has not already been charged to your
                        account. Please call us during <strong>uae.winscart.com</strong>'s hours of operation to request a
                        change to your order.
                        Please have your sales order (SO) or customer number ready for better assistance. We strongly
                        discourage sending change order requests via email because it is unlikely we will receive the
                        message in time to make an adjustment due to the sheer volume of emails we receive each day.
                    </p>
                    <br>
                    <h5>Cancel Orders</h5>
                    <p>
                        You may request that an order be cancelled provided the order has not already been processed and
                        shipped. Simply call us during <strong>uae.winscart.com</strong> hours of operation to request an
                        order
                        cancellation. We strongly discourage sending order cancellation requests via email because it is
                        unlikely we will receive the message in time to void the order due to the sheer volume of emails we
                        receive each day.
                    </p>
                    <br>
                    <h5>Delivery/Shipment Policy</h5>
                    <p>
                        Multiple shipments/delivery may result in multiple postings to the cardholder's monthly statement
                    </p>
                </div>
            </div>
            <div class="row">
                <h4 class="intro">PAYMENT</h4>
                <p>
                    <strong>uae.winscart.com</strong> currently offers COD (“Cash on Delivery”) payments and Paypal will
                    be implemented
                    soon. However, Cash On Delivery option is only applicable within UAE. In order to
                    protect the website visitors to the best of our knowledge, we implement several security policies and
                    certificates. These layers of protection could be by-passed if the user's computer is/was infected with
                    a virus or malicious software. <strong>uae.winscart.com</strong> or its associated partners and
                    employees cannot be held
                    responsible in such a scenario or circumstance.
                </p>
                <p>
                    <strong>uae.winscart.com</strong> reserves the right to refuse a delivery or honor an order from a
                    Customer who has not
                    paid part or the totality of a previous order or with whom a litigious dispute is in progress.
                    <strong>uae.winscart.com</strong> also reserves the right to take any necessary steps including legal
                    action in case of
                    outstanding or non-payment of fees by you.
                </p>
            </div>
            <div class="row">
                <h4 class="intro">DISPUTES</h4>
                <p>
                    If any dispute, claim, controversy or difference (including in relation to any tortious or statutory
                    claim) ("Dispute") arises out of or in connection with or in relation to this User Agreement, including
                    (without limitation) any question regarding the formation, existence, scope, performance,
                    interpretation, validity or termination of this User Agreement or this clause, or any question regarding
                    the legal relationships established by this User Agreement or the consequences of its nullity, then the
                    parties shall first attempt amicably to settle the Dispute through good-faith negotiations over a period
                    of thirty (30) calendar days commencing on the date that a party first sends to the other party a
                    written notice of the Dispute.
                </p>
                <p>
                    In the event that a Dispute has not been settled amicably by the relevant parties by the end of such
                    thirty (30) calendar day-period, the parties hereby agree that the Dispute shall be referred to and
                    finally resolved by binding arbitration as set out below, under the Arbitration Rules of the Dubai
                    International Financial Centre - London Court of International Arbitration ("LCIA"), which rules
                    ("Rules") are deemed to be incorporated by reference into this clause. The number of arbitrators shall
                    be one. The parties to the arbitration shall seek to agree on a sole arbitrator to be nominated to the
                    LCIA court for appointment. If the parties to the arbitration fail to nominate a sole arbitrator within
                    30 days from the date of the service of the request upon the respondent (or such greater or lesser
                    period as may be fixed by the LCIA Court), the sole arbitrator shall be appointed by the LCIA Court. The
                    seat or legal place of the arbitration shall be UAE International Financial Centre in UAE, UAE.
                </p>
                <p>
                    The arbitration proceedings shall be conducted in the English language and the award shall be in
                    English. The foregoing provisions of this clause are without prejudice to the right of
                    <strong>uae.winscart.com</strong>
                    to seek interim relief at any time from any court of competent jurisdiction (whether or not an
                    arbitrator has been appointed) and <strong>uae.winscart.com</strong> shall not be deemed to have
                    breached this
                    arbitration agreement or infringed the powers of the arbitrator for having done so.
                </p>
                <p>
                    Item(s) can be returned under the following conditions<br>
                    If the customer has received the wrong item(s).<br>
                    The item(s) received are not in the same condition as described on the website.<br>
                    If the item(s) are damaged more / in different ways than what is described in the refurbished terms.<br>
                    Item(s) can only be returned within 3 Days from the date of delivery.
                    Item(s) should be : unused.
                    Item(s) should be : in their original packaging.
                    Item(s) should be : with all the accessories (if any) inside the box
                </p>
                <h5>Non-Returnable Item(s)</h5>
                <p>
                    Products that have been used or damaged by the buyer or are not in the same condition as the buyer
                    received them.
                    Products with tampered or missing serial numbers
                </p>

            </div>
            <div class="row" style="display: block">
                <h4 class="intro">What is Refurbished?</h4>
                <p>
                    <strong>winscart</strong> refurbished products is best option for your needs and in budget.<br>
                    Refurbished products are in better condition than second-hand items.<br>
                    All our refurbished products go through a rigorous quality check process to ensure all problems are
                    fixed.<br>
                    A team of professionals test and restore them to perfect working condition.<br>
                    A refurbished product comes with little to no-sign of external damage.
                    For ease your mind we provide 1 month <strong>uae.winscart.com</strong> warranty.
                </p>
            </div>
        </div>
    </section>
@endsection
