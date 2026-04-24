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
} elseif ($value == 'ORDER PLACED') {
return 'order_placed';
} elseif ($value == 'TO BE CONFORMED') {
return 'awaiting_conformation';
} elseif ($value == 'ORDER CONFIRMED') {
return 'order_conformed';
} elseif ($value == 'PACKED') {
return 'packed';
} elseif ($value == 'RESHEDULED') {
return 'resheduled';
} elseif ($value == 'COMPLETED') {
return 'completed';
} elseif ($value == 'INVOICE PRINTED') {
return 'invoice_printed';
} elseif ($value == 'ASSIGNED TO RIDER') {
return 'assigned_to_rider';
}
}
@endphp
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">orders</h1>
</div>
<!-- PAGE-HEADER END -->
<div class="card ml-2 mt-5 mb-5 mb-lg-10">
    <div class="card-header row">
        <div class="col-md-12">
            <div id="qr-reader" style="width: 100% !important"></div>
        </div>
        <div class="col-md-12 mt-3">
            <div class="card-toolbar">
                <form action="{{ route('assigned.status') }}" method="post" id="myForm">
                    @csrf
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="text" name="order_id" id="picked_order_id" value="" class="form-control"
                        autofocus="autofocus" placeholder="scan for pickup ....">
                    <input type="hidden" name="status" value="PICKEDUP" class="form-control">
                    {{-- <input type="hidden" name="orderStatus" id="orderStatus" value="" class="form-control"> --}}
                    {{-- <button class="btn btn-sm btn-secondary" href=""><i class="fa fa-print"></i>
                        Invoice</button> --}}
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>
        <div class="table-responsive">
            <table class="table table-flush align-middle table-bordered table-row-solid gy-4 gs-9">
                <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                    <tr style="background-color: #E4A11B;">
                        <th class="thClass"><input type="checkbox" id="master"> Order No</th>
                        {{-- <th class="thClass">Name</th> --}}
                        {{-- <th class="thClass">Email</th> --}}
                        {{-- <th class="thClass">Phone</th> --}}
                        {{-- <th class="thClass">City</th>
                            <th class="thClass">Amount</th> --}}
                        <th class="thClass">Status</th>
                        <th class="thClass">Action</th>
                    </tr>
                </thead>
                <!--end::Thead-->
                <!--begin::Tbody-->
                <tbody class="fw-6 fw-semibold text-gray-600">
                    @foreach ($Orders as $order)
                    <tr>
                        <th scope="row" class="tdClass"><input type="checkbox" class="sub_chk"
                                data-id="{{ $order->order_id }}">
                            #{{ $order->order_id }}</th>
                        {{-- <td class="tdClass">{{ $order->name }}</td> --}}
                        {{-- <td class="tdClass">{{ $order->email }}</td> --}}
                        {{-- <td class="tdClass">{{ $order->phone }}</td> --}}
                        {{-- <td class="tdClass">
                                    {{ $order->city }}</td>
                        </td>
                        <td class="tdClass">{{ $order->total_price }} AED</td> --}}
                        <td class="tdClass">
                            <button class="btn btn-sm {{ getClass($order->status) }}">{{ $order->status }}</button>
                            @if ($order->status != 'DELIVERED' && $order->status != 'CANCELLED')
                            @php
                            $datetime1 = new DateTime($order->created_at);
                            $datetime2 = new DateTime();

                            $interval = $datetime1->diff($datetime2);
                            $daysBetween = $interval->days;

                            echo $daysBetween . ' days';
                            @endphp
                            @endif
                        </td>

                        <td class="tdClass"><a href="{{ route('drivers.show', $order->id) }}"
                                class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <!--end::Tbody-->
            </table>
            <div class="d-flex">
                {!! $Orders->links('pagination::bootstrap-4') !!}
            </div>
            <!--end::Table-->
        </div>
        <!--end::Table wrapper-->
    </div>
    <!--end::Card body-->
</div>
<script src="https://unpkg.com/html5-qrcode"></script>
<script>
    function onScanSuccess(decodedText, decodedResult) {
        // alert(`Code scanned = ${decodedText}`, decodedResult);
        //alert(decodedText);  
        $("#picked_order_id").val(decodedText);
        getStatus(decodedText);
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
            url: '/getOrderStatus',
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
                    if ('ASSIGNED TO RIDER' == response.details['status']) {
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