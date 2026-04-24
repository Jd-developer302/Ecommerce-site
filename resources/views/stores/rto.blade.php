@extends('layouts.master')

@section('content')
    <script src="{{ asset('assetst/js/jquery.min.js') }}"></script>
    <style>
        .delivered {
            background-color: rgb(49, 252, 49);
        }

        .no_answer {
            background-color: rgb(242, 255, 53);
        }

        .cancelled {
            background-color: rgb(255, 110, 110);
        }

        .pickedup {
            background-color: rgb(110, 255, 255);
        }
    </style>
    @php
        function getClass($value)
        {
            if ($value == 'DELIVERED') {
                return 'delivered';
            } elseif ($value == 'NO ANSWER') {
                return 'no_answer';
            } elseif ($value == 'CANCELLED') {
                return 'cancelled';
            } elseif ($value == 'PICKEDUP') {
                return 'pickedup';
            }
        }
    @endphp
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Receive RTO</h1>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="card ml-2 mt-5 mb-5 mb-lg-10">
        <div class="card-header row">
            <div class="col-md-12">
                <div id="qr-reader" style="width: 100% !important"></div>
            </div>
            <div class="col-md-12 mt-3">
                <div class="card-toolbar">
                    <form action="{{ route('rto.recive') }}" method="post" id="myForm">
                        @csrf
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <input type="text" name="order_id" id="picked_order_id" value="" class="form-control"
                            autofocus="autofocus" placeholder="scan for recive rto ....">

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/html5-qrcode"></script>
    <script>
        window.onload = function() {
            document.getElementById('picked_order_id').focus();
        };

        function onScanSuccess(decodedText, decodedResult) {
            // alert(`Code scanned = ${decodedText}`, decodedResult);
            //alert(decodedText);  
            $("#picked_order_id").val(decodedText);
            //getStatus(decodedText);
            document.getElementById("myForm").submit();
            // var orderStatus = $("#orderStatus").val();
            // alert(orderStatus);
            // if ('ASSIGNED TO RIDER' == orderStatus) {
            //     document.getElementById("myForm").submit();
            // }else{
            //     alert('Order is pickuped already/ not assigned to you');
            // }
        }

        function getStatus(order_id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/get-order-status',
                type: 'post',
                data: {
                    _token: CSRF_TOKEN,
                    order_id: order_id,
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success == true) {
                        // $("#orderStatus").val(response.details['status']);
                        // var orderStatus = $("#orderStatus").val();
                        //alert(response.details['status']);
                        if ('PACKED' == response.details['status']) {
                            document.getElementById("myForm").submit();
                        }
                    }
                }
            });
        }
        var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", {
                fps: 10,
                qrbox: 250
            });
        html5QrcodeScanner.render(onScanSuccess);
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#master').on('click', function(e) {
                if ($(this).is(':checked', true)) {
                    $(".sub_chk").prop('checked', true);
                } else {
                    $(".sub_chk").prop('checked', false);
                }
                var allVals = [];
                $(".sub_chk:checked").each(function() {
                    allVals.push($(this).attr('data-id'));
                });
                $("#ids").val(allVals);
            });
            $('.sub_chk').on('click', function(e) {
                var allVals = [];
                $(".sub_chk:checked").each(function() {
                    allVals.push($(this).attr('data-id'));
                });
                $(".ids").val(allVals);
            });

        });
        $('.generate_invoice').on('click', function(e) {

            var allVals = [];
            $(".sub_chk:checked").each(function() {
                allVals.push($(this).attr('data-id'));
            });

            if (allVals.length <= 0) {
                alert("Please select row.");
            } else {

                var check = confirm("Are you sure you want to generate invoice?");
                if (check == true) {

                    var join_selected_values = allVals.join(",");

                    $.ajax({
                        url: $(this).data('url'),
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: 'ids=' + join_selected_values,
                        success: function(data) {
                            if (data['success']) {
                                $(".sub_chk:checked").each(function() {
                                    $(this).parents("tr").remove();
                                });
                                alert(data['success']);
                            } else if (data['error']) {
                                alert(data['error']);
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function(data) {
                            alert(data.responseText);
                        }
                    });

                    $.each(allVals, function(index, value) {
                        $('table tr').filter("[data-row-id='" + value + "']").remove();
                    });
                }
            }
        });
    </script>
@endsection
