

<?php $__env->startSection('content'); ?>
    <style>
        .box_img {
            padding: 20px 0px;
            height: 230px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center right;
            border: 7px solid #fff;
        }

        .box_image {
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .img_box {
            padding-top: 10px;
            padding-bottom: 10px;
        }

        @media (max-width: 1280px) {
            .box_img {
                height: 200px;
                /* Adjust height for tablets */
            }
        }

        @media (max-width: 1024px) {
            .box_img {
                height: 145px;
                /* Adjust height for tablets */
            }
        }

        @media (max-width: 992px) {
            .box_img {
                height: 145px;
                /* Adjust height for tablets */
            }
        }

        @media (max-width: 768px) {
            .box_img {
                height: 100px;
                padding-top: 5px;
                border: 3px solid #fff;

            }

            .box_image {
                padding-top: 5px;
            }

            .img_box {
                padding-top: 10px;
                padding-bottom: 10px;
            }
        }

        /* Mobile screens (576px and below) */
        @media (max-width: 576px) {
            .box_img {
                height: 50px;
                /* Adjust height for mobile */
                border: 3px solid #fff;
            }

            .box_image {
                padding-top: 5px;
                padding-bottom: 5px;
            }

            .img_box {
                padding-top: 10px;
                padding-bottom: 10px;
            }

        }

        .add-to-cart-btn {
            padding: 12px 20px;
            border-radius: 100px;
            background-color: #fdb916;
            color: #222222;
            font-size: 14px;
            font-weight: 600;
            margin: 0px 5px;
            cursor: pointer;
        }

        .add-to-cart-btn:hover,
        .add-to-cart-btn:focus {
            box-shadow: 0px 10px 15px #fdb81685;
            background-color: #efefef;
            color:#222222;
            text-decoration: none;
        }
    </style>
    <!-----------Categories Area----->
    <section class="cat" id="cat">
        <div class="swiper cat-slider">
            <div class="swiper-wrapper" style="padding-top: unset;padding-bottom: unset;">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('cat.view', encryptNumber($cat->id))); ?>">
                        <div class="swiper-slide bigbox">
                            <div class="box" data-aos="flip-left">
                                <img src="<?php echo e(asset('image/' . $cat->image)); ?>" alt="">
                            </div>
                            <a href="<?php echo e(route('cat.view', encryptNumber($cat->id))); ?>"
                                id="text-uppercase"><?php echo e($cat->name); ?></a>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="swiper-button-prev hide-mobile"></div>
            <div class="swiper-button-next hide-mobile"></div>
    </section>
    <!-----------Categories Area----->

    <!-----------Hero Area ---------->
    <section class="hero" id="hero">
        <div class="swiper hero-slider">
            <div class="swiper-wrapper">
                <?php if(!is_null($setting->banner1)): ?>
                    <div class="swiper-slide hero-box">
                        <img src="<?php echo e(asset('banner/' . $setting->banner1)); ?>" alt="banner">
                        <div class="banner-content">
                            <h1 class="italic">ELEVATE YOUR<br> LOOK WITH <span
                                    style="font-weight: 700; color: var(---yellow);">SHOES</span> </h1>
                            <p class="italic pad-top-30">FROM SNEAKERS TO STILETTOS, YOUR SHOE DESTINATION.<br> EXPERIENCE
                                COMFORT AND STYLE WITH OUR SHOES.</p>
                            <div class="inline-buttons pad-top-50">
                                <!-- <a href="#" class="buy-now-btn ">Buy Now</a> -->
                                <!-- <a href="#" class="add-to-cart">Add to Cart</a> -->
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(!is_null($setting->banner2)): ?>
                    <div class="swiper-slide hero-box">
                        <img src="<?php echo e(asset('banner/' . $setting->banner2)); ?>" alt="banner">
                        <div class="banner-content">
                            <h1 class="italic">ELEVATE YOUR<br> LOOK WITH <span
                                    style="font-weight: 700; color: var(---yellow);">SHOES</span> </h1>
                            <p class="italic pad-top-30">FROM SNEAKERS TO STILETTOS, YOUR SHOE DESTINATION.<br> EXPERIENCE
                                COMFORT AND STYLE WITH OUR SHOES.</p>
                            <div class="inline-buttons pad-top-50">
                                
                                <!-- <a href="#" class="add-to-cart">Add to Cart</a> -->
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(!is_null($setting->banner3)): ?>
                    <div class="swiper-slide hero-box">
                        <img src="<?php echo e(asset('banner/' . $setting->banner3)); ?>" alt="banner">
                        <div class="banner-content">
                            <h1 class="italic">ELEVATE YOUR<br> LOOK WITH <span
                                    style="font-weight: 700; color: var(---yellow);">SHOES</span> </h1>
                            <p class="italic pad-top-30">FROM SNEAKERS TO STILETTOS, YOUR SHOE DESTINATION.<br> EXPERIENCE
                                COMFORT AND STYLE WITH OUR SHOES.</p>
                            <div class="inline-buttons pad-top-50">
                                
                                <!-- <a href="#" class="add-to-cart">Add to Cart</a> -->
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(!is_null($setting->banner4)): ?>
                    <div class="swiper-slide hero-box">
                        <img src="<?php echo e(asset('banner/' . $setting->banner4)); ?>" alt="banner">
                        <div class="banner-content">
                            <h1 class="italic">ELEVATE YOUR<br> LOOK WITH <span
                                    style="font-weight: 700; color: var(---yellow);">SHOES</span> </h1>
                            <p class="italic pad-top-30">FROM SNEAKERS TO STILETTOS, YOUR SHOE DESTINATION.<br> EXPERIENCE
                                COMFORT AND STYLE WITH OUR SHOES.</p>
                            <div class="inline-buttons pad-top-50">
                                
                                <!-- <a href="#" class="add-to-cart">Add to Cart</a> -->
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(!is_null($setting->banner5)): ?>
                    <div class="swiper-slide hero-box">
                        <img src="<?php echo e(asset('banner/' . $setting->banner5)); ?>" alt="banner">
                        <div class="banner-content">
                            <h1 class="italic">ELEVATE YOUR<br> LOOK WITH <span
                                    style="font-weight: 700; color: var(---yellow);">SHOES</span> </h1>
                            <p class="italic pad-top-30">FROM SNEAKERS TO STILETTOS, YOUR SHOE DESTINATION.<br> EXPERIENCE
                                COMFORT AND STYLE WITH OUR SHOES.</p>
                            <div class="inline-buttons pad-top-50">
                                
                                <!-- <a href="#" class="add-to-cart">Add to Cart</a> -->
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="swiper-pagination"></div>
            <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

            <!-- Initialize Swiper -->
            <script>
                var swiper = new Swiper('.hero-slider', {
                    slidesPerView: 1,
                    spaceBetween: 0,
                    // Optional parameters
                    loop: true,

                    // If you need pagination
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                });
            </script>
        </div>
    </section>
    <!-----------Hero Area ---------->

    <!-----------Mega Detail -------->
    <section class="mega" id="mega">
        <div class="heading" style="text-align: center;">
            <h1>MEGA DEALS OF THE DAY</h1>
        </div>
        <div class="swiper mega-slider desk-hide">
            <!-- <div class="heading" style="text-align: center; padding-bottom: 15px;">
                                                                                                                                            <h1>MEGA DEALS OF THE DAY</h1>
                                                                                                                                            </div> -->
            <div class="swiper-wrapper wrap ">
                <?php $__currentLoopData = $megaDeals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide box">
                        <div class="data ">
                            <div class="image">
                                <a href="<?php echo e(route('products.buy', encryptNumber($deal->id))); ?>">
                                    <img src="<?php echo e(asset('image/' . $deal->image)); ?>" alt=""
                                        class="img-responsive deal-img" />
                                </a>
                            </div>
                            <div class="text">
                                <h1 class="product_name"><?php echo e($deal->name); ?></h1>
                                <div class="clock">
                                    <span class="d">00</span>
                                    <span>:</span>
                                    <span class="hrs">00</span>
                                    <span>:</span>
                                    <span class="min">04</span>
                                    <span>:</span>
                                    <span class="sec">36</span>
                                </div>
                                <div class="price">
                                    <?php if($deal->old_price != $deal->price): ?>
                                        <span class="cut"><?php echo e($deal->old_price); ?> <span class="money">AED</span></span>
                                    <?php endif; ?>
                                    <span class="pri"><?php echo e($deal->price); ?> <span class="money">AED</span></span>
                                </div>
                                <div class="button">
                                    <a href="<?php echo e(route('products.buy', encryptNumber($deal->id))); ?>"
                                        class="buy-now-btn">Buy
                                        Now !</a>
                                    <a href="#" class="add-to-cart-trigger add-to-cart"
                                        data-form-id="add-to-cart-<?php echo e($deal->id); ?>" style="text-decoration: none;">
                                        Add to Cart
                                    </a>

                                    <form id="add-to-cart-<?php echo e($deal->id); ?>" action="<?php echo e(route('add.cart')); ?>"
                                        method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="product_id" value="<?php echo e($deal->id); ?>">
                                        <input type="hidden" name="event_id" value="">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <div class="swiper mega-slider hide-mobile">
            <div style="text-align: center;padding-bottom: 40px; " class="title-head">
                <h1>MEGA DEALS OF THE DAY</h1>
            </div>
            <div class="swiper-wrapper wrap">
                <?php $__currentLoopData = $megaDeals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide box">
                        <div class="data ">
                            <div class="image image_deal">
                                <a href="<?php echo e(route('products.buy', encryptNumber($deal->id))); ?>">
                                    <img src="<?php echo e(asset('image/' . $deal->image)); ?>" alt=""
                                        class="img-responsive deal-img" />
                                </a>
                            </div>
                            <div class="text">
                                <h1 class="product_name"><?php echo e($deal->name); ?></h1>
                                <div class="clock">
                                    <span class="d">00</span>
                                    <span>:</span>
                                    <span class="hrs">00</span>
                                    <span>:</span>
                                    <span class="min">04</span>
                                    <span>:</span>
                                    <span class="sec">36</span>
                                </div>
                                <div class="price">
                                    <?php if($deal->old_price != $deal->price): ?>
                                        <span class="cut"><?php echo e($deal->old_price); ?> <span
                                                class="money">AED</span></span>
                                    <?php endif; ?>
                                    <span class="pri"><?php echo e($deal->price); ?> <span class="money">AED</span></span>
                                </div>
                                <div class="button">
                                    <a href="<?php echo e(route('products.buy', encryptNumber($deal->id))); ?>"
                                        class="buy-now-btn">Buy
                                        Now !</a>
                                    <a href="#" class="add-to-cart-trigger add-to-cart"
                                        data-form-id="add-to-cart-<?php echo e($deal->id); ?>" style="text-decoration: none;">
                                        Add to Cart
                                    </a>

                                    <form id="add-to-cart-<?php echo e($deal->id); ?>" action="<?php echo e(route('add.cart')); ?>"
                                        method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="product_id" value="<?php echo e($deal->id); ?>">
                                        <input type="hidden" name="event_id" value="">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    <!-----------Mega Detail -------->

    <!---------Brand Offer ---------->
    <section class="brand" id="brand">
        <div class="heading">
            <h1 class="hide-mobile">BRAND MEGA OFFER</h1>
        </div>
        <div class="container">
            <div class="big-image" data-aos="fade-right">
                <img src="<?php echo e(URL::asset('front/img/o.png')); ?>" alt="">
            </div>
            <div class="right">
                <div class="header-box desk-hide">
                    <img class="desk-hide" src="<?php echo e(URL::asset('front/img/shopping-bag.png')); ?>" alt="">
                    <div class="text desk-hide">
                        <h1>BRAND</h1>
                        <h3>MEGA OFFER</h3>
                    </div>
                </div>
                <div class="img_box">
                    <?php $__currentLoopData = $megaOffers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="box_image" data-aos="flip-left">
                            <a href="<?php echo e(route('cat.view', encryptNumber($offer->id))); ?>">

                                <div class="box box_img"
                                    style="background-image: url(<?php echo e(asset('banner/' . $offer->banner)); ?>); ">
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
    <!----------Brand Offer -------->

    <!----------Red Offer   -------->
    <section class="offer1" id="offer1" data-aos="zoom-in">
        <!-- <div class="container">
                                                                            <img src="<?php echo e(URL::asset('front/img/baner-left.jpg')); ?>" alt="">
                                                                            <img src="<?php echo e(URL::asset('front/img/center.jpg')); ?>" alt="">
                                                                            <a class="red-btn">Shop now!<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                                    fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                                                                    <path
                                                                                        d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                                                                                </svg></a>
                                                                        </div> -->
        <a class="bann-link" href="<?php echo e(route('shop')); ?>">
            <img class="ban-img" src="<?php echo e(URL::asset('front/img/red-banner-1.jpg')); ?>" alt="">
        </a>
    </section>
    <!----------Red Offer   -------->

    <!----------Product 1   -------->
    <section class="pro1" id="pro1">
        <div class="swiper pro1-slider">
            <div class="swiper-wrapper">
                <?php $__currentLoopData = $newArrivals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arrival): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide box">
                        <div class="image">
                            <a  href="<?php echo e(route('products.buy', encryptNumber($arrival->id))); ?>"> <img src="<?php echo e(asset('image/' . $arrival->image)); ?>" alt=""></a>
                           
                        </div>
                        <div class="text">
                            <!-- <h3 class="product_name"><?php echo e($arrival->name); ?></h3> -->
                            <h3 class="product_name"><?php echo e($arrival->name); ?></h3>
                            <div class="price">
                                <?php if($arrival->old_price != $arrival->price): ?>
                                    <span class="cut"><?php echo e($arrival->old_price); ?> <strong
                                            class="cuts">AED</strong></span>
                                <?php endif; ?>
                                <span class="pri"> <?php echo e($arrival->price); ?> <strong class="red">AED</strong></span>

                            </div>
                            <div class="button">
                                <a href="<?php echo e(route('products.buy', encryptNumber($arrival->id))); ?>"
                                    class="buy-now-btn">Buy
                                    Now<span>!</span><svg class="desk-hide" width="100%" height="100%"
                                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9 3.5V2M5.06066 5.06066L4 4M5.06066 13L4 14.0607M13 5.06066L14.0607 4M3.5 9H2M15.8645 16.1896L13.3727 20.817C13.0881 21.3457 12.9457 21.61 12.7745 21.6769C12.6259 21.7349 12.4585 21.7185 12.324 21.6328C12.1689 21.534 12.0806 21.2471 11.9038 20.6733L8.44519 9.44525C8.3008 8.97651 8.2286 8.74213 8.28669 8.58383C8.33729 8.44595 8.44595 8.33729 8.58383 8.2867C8.74213 8.22861 8.9765 8.3008 9.44525 8.44519L20.6732 11.9038C21.247 12.0806 21.5339 12.169 21.6327 12.324C21.7185 12.4586 21.7348 12.6259 21.6768 12.7745C21.61 12.9458 21.3456 13.0881 20.817 13.3728L16.1896 15.8645C16.111 15.9068 16.0717 15.9279 16.0374 15.9551C16.0068 15.9792 15.9792 16.0068 15.9551 16.0374C15.9279 16.0717 15.9068 16.111 15.8645 16.1896Z"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg></a>
                                <a href="#" class="add-to-cart-trigger add-to-cart"
                                    data-form-id="add-to-cart-<?php echo e($arrival->id); ?>" style="text-decoration: none;">
                                    Add to Cart
                                </a>

                                <form id="add-to-cart-<?php echo e($arrival->id); ?>" action="<?php echo e(route('add.cart')); ?>"
                                    method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="product_id" value="<?php echo e($arrival->id); ?>">
                                    <input type="hidden" name="event_id" value="">
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
    </section>
    <!----------Product 1   -------->
    <?php $__currentLoopData = $listed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!----------Banner 2   --------->
        <!-- <section class="ban2" id="ban<?php echo e($key); ?>">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <img src="<?php echo e(asset('banner/' . $list->banner)); ?>" alt="">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </section> -->
        <div class="swiper hero-slider">
            <div class="swiper-wrapper wrapper">
                <div class="swiper-slide box">
                    <a href="<?php echo e(route('cat.view', encryptNumber($list->id))); ?>"> <img
                            src="<?php echo e(asset('banner/' . $list->banner)); ?>" alt=""></a>
                </div>
            </div>
        </div>
        <!----------Banner 2   --------->

        <!----------Product 2   -------->
        <section class="pro2" id="pro<?php echo e($key); ?>">
            <div class="swiper pro2-slider">
                <div class="swiper-wrapper wrapper">
                    <?php $__currentLoopData = $list->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="swiper-slide box">
                            <div class="image">
                                <img src="<?php echo e(asset('image/' . $prod->image)); ?>" alt="">
                            </div>
                            <div class="text">
                                <h3 class="product_name"><?php echo e($prod->name); ?></h3>
                                <div class="price">
                                    <span><?php echo e($prod->price); ?><strong>AED</strong></span>
                                </div>
                                <div class="buttons">
                                    <a href="<?php echo e(route('products.buy', encryptNumber($prod->id))); ?>"
                                        class="buy-now-btn-3">Buy
                                        Now<span>!</span><svg class="desk-hide" width="100%" height="100%"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9 3.5V2M5.06066 5.06066L4 4M5.06066 13L4 14.0607M13 5.06066L14.0607 4M3.5 9H2M15.8645 16.1896L13.3727 20.817C13.0881 21.3457 12.9457 21.61 12.7745 21.6769C12.6259 21.7349 12.4585 21.7185 12.324 21.6328C12.1689 21.534 12.0806 21.2471 11.9038 20.6733L8.44519 9.44525C8.3008 8.97651 8.2286 8.74213 8.28669 8.58383C8.33729 8.44595 8.44595 8.33729 8.58383 8.2867C8.74213 8.22861 8.9765 8.3008 9.44525 8.44519L20.6732 11.9038C21.247 12.0806 21.5339 12.169 21.6327 12.324C21.7185 12.4586 21.7348 12.6259 21.6768 12.7745C21.61 12.9458 21.3456 13.0881 20.817 13.3728L16.1896 15.8645C16.111 15.9068 16.0717 15.9279 16.0374 15.9551C16.0068 15.9792 15.9792 16.0068 15.9551 16.0374C15.9279 16.0717 15.9068 16.111 15.8645 16.1896Z"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg></a>
                                    <a href="#" class="add-to-cart-trigger add-to-cart-3" data-form-id="add-to-cart-<?php echo e($prod->id); ?>" style="text-decoration: none;">
                                        Add to Cart
                                    </a>

                                    <form id="add-to-cart-<?php echo e($prod->id); ?>" action="<?php echo e(route('add.cart')); ?>"
                                        method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="product_id" value="<?php echo e($prod->id); ?>">
                                        <input type="hidden" name="event_id" value="">
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </section>

        <!----------Product 2   -------->
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    <!----------Product 1   -------->
    <?php $__currentLoopData = $featuredCats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cats): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(!is_null($cats->ad_banner)): ?>
            <div class="swiper hero-slider product-top-banner">
                <div class="swiper-wrapper wrapper">
                    <div class="swiper-slide box">
                        <img src="<?php echo e(asset('ad_banner/' . $cats->ad_banner)); ?>" alt="">
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <section class="bun" id="bun">
            <div class="swiper big-slider">
                <div class="heading hide-mobile">
                    <img src="<?php echo e(URL::asset('front/img/bp.png')); ?>" alt="">
                    <h1><?php echo e($cats->name); ?></h1>
                </div>
                <div class="swiper-button-next hide-mobile"></div>
                <div class="swiper-button-prev hide-mobile"></div>
                <div class="swiper-wrapper">
                    <?php $__currentLoopData = $cats->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="swiper-slide box" style="width: 369.667px; margin-right: 40px;"
                            data-key="<?php echo e($key); ?>">
                            <?php if($item->delivery_charge == 0): ?>
                                <p>Free shipping</p>
                            <?php endif; ?>
                            <div class="image image_cat">
                                <a href="<?php echo e(route('products.buy', encryptNumber($item->id))); ?>"><img src="<?php echo e(asset('image/' . $item->image)); ?>" alt=""></a>
                                
                            </div>
                            <div class="text text_cat">
                                <h3 class="product_name"><?php echo e($item->name); ?></h3>
                                <div class="price">
                                    <?php if($item->old_price != $item->price): ?>
                                        <span class="cut"><?php echo e($item->old_price); ?> <strong
                                                class="cuts">AED</strong></span>
                                    <?php endif; ?>
                                    <span class="pri"><?php echo e($item->price); ?> <strong class="red">AED</strong></span>
                                </div>
                                <div class="star">
                                    <i class="fi fi-ss-star"></i>
                                    <i class="fi fi-ss-star"></i>
                                    <i class="fi fi-ss-star"></i>
                                    <i class="fi fi-ss-star"></i>
                                    <i class="fi fi-ss-star"></i>
                                </div>
                                <div class="button">
                                    <a href="<?php echo e(route('products.buy', encryptNumber($item->id))); ?>"
                                        class="buy-now-btn-4">Shop
                                        Now<span>!</span><svg class="desk-hide" width="100%" height="100%"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9 3.5V2M5.06066 5.06066L4 4M5.06066 13L4 14.0607M13 5.06066L14.0607 4M3.5 9H2M15.8645 16.1896L13.3727 20.817C13.0881 21.3457 12.9457 21.61 12.7745 21.6769C12.6259 21.7349 12.4585 21.7185 12.324 21.6328C12.1689 21.534 12.0806 21.2471 11.9038 20.6733L8.44519 9.44525C8.3008 8.97651 8.2286 8.74213 8.28669 8.58383C8.33729 8.44595 8.44595 8.33729 8.58383 8.2867C8.74213 8.22861 8.9765 8.3008 9.44525 8.44519L20.6732 11.9038C21.247 12.0806 21.5339 12.169 21.6327 12.324C21.7185 12.4586 21.7348 12.6259 21.6768 12.7745C21.61 12.9458 21.3456 13.0881 20.817 13.3728L16.1896 15.8645C16.111 15.9068 16.0717 15.9279 16.0374 15.9551C16.0068 15.9792 15.9792 16.0068 15.9551 16.0374C15.9279 16.0717 15.9068 16.111 15.8645 16.1896Z"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg></a>
                                    <a href="#" class="add-to-cart-trigger add-to-cart" data-form-id="add-to-cart-<?php echo e($item->id); ?>" style="text-decoration: none;">
                                        Add to Cart
                                    </a>

                                    <form id="add-to-cart-<?php echo e($item->id); ?>" action="<?php echo e(route('add.cart')); ?>"
                                        method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="product_id" value="<?php echo e($item->id); ?>">
                                        <input type="hidden" name="event_id" value="">
                                    </form>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <!----------Product 1   -------->

    <!----------Service Area ------->
    <section class="ser" id="ser">
        <div class="container">
            <div class="box" data-aos="flip-left">
                <div class="image">
                    <img src="<?php echo e(URL::asset('front/img/all.png')); ?>" alt="" id="icon-size">
                </div>
                <!-- <a href="#">all in one</a> -->
            </div>

            <div class="box" data-aos="flip-left">
                <div class="image">
                    <img src="<?php echo e(URL::asset('front/img/sale.png')); ?>" alt="" id="icon-size">
                </div>
                <!-- <a href="#">fast delivery</a> -->
            </div>

            <div class="box" data-aos="flip-left">
                <div class="image">
                    <img src="<?php echo e(URL::asset('front/img/great-selection.png')); ?>" alt="" id="icon-size">
                </div>
                <!-- <a href="#">selection great</a> -->
            </div>

            <div class="box" data-aos="flip-left">
                <div class="image">
                    <img src="<?php echo e(URL::asset('front/img/assured-quality.png')); ?>" alt="" id="icon-size">
                </div>
                <!-- <a href="#">#1 quality</a> -->
            </div>

            <div class="box" data-aos="flip-left">
                <div class="image">
                    <img src="<?php echo e(URL::asset('front/img/fast-delivery.png')); ?>" alt="" id="icon-size">
                </div>
                <!-- <a href="#">sale product</a> -->
            </div>
        </div>
    </section>
    <!----------Service Area ------->

    <script>
        function generateEventId() {
            return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
                var r = Math.random() * 16 | 0,
                    v = c === 'x' ? r : (r & 0x3 | 0x8);
                return v.toString(16);
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.add-to-cart-trigger').forEach(function(link) {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    var formId = link.getAttribute('data-form-id');
                    var form = document.getElementById(formId);
                    var eventId = generateEventId();

                    // Fire Facebook Pixel event
                    if (typeof fbq !== 'undefined') {
                        fbq('track', 'AddToCart', {
                            // Optionally add more event data here
                        }, {
                            eventID: eventId
                        });
                    }

                    // Set the event_id in the hidden input
                    form.querySelector('input[name="event_id"]').value = eventId;

                    // Submit the form
                    form.submit();
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASA\Desktop\winscart_dashboard\winscart\resources\views/frontend/index.blade.php ENDPATH**/ ?>