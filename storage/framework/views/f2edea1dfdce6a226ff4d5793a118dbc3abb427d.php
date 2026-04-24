<a href="#"><i class="fi fi-rr-caret-up" id="up"></i></a>

<!-- WhatsApp -->
<div class="whatsapp">
    <a href="https://wa.me/+971586583113">
        <img src="<?php echo e(URL::asset('front/img/whatsapp.png')); ?>" alt="">
    </a>
</div>
<!-- Whatsapp -->

<!-----------Top Banner --------->
<!--  -->
<!-----------Top Banner --------->

<!-----------Top Heading--------->
<!--  -->
<!-----------Top Heading--------->
<!-- <section class="desk-head" id="desk-head">
    
    <div class="left" >
        <h1 id="text-uppercase">free shipping<br>
            only on app</h1>
        <p id="text-uppercase">for new customer only</p>
    </div>
    <button>shop now</button>
</section> -->

<div class="scrolling-offer" id="special-offer" style=" background-color: #f5ad3c !important;">
    <span>Special Offer: Buy For 200 AED and Get FREE Delivery on Your Order! Don't Miss Out! 🚚✨ | Special Offer: Buy
        For 200 AED and Get FREE Delivery on Your Order! Don't Miss Out! 🚚✨ | Special Offer: Buy For 200 AED and Get
        FREE Delivery on Your Order! Don't Miss Out! 🚚✨ </span>
    <button class="close-btn" onclick="closeOffer()">×</button>
</div>

<div class="content-head">

</div>

<!-----------Header Area--------->
<section class="header" id="header">
    <div class="container">
        <div class="logo">
            <a href="/"><img src="<?php echo e(URL::asset('front/img/logo.jpg')); ?>" alt="logo" class="logoimg"></a>
        </div>
        <div class="navbar">
            <div class="data">
                <a href="/" id="text-uppercase" style="text-decoration: none;">Home</a>
                <a href="<?php echo e(route('about.us')); ?>" id="text-uppercase" style="text-decoration: none;">About Us</a>
                <a href="<?php echo e(route('shop')); ?>" id="text-uppercase" style="text-decoration: none;">Shop</a>
                <a href="<?php echo e(route('contact')); ?>" id="text-uppercase" style="text-decoration: none;">Contact Us</a>

                <!-- Mega Menu -->
                <!-- Mega Menu -->
                <div class="dropdown">
                    <a href="#" class="dropbtn" style="text-decoration: none;">Categories <i
                            class="fas fa-caret-down"></i></a>
                    <div class="dropdown-content ">
                        <h1
                            style="font-size: 16px; font-weight: bold; color: #333;margin-left:20px; margin-bottom:20px;">
                            Categories</h1>
                        <div class="row">

                            <?php
                                $chunkSize = count($categories) > 14 ? 6 : 5;
                            ?>
                            <?php $__currentLoopData = $categories->chunk($chunkSize); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="column">
                                    <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a class="side-menu__item"
                                            href="<?php echo e(route('cat.view', ['id' => encryptNumber($category->id)])); ?>"
                                            style="text-decoration: none; color: #333; ">
                                            <i class="fa-solid fa-caret-right"></i> <?php echo e($category->name); ?>

                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="mega-menu-image">
                                <img src="<?php echo e(URL::asset('front/img/leptop.png')); ?>" alt="logo"
                                    class="Featured Collection">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="icon">
            <div class="log">
                <!-- <i class="fi fi-rs-circle-user"></i> -->
                <img src="<?php echo e(URL::asset('front/img/user.png')); ?>" alt="" width="30px">
                <h4 class="login-text" style="font-weight: 400; color: grey; font-size: 16px">Sign in</h4>
                <div class="cart">
                    <a href="<?php echo e(route('cart.list')); ?>">
                        <img src="<?php echo e(URL::asset('front/img/trolly.png')); ?>" alt="" width="30px">
                        <h5 id="cart-count"><?php echo e(count(session('tempcart', []))); ?></h5>
                    </a>
                </div>
                <div class="log hide-mobile">
                    <!-- <i class="fi fi-sr-heart"></i> -->
                    <img src="<?php echo e(URL::asset('front/img/heart.png')); ?>" alt="" width="30px">
                </div>
                <i class="fi fi-sr-menu-burger" id="menu"></i>
            </div>
            <!-- <div class="log hide-mobile">
                <div class="cart">
                    <i class="fi fi-rs-shopping-cart" id="cart"></i>
                    <h5>0</h5>
                </div>
                <i class="fi fi-rs-circle-user"></i>
                <h4 class="login-text" style="font-weight: 400; color: grey; font-size: 16px">LOG IN</h4>
                <div class="log hide-mobile heart">
                    <i class="fi fi-sr-heart"></i>
                </div>
                <i class="fi fi-sr-menu-burger" id="menu"></i>
            </div> -->
        </div>
</section>
<!-----------Header Area--------->

<!-----------Search Area--------->
<section class="search padding-search contact-search" id="search">
    <form action="<?php echo e(route('search')); ?>" method="GET">
        <div class="container">

            <i class="fi fi-br-search" style="margin-left: 13px;"></i>
            <input type="Search" id="search" name="product" class="search-style"
                placeholder="Search entire store here..">
            <button type="submit" id="search-i">SEARCH</button>
        </div>
    </form>
