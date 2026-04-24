@extends('layouts.master')

@section('content')
<script src="{{ asset('assetst/js/jquery.min.js') }}"></script>
@php
if (!function_exists('getClass')) {
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
return 'default_status'; // Default class for unmatched values
}
}
@endphp
<style>
    .delivered {
        background-color: green;
        color: white;
    }

    .no_answer {
        background-color: #E4A11B;
        color: black;
    }

    .cancelled {
        background-color: red;
        color: white;
    }

    .pickedup {
        background-color: teal;
        color: white;
    }

    .order_placed {
        background-color: skyblue;
        color: white;
    }

    .awaiting_conformation {
        background-color: orange;
        color: white;
    }

    .order_conformed {
        background-color: blue;
        color: white;
    }

    .packed {
        background-color: purple;
        color: white;
    }

    .resheduled {
        background-color: pink;
        color: black;
    }

    .completed {
        background-color: limegreen;
        color: black;
    }

    .invoice_printed {
        background-color: gray;
        color: white;
    }

    .assigned_to_rider {
        background-color: lightseagreen;
        color: white;
    }

    .default_status {
        background-color: lightgray;
        color: black;
    }
</style>
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Orders</h1>
</div>
<!-- PAGE-HEADER END -->
<div class="card">
    <div class="card-body">
        <form action="{{ route('orders.filter') }}" method="post">
            @csrf
            <div class="row" style="margin-top: .5rem; margin-right:.5rem">
                <div class="col-lg-3 col-md-6 col-sm-12 col-6">
                    <label for="order_id">Order Id</label>
                    <input type="text" name="order_id" class="form-control"
                        value="{{ old('order_id', isset($input['order_id']) ? $input['order_id'] : '') }}"
                        placeholder="Order Id">
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-6">
                    <label for="order_id">Order Ids</label>
                    <input type="text" name="order_ids" class="form-control"
                        value="{{ old('order_ids', isset($input['order_ids']) ? $input['order_ids'] : '') }}"
                        placeholder="Order Ids seperated by commas">
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-6">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control"
                        value="{{ old('name', isset($input['name']) ? $input['name'] : '') }}" placeholder="Name">
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-6">
                    <label for="phone">Phone</label>
                    <input type="number" name="phone" class="form-control"
                        value="{{ old('phone', isset($input['phone']) ? $input['phone'] : '') }}" placeholder="Phone">
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-6">
                    <label for="order_by" class="mt-2">Order By</label>
                    <select name="order_by" id="order_by" class="form-control">
                        <option value="">select</option>
                        @foreach ($users as $item)
                        <option value="{{ $item->id }}"
                            {{ old('order_by', isset($input['order_by']) ? $input['order_by'] : '') == $item->id ? 'selected' : '' }}>
                            {{ $item->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-6">
                    <label for="from_date" class="mt-2">Date Type</label>
                    <select name="date_type" id="" class="form-control">
                        <option value="">--select--</option>
                        <option value="created_at"
                            {{ old('date_type', isset($input['date_type']) ? $input['date_type'] : '') == 'created_at' ? 'selected' : '' }}>
                            Created
                            At</option>
                        <option value="delivery_date"
                            {{ old('date_type', isset($input['date_type']) ? $input['date_type'] : '') == 'delivery_date' ? 'selected' : '' }}>
                            Delivery Date</option>
                        <option value="shipped_date"
                            {{ old('date_type', isset($input['date_type']) ? $input['date_type'] : '') == 'shipped_date' ? 'selected' : '' }}>
                            Shipped Date</option>
                        <option value="rto_date"
                            {{ old('date_type', isset($input['date_type']) ? $input['date_type'] : '') == 'rto_date' ? 'selected' : '' }}>
                            RTO Date</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-6">
                    <label for="from_date" class="mt-2">From Date</label>
                    <input type="date" name="from_date" class="form-control"
                        value="{{ old('from_date', isset($input['from_date']) ? $input['from_date'] : '') }}">
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-6">
                    <label for="to_date" class="mt-2">To Date</label>
                    <input type="date" name="to_date" class="form-control"
                        value="{{ old('to_date', isset($input['to_date']) ? $input['to_date'] : '') }}">
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-6">
                    <label for="status" class="mt-2">Status</label>
                    <select name="status" class="form-control">
                        <option value="">select status</option>
                        <option value="ORDER PLACED"
                            {{ old('status', isset($input['status']) ? $input['status'] : '') == 'ORDER PLACED' ? 'selected' : '' }}>
                            ORDER
                            PLACED</option>
                        <option value="TO BE CONFORMED"
                            {{ old('status', isset($input['status']) ? $input['status'] : '') == 'TO BE CONFORMED' ? 'selected' : '' }}>
                            TO BE
                            CONFORMED</option>
                        <option value="ORDER CONFIRMED"
                            {{ old('status', isset($input['status']) ? $input['status'] : '') == 'ORDER CONFIRMED' ? 'selected' : '' }}>
                            ORDER
                            CONFIRMED</option>
                        <option value="INVOICE PRINTED"
                            {{ old('status', isset($input['status']) ? $input['status'] : '') == 'INVOICE PRINTED' ? 'selected' : '' }}>
                            INVOICE
                            PRINTED</option>
                        <option value="PACKED"
                            {{ old('status', isset($input['status']) ? $input['status'] : '') == 'PACKED' ? 'selected' : '' }}>
                            PACKED</option>
                        <option value="ASSIGNED TO RIDER"
                            {{ old('status', isset($input['status']) ? $input['status'] : '') == 'ASSIGNED TO RIDER' ? 'selected' : '' }}>
                            ASSIGNED TO RIDER</option>
                        <option value="PICKEDUP"
                            {{ old('status', isset($input['status']) ? $input['status'] : '') == 'PICKEDUP' ? 'selected' : '' }}>
                            PICKEDUP
                        </option>
                        <option value="RESHEDULED"
                            {{ old('status', isset($input['status']) ? $input['status'] : '') == 'RESHEDULED' ? 'selected' : '' }}>
                            RESHEDULED
                        </option>
                        <option value="DELIVERED"
                            {{ old('status', isset($input['status']) ? $input['status'] : '') == 'DELIVERED' ? 'selected' : '' }}>
                            DELIVERED
                        </option>
                        <option value="CANCELLED"
                            {{ old('status', isset($input['status']) ? $input['status'] : '') == 'CANCELLED' ? 'selected' : '' }}>
                            CANCELLED
                        </option>
                        <option value="NO ANSWER"
                            {{ old('status', isset($input['status']) ? $input['status'] : '') == 'NO ANSWER' ? 'selected' : '' }}>
                            NO ANSWER
                        </option>
                        <option value="OUT FOR DELIVERY"
                            {{ old('status', isset($input['status']) ? $input['status'] : '') == 'OUT FOR DELIVERY' ? 'selected' : '' }}>
                            OUT FOR DELIVERY
                        </option>
                        <option value="ATTENTED"
                            {{ old('status', isset($input['status']) ? $input['status'] : '') == 'ATTENTED' ? 'selected' : '' }}>
                            ATTENTED
                        </option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-6">
                    <label for="emirate" class="mt-2">Emirate</label>
                    <select name="city" class="form-control">
                        <option value="">Select Emirate</option>
                        <option value="DUBAI"
                            {{ old('city', isset($input['city']) ? $input['city'] : '') == 'DUBAI' ? 'selected' : '' }}>
                            DUBAI</option>
                        <option value="ABU DHABI"
                            {{ old('city', isset($input['city']) ? $input['city'] : '') == 'ABU DHABI' ? 'selected' : '' }}>
                            ABU DHABI
                        </option>
                        <option value="SHARJAH"
                            {{ old('city', isset($input['city']) ? $input['city'] : '') == 'SHARJAH' ? 'selected' : '' }}>
                            SHARJAH</option>
                        <option value="AJMAN"
                            {{ old('city', isset($input['city']) ? $input['city'] : '') == 'AJMAN' ? 'selected' : '' }}>
                            AJMAN</option>
                        <option value="RAK"
                            {{ old('city', isset($input['city']) ? $input['city'] : '') == 'RAK' ? 'selected' : '' }}>
                            RAK
                        </option>
                        <option value="FUJAIRAH"
                            {{ old('city', isset($input['city']) ? $input['city'] : '') == 'FUJAIRAH' ? 'selected' : '' }}>
                            FUJAIRAH</option>
                        <option value="UMM AL QUWAIN"
                            {{ old('city', isset($input['city']) ? $input['city'] : '') == 'UMM AL QUWAIN' ? 'selected' : '' }}>
                            UMM AL QUWAIN
                        </option>
                        <option value="AL AIN"
                            {{ old('city', isset($input['city']) ? $input['city'] : '') == 'AL AIN' ? 'selected' : '' }}>
                            AL AIN</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-6">
                    <label for="Driver" class="mt-2">Rider/Courier</label>
                    <select name="driver" id="" class="form-control">
                        <option value="">--select--</option>
                        @foreach ($drivers as $item)
                        <option value="{{ $item->id }}"
                            {{ old('driver', isset($input['driver']) ? $input['driver'] : '') == $item->id ? 'selected' : '' }}>
                            {{ $item->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-6">
                    <label for="from_date" class="mt-2">RTO/ Non-RTO</label>
                    <select name="is_rto" id="" class="form-control">
                        <option value="">--select--</option>
                        <option value="1"
                            {{ old('is_rto', isset($input['is_rto']) ? $input['is_rto'] : '') == 1 ? 'selected' : '' }}>
                            RTO
                        </option>
                        <option value="2"
                            {{ old('is_rto', isset($input['is_rto']) ? $input['is_rto'] : '') == 2 ? 'selected' : '' }}>
                            PTR
                        </option>
                    </select>
                </div>
                {{-- <div class="col-lg-3 col-md-6 col-sm-12 col-6">
                        <label for="awb">AWB</label>
                        <input type="text" name="awb" class="form-control"
                            value="{{ old('awb', isset($input['awb']) ? $input['awb'] : '') }}" placeholder="AWB">
            </div> --}}

            <div class="col-12 mt-2">
                <label for=""></label><br><button class="btn btn-sm btn-info" style="float:right"><i
                        class="fa fa-search"></i>
                    Search</button>
            </div>
    </div>
    </form>
</div>
</div>
<div class="card">
    <div class="card-body">
        @include('layouts.partials.messages')
        <h5 class="card-title">Orders</h5>
        <div class="row">
            {{-- <div class="col-6">
                    <form action="{{ route('orders.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" class="form-control">

            <button class="btn btn-success btn-sm m-1">Import Winshopee</button>
            </form>
        </div> --}}
        <div class="col-12">
            <a id="something" class="btn btn-sm btn-info m-1" style="float: right;color:#fff"><i
                    class="fa fa-refresh"></i>Refresh</a>
            <form action="{{ route('orders.export') }}" method="post" style="float: right">
                @csrf
                <input type="hidden" name="ids" class="ids" id="idsEE" value="">
                <button class="btn btn-sm btn-secondary m-1" href=""><i class="fa fa-excel"></i>
                    Export</button>
            </form>
            <form action="{{ route('report.export') }}" method="post" style="float: right">
                @csrf
                <input type="hidden" name="ids" class="ids" id="idsEEF" value="">
                <button class="btn btn-sm btn-primary m-1" href=""><i class="fa fa-excel"></i>
                    Report Export</button>
            </form>
            <a href="{{ route('filter.export') }}" class="btn btn-sm btn-warning m-1" style="float: right">
                iMail</a>

            <form action="{{ route('tawseel.import') }}" method="post" style="float: right">
                @csrf
                <input type="hidden" name="ids" class="ids" id="idsEEFg" value="">
                <button class="btn btn-sm btn-primary m-1" href=""><i class="fa fa-excel"></i>
                    Tawseel Assign</button>
            </form>
            <a href="{{ route('impress.export') }}" class="btn btn-sm m-1"
                style="float: right;background-color: #1B317B;
                    color: white">
                iMPress</a>
            <a href="{{ route('camel.export') }}" class="btn btn-sm m-1"
                style="float: right;background-color: #1B317B;
                    color: white">
                Camel</a>
            <a href="{{ route('orders.create') }}" class="btn btn-sm btn-primary m-1" style="float: right"><i
                    class="fa fa-plus"></i>
                order</a>
            <form action="{{ route('barcode.invoice') }}" method="post" style="float: right">
                @csrf
                <input type="hidden" name="ids" class="ids" id="ids" value="">
                <button class="btn btn-sm btn-danger m-1" href=""><i class="fa fa-print"></i>
                    Barcode</button>
            </form>
            <form action="{{ route('bulk.invoice') }}" method="post" style="float: right">
                @csrf
                <input type="hidden" name="ids" class="ids" id="ids" value="">
                <button class="btn btn-sm btn-secondary m-1" href=""><i class="fa fa-print"></i>
                    Invoice</button>
            </form>
        </div>
    </div>
    <div class="table-responsive">
        <table id="zero_config" class="tableClass table table-bordered">
            <thead>
                <tr style="background-color: #E4A11B;">
                    <th class="thClass">Sl. No.</th>
                    <th class="thClass"><input type="checkbox" id="master"> Order No</th>
                    <th class="thClass">Name</th>
                    <th class="thClass">Phone</th>
                    <th class="thClass">Amount</th>
                    <th class="thClass">Status</th>
                    <th class="thClass">Awb</th>
                    <th class="thClass">Date</th>
                    <th class="thClass">Created By</th>
                </tr>
            </thead>
            <tbody>
                <?php $count = ($Orders->currentPage() - 1) * $Orders->perPage() + 1; ?>
                @foreach ($Orders as $key => $order)
                <tr>
                    <td class="tdClass">{{ $count++ }}</td>
                    <td class="tdClass" scope="row"><input type="checkbox" class="sub_chk"
                            data-id="{{ $order->order_id }}">&nbsp;
                        <a href="{{ route('orders.show', $order->id) }}">{{ $order->order_id }}</a>
                    </td>
                    <td class="tdClass">{{ $order->name }}</td>
                    <td class="tdClass">{{ $order->phone }}</td>
                    <td class="tdClass">
                        <div style="text-align: right;">{{ $order->total_price }} AED</div>
                    </td>
                    <td class="tdClass">
                        <button
                            class="btn btn-sm {{ getClass($order->status) }}">{{ $order->status }}</button>
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
                    <td class="tdClass">{{ $order->awb }}</td>
                    <td class="tdClass">
                        <label for="">Created ON:</label> {{ $order->created_at }}<br>
                        <label for="">Shipped ON:</label> {{ $order->shipped_date }}<br>
                        @if ($order->status == 'DELIVERED')
                        <label for="">Delivered ON:</label> {{ $order->delivery_date }}<br>
                        @endif
                    </td>
                    <td class="tdClass">{{ $order->created_by }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    {!! $Orders->links('pagination::bootstrap-4') !!}
</div>
</div>
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
            $(".ids").val(allVals);
        });
        $('.sub_chk').on('click', function(e) {
            var allVals = [];
            $(".sub_chk:checked").each(function() {
                allVals.push($(this).attr('data-id'));
            });
            $(".ids").val(allVals);
        });
        $('#something').click(function() {
            location.reload();
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