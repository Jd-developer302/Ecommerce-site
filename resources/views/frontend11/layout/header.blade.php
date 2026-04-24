 <!-- tt-top-panel -->
 <div class="tt-top-panel tt-color-dark tt-top-panel-large" id="js-tt-top-panel">
     <div class="container">
         <div class="tt-row">
             <img class="tt-btn-close" src="{{ URL::asset('front/images/icon-close.png') }}" />
             <div class="tt-description">
                 <div class="row">
                     <div class="col-md-6">
                         <h6>FREE SHIPPING ONLY ON APP</h8>
                             <p>FOR NEW CUSTOMERS ONLY</p>
                     </div>
                     <div class="col-md-6">
                         <a href="">SHOP NOW! </a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- /tt-top-panel -->
 <!-- Header -->
 <header class="header">



     <!-- Header Middle Area -->
     <div class="header-middle">
         <div class="container head-menu">
             <div class="menu-mob align-items-center">
                 <div class="col-lg-3 col-md-6 col-sm-3 col-xs-3">
                     <a href="/" class="header-logo">
                         <img src="{{ URL::asset('front/images/logo/logo.png') }}" alt="logo">
                     </a>
                 </div>

                 <div class="header-icons">
                     <div class="header-account">
                         <a href="" class="signin">Sign in <img
                                 src="{{ URL::asset('front/images/profile.png') }}"></a>
                     </div>
                     <div class="header-cart">
                         <a class="header-carticon" href="{{ route('cart.list') }}"><i class="lnr lnr-cart"></i><span
                                 class="count">2</span></a>

                         <!-- Minicart -->
                         <div class="header-minicart minicart">
                             <div class="minicart-header">
                                 <div class="minicart-product">
                                     <div class="minicart-productimage">
                                         <a href="product-details.html">
                                             <img src="{{ URL::asset('front/images/product/thumbnail/product-image-1.jpg') }}"
                                                 alt="product image">
                                         </a>
                                         <span class="minicart-productquantity">1x</span>
                                     </div>
                                     <div class="minicart-productcontent">
                                         <h6><a href="product-details.html">P-Series 4K UHD Dolby Vision HDR Roku
                                                 Smart TV</a></h6>
                                         <span class="minicart-productprice">$43.00</span>
                                     </div>
                                     <button class="minicart-productclose"><i
                                             class="ion ion-ios-close-circle"></i></button>
                                 </div>
                                 <div class="minicart-product">
                                     <div class="minicart-productimage">
                                         <a href="product-details.html">
                                             <img src="{{ URL::asset('front/images/product/thumbnail/product-image-2.jpg') }}"
                                                 alt="product image">
                                         </a>
                                         <span class="minicart-productquantity">1x</span>
                                     </div>
                                     <div class="minicart-productcontent">
                                         <h6><a href="product-details.html">HD Video Recording PJ Handycam
                                                 Camcorder</a></h6>
                                         <span class="minicart-productprice">$43.00</span>
                                     </div>
                                     <button class="minicart-productclose"><i
                                             class="ion ion-ios-close-circle"></i></button>
                                 </div>
                             </div>
                             <ul class="minicart-pricing">
                                 <li>Subtotal <span>$24.12</span></li>
                                 <li>Shipping <span>$7.00</span></li>
                                 <li>Taxes <span>$0.00</span></li>
                                 <li>Total <span>$31.12</span></li>
                             </ul>
                             <div class="minicart-footer">
                                 <a href="{{ route('cart.list') }}" class="ho-button ho-button-fullwidth">
                                     <span>Cart</span>
                                 </a>
                                 <a href="checkout.html" class="ho-button ho-button-dark ho-button-fullwidth">
                                     <span>Checkout</span>
                                 </a>
                             </div>
                         </div>
                         <!--// Minicart -->

                     </div>
                     <div class="mobile-menu clearfix"></div>
                 </div>
             </div>
         </div>
     </div>
     <!--// Header Middle Area -->

     <!-- Header Bottom Area -->
     <div class="header-bottom ">
         <div class="container">
             <div class="row align-items-center">
                 <div class="col-lg-12 d-none d-lg-block">

                     <!-- Navigation -->
                     <nav class="ho-navigation">
                         <ul>
                             <li class="active">
                                 <a href="">Home</a>
                             </li>
                             <li>
                                 <a href="">Shop</a>
                             </li>                            
                             <li>
                                 <a href="">About Us</a>
                             </li>
                             <li>
                                 <a href=""> Contact</a>
                             </li>
                         </ul>
                     </nav>
                     <!--// Navigation -->

                 </div>
                 <div class="search-container">
                     <form action="/action_page.php">
                         <input type="text" placeholder="Search entire store here..." name="search">
                         <button type="submit">SEARCH</button>
                     </form>
                 </div>
             </div>
         </div>
     </div>
     <!--// Header Bottom Area -->

 </header>
 <!--// Header -->
 <script type="text/javascript">
     $(document).ready(function() {
         $(".tt-btn-close").click(function() { //slide down
             $("#js-tt-top-panel").slideUp(1000);
         });
     });
 </script>
