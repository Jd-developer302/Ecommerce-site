<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('front/images/favicon.png') }}">
    <title>WinsCart-UAE</title>
    <!-- Custom CSS -->
    <link href="{{ url('assets/libs/flot/css/float-chart.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ url('dist/css/style.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('dist/css/custom.css?=1') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>

    {{-- <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div> --}}
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            @include('layouts.partials.navbar')
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            @include('layouts.partials.sidebar')
        </aside>
        <div class="page-wrapper">
            @yield('content')
            <footer class="footer text-center">
                All Rights Reserved by <a href="winscart.com">Winscart</a>.
            </footer>
        </div>
    </div>
    <!-- <script src="{{ url('assets/libs/jquery/dist/jquery.min.js') }}"></script> -->
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ url('assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ url('assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ url('assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ url('dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ url('dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ url('dist/js/custom.min.js') }}"></script>
    <!--This page JavaScript -->
    <!-- <script src="{{ url('dist/js/pages/dashboards/dashboard1.js') }}"></script> -->
    <!-- Charts js Files -->
    <script src="{{ url('assets/libs/flot/excanvas.js') }}"></script>
    <script src="{{ url('assets/libs/flot/jquery.flot.js') }}"></script>
    <script src="{{ url('assets/libs/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ url('assets/libs/flot/jquery.flot.time.js') }}"></script>
    <script src="{{ url('assets/libs/flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ url('assets/libs/flot/jquery.flot.crosshair.js') }}"></script>
    <script src="{{ url('assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ url('dist/js/pages/chart/chart-page-init.js') }}"></script>

</body>

</html>
