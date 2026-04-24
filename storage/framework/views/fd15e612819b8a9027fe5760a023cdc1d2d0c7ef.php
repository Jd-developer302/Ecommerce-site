

<?php $__env->startSection('content'); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="<?php echo e(asset('assetst/js/jquery.min.js')); ?>"></script>

<!-- Moment.js (necessary for daterangepicker) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<!-- Date Range Picker CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<!-- Date Range Picker JavaScript -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.js"></script>

<style>
    /* Default styles for large screens (Desktop) */
    .card_1 {
        background: linear-gradient(to right, rgba(240, 200, 100, 1), rgba(250, 220, 140, 1), rgba(220, 180, 80, 1));
        color: #fff;
        padding: 20px;
        margin: 0 auto;

    }

    .chart-container {
        position: relative;
        height: 200px;
        margin-bottom: 20px;
    }

    .order-stats {
        display: flex;
        justify-content: space-between;
    }

    .stat {
        text-align: center;
        color: #000;
        flex: 1;
    }

    .stat h4 {
        margin: 5px 0;
    }

    .stat p {
        margin: 0;
        font-size: 14px;
    }

    .stat p.increase {
        color: #8bc34a;
    }

    .stat p.decrease {
        color: #f44336;
    }

    /* Tablet (768px to 1024px) */
    @media (max-width: 1024px) {
        .card_1 {
            padding: 15px;
        }

        .chart-container {
            height: 380px;
        }

        .stat p {
            font-size: 13px;
        }
    }

    /* Mobile (below 768px) */
    @media (max-width: 768px) {
        .card_1 {
            padding: 10px;
            margin: 10px;
        }

        .chart-container {
            height: 200px;
        }

        .order-stats {
            flex-direction: column;
            align-items: center;
        }

        .stat {
            margin-bottom: 15px;
        }

        .stat p {
            font-size: 12px;
        }
    }
</style>

<div class="page-header">
    <h1 class="page-title">Dashboard</h1>

    <?php
    $user = auth()->user();
?>

<?php if($user && ($user->hasRole('Super Admin') || $user->hasRole('Admin'))): ?>

    <div>
        <ol class="breadcrumb">
            <!-- <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Library</li> -->
            <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; color:#000; border: 1px solid #ccc; width: 100%">
                <i class="fa fa-calendar"></i>&nbsp;
                <span><?php echo e($date); ?></span> <i class="fa-solid fa-caret-down"></i>
            </div>

            <!-- Hidden form to send the date range -->
            <form id="dateForm" method="GET" action="<?php echo e(url()->current()); ?>">
                <input type="hidden" name="fromDate" id="fromDate" />
                <input type="hidden" name="toDate" id="toDate" />
            </form>

            <script type="text/javascript">
                $(function() {
                    // Initialize start and end dates
                    var start = moment().subtract(29, 'days');
                    var end = moment();

                    // Callback function to update the span text and hidden inputs
                    function cb(start, end) {
                        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                        // Update the hidden form inputs
                        $('#fromDate').val(start.format('YYYY-MM-DD'));
                        $('#toDate').val(end.format('YYYY-MM-DD'));
                        // Submit the form when the date range changes
                        $('#dateForm').submit();
                    }

                    // Initialize the daterangepicker with the date ranges
                    $('#reportrange').daterangepicker({
                        startDate: start,
                        endDate: end,
                        ranges: {
                            'Today': [moment(), moment()],
                            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                            'This Month': [moment().startOf('month'), moment().endOf('month')],
                            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                        }
                    }, cb);

                    // Trigger the callback to set the initial range
                    // cb(start, end);
                });
            </script>


        </ol>
    </div>
</div>
<!-- ROW-1 -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                <div class="card overflow-hidden" style="height: 130px;">
                    <div class="card-body ">
                        <div class="d-flex">
                            <div class="mt-2">
                                <h6 style="font-size: 14px;font-weight:400;">Today Total Orders</h6>
                                <h2 style="font-size: 14px;font-weight:600;"><?php echo e($totalOrders); ?></h2>
                            </div>
                            <div class="ms-auto">
                                <div class="chart-wrapper mt-1">
                                    <canvas id="profitchart"
                                        class="h-8 w-9 chart-dropshadow"></canvas>
                                </div>
                            </div>
                        </div>
                        <span class="text-muted fs-12"><span class="text-green"><i
                                    class="fe fe-arrow-up-circle text-green"></i> 0.9%</span>
                            Last 9 days</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                <div class="card overflow-hidden" style="height: 130px;">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="mt-2">
                                <h6 style="font-size: 14px;font-weight:400;">Cancelled Orders</h6>
                                <h2 style="font-size: 14px;font-weight:600;"><?php echo e($totalCancelledOrders); ?></h2>
                            </div>
                            <div class="ms-auto">
                                <div class="chart-wrapper mt-1">
                                    <canvas id="costchart"
                                        class="h-8 w-9 chart-dropshadow"></canvas>
                                </div>
                            </div>
                        </div>
                        <span class="text-muted fs-12"><span class="text-warning"><i
                                    class="fe fe-arrow-up-circle text-warning"></i> 0.6%</span>
                            Last year</span>
                    </div>
                </div>
            </div>
            <?php $__currentLoopData = $orderFilter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mt-2">
                                <h6 style="font-size: 14px; font-weight: 400;"><?php echo e($order['status']); ?></h6>
                                <h2 style="font-size: 14px; font-weight: 600;"><?php echo e($order['count']); ?></h2>
                            </div>
                            <form action="<?php echo e(route('orders.filter')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="dateRange" value="<?php echo e($date); ?>">
                                <input type="hidden" name="status" value="<?php echo e($order['status']); ?>">
                                <button type="submit" 
                                    style="padding: .5rem; font-size: .6rem;border:none;background:none;color:#E4A11B;">
                                    View Orders
                                </button>
                            </form>
                        </div>
                        <span class="text-muted fs-12"><span class="text-warning"><i
                                    class="fe fe-arrow-up-circle text-warning"></i> <?php echo e($order['percentage']); ?>%</span>
                            Today</span>

                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </div>
    </div>
