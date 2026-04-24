<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WinsCart is Best Online Shopping portal in Middle East | Buy Mobiles, Electronics and many more in UAE
    </title>

    <meta name="theme-color" content="#F9AF3B">
    <meta name="description"
        content="WinsCart.com Online Shopping for Unique Products, Mobiles, Electronics, Laptops, Apparels, Accessories, Readymades, Perfumes">
    <meta name="keywords"
        content="online shopping, e-commerce store, buy online, online deals, best online prices, online sales">

    <meta property="og:title"
        content="Online Shopping for Unique Products, Mobiles, Electronics, Laptops, Apparels, Accessories, Readymades, Perfumes">
    <meta property="og:description"
        content="Shop online for unique products, mobiles, electronics, laptops, apparels, accessories, readymades, and perfumes. Discover the best deals and exclusive offers.">
    <meta property="og:image" content="https://www.winscart.com/front/img/logo.jpg">
    <meta property="og:url" content="https://www.winscart.com">
    <meta property="og:type" content="website">
    <!---------- favicon link -------->
    <link rel="icon" type="image/png" sizes="16x16"
        href="<?php echo e(URL::asset('front/img/favicon_io/favicon-16x16.png')); ?>">
    <!---------- favicon link -------->

    <!---------- link css ------------>
    <link rel="stylesheet" href="<?php echo e(URL::asset('front/style.css?v=1')); ?>">
    <!---------- link css ------------>

    <!---------- Font Icon ----------->
    <link rel='stylesheet' href='<?php echo e(URL::asset('front/css/uicons-regular-straight.css')); ?>'>
    <link rel='stylesheet' href='<?php echo e(URL::asset('front/css/uicons-regular-rounded.css')); ?>'>
    <link rel='stylesheet' href='<?php echo e(URL::asset('front/css/uicons-bold-rounded.css')); ?>'>
    <link rel='stylesheet' href='<?php echo e(URL::asset('front/css/uicons-solid-rounded.css')); ?>'>
    <link rel='stylesheet' href='<?php echo e(URL::asset('front/css/uicons-brands.css')); ?>'>
    <link rel='stylesheet' href='<?php echo e(URL::asset('front/css/uicons-solid-straight.css')); ?>'>
    <!---------- Font Icon ----------->

    <!---------- swiper css ----------->
    <link rel="stylesheet" href="<?php echo e(URL::asset('front/css/swiper-bundle.min.css')); ?>" />
    <!---------- swiper css ----------->

    <!---------- swiper js ----------->
    <script src="<?php echo e(URL::asset('front/js/swiper-bundle.min.js')); ?>"></script>
    <!---------- swiper js ----------->

    <!-----------jquery link --------->
    <script src="<?php echo e(URL::asset('front/js/jquery.min.js')); ?>"></script>
    <!-----------jquery link --------->

    <!-----------Aos    link --------->
    <link href="<?php echo e(URL::asset('front/css/aos.css')); ?>" rel="stylesheet">
    <!-----------Aos    link --------->
    <?php echo @$setting->pixels; ?>


    <!-- Facebook Pixel Code -->
    <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod ?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '<?php echo e(env('FB_PIXEL_ID')); ?>');
      fbq('track', 'PageView');
    </script>
    <noscript>
      <img height="1" width="1" style="display:none"
           src="https://www.facebook.com/tr?id=<?php echo e(env('FB_PIXEL_ID')); ?>&ev=PageView&noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->
</head>

<body>

    <?php echo $__env->make('frontend.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('frontend.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


</body>

<!---------- swiper js ----------->
<script src="<?php echo e(URL::asset('front/js/swiper-bundle.min.js')); ?>"></script>
<!---------- swiper js ----------->

<!---------- javascript ---------->
<script src="<?php echo e(URL::asset('front/style.js')); ?>"></script>
<!---------- javascript ---------->

<!-----------jquery link --------->
<!-- <script src="jquery-3.6.4.min.html"></script> -->
<!-----------jquery link --------->

<!-----------Aos    link --------->
<script src="<?php echo e(URL::asset('front/js/aos.js')); ?>"></script>
<script>
    AOS.init();
</script>
<!-----------Aos    link --------->

</html>
<?php /**PATH C:\Users\ASA\Desktop\winscart_dashboard\winscart\resources\views/frontend/layout/master.blade.php ENDPATH**/ ?>