</section>
<!-----------Search Area--------->
<section class="search mobile_lock" id="search" style="padding: 20px 20px;">

    <form action="<?php echo e(route('search')); ?>" method="GET">
        <div class="container" data-aos="flip-up">
            <input type="search" name="product" id="search" class="search-style"
                placeholder="SEARCH A PRODUCT....">
            <button type="submit"><i class="fi fi-br-search" id="search-i"></i></button>
        </div>
    </form>

</section>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const dropbtn = document.querySelector('.dropbtn');
        const dropdownContent = document.querySelector('.dropdown-content');

        dropbtn.addEventListener('click', (e) => {
            e.preventDefault();
            if (dropdownContent.style.display === 'flex') {
                dropdownContent.style.display = 'none';
            } else {
                dropdownContent.style.display = 'flex';
            }
        });

        // Close the dropdown if the user clicks outside of it
        window.addEventListener('click', (e) => {
            if (!e.target.matches('.dropbtn')) {
                if (dropdownContent.style.display === 'flex') {
                    dropdownContent.style.display = 'none';
                }
            }
        });
    });
</script>
<style>
    .scrolling-offer {
        position: fixed;
        top: 0;
        width: 100%;
        background-color: #F8A103 !important;
        color: #000;
        overflow: hidden;
        white-space: nowrap;
        text-align: center;
        padding: 15px 0;
        z-index: 1000;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .scrolling-offer span {
        display: inline-block;
        padding-left: 100%;
        animation: scroll-text 30s linear infinite;
    }



    @keyframes scroll-text {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-100%);
        }
    }

    .close-btn {
        position: absolute;
        right: 10px;
        top: 25%;
        transform: translateY(-50%);
        background: none;
        border: none;
        font-size: 20px;
        color: #333;
        cursor: pointer;
        font-weight: bold;
    }

    .close-btn:hover {
        color: #000;
    }

    .content-head {
        margin-top: 50px;
    }

    .dropdown {
        position: static;
        left: 0;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        left: 50%;
        right: 50%;
        transform: translateX(-50%);
        margin-top: 25px;
        width: calc(100% - 40px);
        max-width: 664px;
        height: 60vh;
        background-color: #fff;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        z-index: 1000;
        padding: 20px;
        box-sizing: border-box;
    }



    /* Show dropdown on hover */
    .dropdown:hover .dropdown-content {
        display: block;
        margin-top: 5px;
    }

    /* Grid Layout for Categories */
    .row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        padding: 10px;

    }

    /* Each Column */
    .column {
        flex: 1;
        min-width: 150px;

    }

    /* Category Links */
    .column a {
        display: flex;
        /* Ensures proper alignment */
        align-items: center;
        /* Aligns text and icon */
        text-align: left;
        /* Ensures text starts from the left */
        padding: 8px 12px;
        border-radius: 5px;
        font-size: 14px !important;
        font-weight: 500 !important;
        transition: 0.3s;
        margin-bottom: 5px;
        color: #333;
        text-decoration: none;
    }

    .column a i {
        margin-right: 8px;
        /* Adds spacing between icon and text */
    }

    .column a:hover {
        color: #F8A103 !important;
        /* Change hover color */
    }


    .mega-menu-image {
        width: 25%;
        padding: 10px;
    }

    .mega-menu-image img {
        width: 100%;
        height: auto;
        object-fit: cover;
        border-radius: 4px;
    }

    /* Icon styles */
    .icon-group {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .icon-group img {
        width: 24px;
        height: 24px;
    }

    @media (max-width:1024px) {

        .dropdown {

            margin-left: 400px !important;
        }

        .mega-menu-image {
            display: none;
        }

        .dropdown-content {
            width: 100%;
        }

        .row {
            flex-direction: column;
        }

        .column a {
            margin-left: -800px !important;
        }
    }

    @media (max-width: 812px) {
        .dropdown {

            margin-left: -50px !important;
        }
    }

    /* Responsive styles */
    @media (max-width: 768px) {
        .dropdown {

            margin-left: 1px !important;
        }

        .navbar {
            display: none;
        }

        .icon-group {
            gap: 10px;
        }

        .mega-menu {
            flex-direction: column;
        }

        .mega-menu-categories {
            grid-template-columns: 1fr 1fr;
        }

        .mega-menu-image {
            display: none;
        }

        .column a {
            margin-left: -200px !important;
        }
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
<script>
    function toggleMenu(event) {
        event.preventDefault(); // Prevent the default link behavior
        var menu = event.target.nextElementSibling; // Get the next sibling (dropdown content)
        menu.style.display = (menu.style.display === "block") ? "none" : "block"; // Toggle display
    }

    // Close the menu when clicked outside
    document.addEventListener('click', function(event) {
        var dropdown = document.querySelector('.dropdown');
        var menu = dropdown.querySelector('.dropdown-content');
        var dropbtn = dropdown.querySelector('.dropbtn');

        if (!dropdown.contains(event.target)) {
            menu.style.display = 'none'; // Close menu if click is outside
        }
    });
</script>
<?php /**PATH C:\Users\ASA\Desktop\winscart_dashboard\winscart\resources\views/frontend/layout/header.blade.php ENDPATH**/ ?>