</div>




<!-- ROW-1 END -->
<!-- <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Dashboard</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Library</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div> -->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8">
            <div class="card pt-5">
                <div class="card-header">
                    <h3 class="card-title">Today Total Orders & Total Sales Analytics</h3>
                </div>
                <?php echo $todayChart->render(); ?>

            </div>

        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">

            <div class="card overflow-hidden">

                <div class="card-body pb-0 bg-recentorder">
                    <h3 class="card-title text-white">Recent Orders</h3>
                    <div class="chart-container">
                        <canvas id="recentOrdersChart"></canvas>
                        <script>
                            const ctx = document.getElementById('recentOrdersChart').getContext('2d');
                            const chart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: <?php echo json_encode($dates, 15, 512) ?>, 
                                    datasets: [
                                        {
                                            label: 'Delivered Orders',
                                            data: <?php echo json_encode($delivered, 15, 512) ?>, 
                                            backgroundColor: 'rgba(75, 192, 192, 0.6)',
                                            borderColor: 'rgba(75, 192, 192, 1)',
                                            borderWidth: 1,
                                            type: 'bar'
                                        },
                                        {
                                            label: 'Cancelled Orders',
                                            data: <?php echo json_encode($cancelled, 15, 512) ?>,
                                            backgroundColor: 'rgba(255, 99, 132, 0.6)',
                                            borderColor: 'rgba(255, 99, 132, 1)',
                                            borderWidth: 1,
                                            type: 'bar'
                                        },
                                        {
                                            label: 'Order Trend',
                                            data: <?php echo json_encode($delivered->merge($cancelled), 15, 512) ?>,
                                            borderColor: '#fff',
                                            backgroundColor: 'transparent',
                                            type: 'line',
                                            tension: 0.4
                                        }
                                    ]
                                },
                                options: {
                                    responsive: true,
                                    plugins: {
                                        legend: {
                                            display: true,
                                            labels: {
                                                color: '#fff'
                                            }
                                        },
                                        title: {
                                            display: true,
                                            text: 'Recent Orders (Last 7 Days)',
                                            color: '#fff'
                                        }
                                    },
                                    scales: {
                                        x: {
                                            ticks: { color: '#fff' },
                                            grid: { display: false }
                                        },
                                        y: {
                                            ticks: { color: '#fff' },
                                            grid: { color: 'rgba(255,255,255,0.1)' }
                                        }
                                    }
                                }
                            });
                        </script>
                    </div>

                </div>
                <div class="card-body">
                    <div class="d-flex mb-4 mt-3">
                        <div
                            class="avatar avatar-md bg-secondary-transparent text-secondary bradius me-3">
                            <i class="fe fe-check"></i>
                        </div>
                        <div class="">
                            <h6 class="mb-1 fw-semibold">Delivered Orders</h6>
                            <p class="fw-normal fs-12"> <span class="text-success"><?php echo e($deliveredIncrease); ?>%</span>
                                increased </p>
                        </div>
                        <div class=" ms-auto my-auto">
                            <p class="fw-bold fs-20"> <?php echo e(number_format($totalDelivered)); ?> </p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="avatar  avatar-md bg-pink-transparent text-pink bradius me-3">
                            <i class="fe fe-x"></i>
                        </div>
                        <div class="">
                            <h6 class="mb-1 fw-semibold">Cancelled Orders</h6>
                            <p class="fw-normal fs-12"> <span class="text-success"><?php echo e($cancelledIncrease); ?>%</span>
                                increased </p>
                        </div>
                        <div class=" ms-auto my-auto">
                            <p class="fw-bold fs-20 mb-0"> <?php echo e(number_format($totalCancelled)); ?> </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card pt-5">
                <div class="card-header">
                    <h3 class="card-title">Sales Analytics</h3>
                </div>
                <?php echo $analyticsChart->render(); ?>

            </div>
        </div>
    </div>
    <?php else: ?>
<?php endif; ?>




    
</div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASA\Desktop\winscart_dashboard\winscart\resources\views/winscart_dashboard.blade.php ENDPATH**/ ?>