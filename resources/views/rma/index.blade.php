@extends('layouts.master')

@section('content')
    <script src="{{ asset('assetst/js/jquery.min.js') }}"></script>
    <style>
        /* Define button colors */
        .delivered {
            background-color: green !important;
            color: white !important;
        }

        .pickedup {
            background-color: teal !important;
            color: white !important;
        }

        .packed {
            background-color: purple !important;
            color: white !important;
        }

        .invoice_printed {
            background-color: gray !important;
            color: white !important;
        }

        .assigned_to_rider {
            background-color: lightseagreen !important;
            color: white !important;
        }

        .default_status {
            background-color: lightgray !important;
            color: black !important;
        }
    </style>
    <div class="page-header">
        <h1 class="page-title">RMA</h1>
    </div>
    <div class="row mt-3">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Spend</h5>
                    <p class="card-text">${{ number_format($totalSpend, 2) }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Orders</h5>
                    <p class="card-text">{{ $totalOrders }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Avg. Cost per Sale</h5>
                    <p class="card-text">${{ number_format($avgCostPerSale, 2) }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="card ml-2 mt-5 mb-5 mb-lg-10">
        <div class="m-5">
            <!-- Search Form -->
            <form action="{{ route('rma.index') }}" method="GET">
                <div class="row">
                    <div class="col-md-3 mt-5">
                        <input type="text" name="order_id" class="form-control" placeholder="Search by Order ID"
                            value="{{ request()->order_id }}">
                    </div>
                    <div class="col-md-3 mt-5">
                        <input type="text" name="contact_number" class="form-control"
                            placeholder="Search by Contact Number" value="{{ request()->contact_number }}">
                    </div>
                    <div class="col-md-3 mt-5">
                        <input type="date" name="start_date" class="form-control" value="{{ request()->start_date }}">
                    </div>
                    <div class="col-md-3 mt-5">
                        <input type="date" name="end_date" class="form-control" value="{{ request()->end_date }}">
                    </div>
                    {{-- <div class="col-md-3 mt-5">
                        <select name="sort_by" class="form-select">
                            <option value="order_id" {{ request('sort_by') == 'order_id' ? 'selected' : '' }}>Order ID</option>
                            <option value="total_spend" {{ request('sort_by') == 'total_spend' ? 'selected' : '' }}>Spend</option>
                            <option value="cost_per_sale" {{ request('sort_by') == 'cost_per_sale' ? 'selected' : '' }}>Cost per Sale</option>
                        </select>
                    </div>
                    <div class="col-md-3 mt-5">
                        <select name="sort_direction" class="form-select">
                            <option value="asc" {{ request('sort_direction') == 'asc' ? 'selected' : '' }}>Ascending</option>
                            <option value="desc" {{ request('sort_direction') == 'desc' ? 'selected' : '' }}>Descending</option>
                        </select>
                    </div> --}}
                    <div class="col-md-12 mt-5 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <a href="{{ route('rma.index') }}" class="btn btn-dark ms-2">Refresh</a>
                    </div>
                </div>
            </form>

        </div>
        <div class="card-body">
            <div class="mt-2">
                @include('layouts.partials.messages')
            </div>
            <div class="row">
                <div class="col-12">
                    <a id="something" class="btn btn-sm btn-info m-1" style="float: right;color:#fff"><i
                            class="fa fa-refresh"></i>Refresh</a>
                    <form action="{{ route('rma.pdf') }}" method="post" style="float: right">
                        @csrf
                        <input type="hidden" name="ids" class="ids" id="idsEq" value="">
                        <button id="pdf-btn" class="btn btn-sm btn-success m-1" href=""><i class="fa fa-excel"></i>
                            Export PDF</button>
                    </form>
                    <form action="{{ route('rmareport.export') }}" method="post" style="float: right">
                        @csrf
                        <input type="hidden" name="ids" class="ids" id="idsEEF" value="">
                        <button class="btn btn-sm btn-primary m-1" href=""><i class="fa fa-excel"></i>
                            Report Export</button>
                    </form>
                    {{-- <a href="{{ route('filter.export') }}" class="btn btn-sm btn-warning m-1" style="float: right">
                        iMail</a> --}}
                    {{-- <a href="{{ route('impress.export') }}" class="btn btn-sm m-1"
                        style="float: right;background-color: #1B317B;
                    color: white">
                        iMPress</a>
                    <a href="{{ route('camel.export') }}" class="btn btn-sm m-1"
                        style="float: right;background-color: #1B317B;
                    color: white">
                        Camel</a>
                    <a href="{{ route('orders.create') }}" class="btn btn-sm btn-primary m-1" style="float: right"><i
                            class="fa fa-plus"></i>
                        order</a> --}}
                    <form action="{{ route('barcode.invoice') }}" method="post" style="float: right">
                        @csrf
                        <input type="hidden" name="ids" class="ids" id="ids" value="">
                        <button class="btn btn-sm btn-danger m-1" href=""><i class="fa fa-print"></i>
                            Barcode</button>
                    </form>
                    <form action="{{ route('bulks.invoice') }}" method="post" style="float: right">
                        @csrf
                        <input type="hidden" name="ids" class="ids" id="ids" value="">
                        <button class="btn btn-sm btn-secondary m-1" href=""><i class="fa fa-print"></i>
                            Invoice</button>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-flush align-middle table-bordered table-row-solid gy-4 gs-9">
                    <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                        <tr style="background-color: #E4A11B;">
                            <th>No</th>
                            <th><input type="checkbox" id="master">Order Id</th>
                            <th>Customer Name</th>
                            <th>Product</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Total Price</th>
                            <th>Delivery Charge</th>
                            <th>Total Spend</th>
                            <th>Comment</th>
                            <th>Total Quantity</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="fw-6 fw-semibold text-gray-600">
                        @foreach ($rmas as $item)
                            @php
                                $status = $item->status ?? $item->order?->status;
                                $statusClass = match ($status) {
                                    'DELIVERED' => 'delivered',
                                    'PICKEDUP' => 'pickedup',
                                    'PACKED' => 'packed',
                                    'INVOICE PRINTED' => 'invoice_printed',
                                    'ASSIGNED TO RIDER' => 'assigned_to_rider',
                                    default => 'default_status',
                                };
                            @endphp
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                {{-- <td class="tdClass" scope="row"><input type="checkbox" class="sub_chk"
                                        data-id="{{ $item->id }}">&nbsp;
                                    <a>{{ $item->id }}</a>
                                </td> --}}
                                <td class="tdClass" scope="row"><input type="checkbox" class="sub_chk"
                                        data-id="{{ $item->order_id }}">&nbsp;
                                        <a href="{{ route('rma.show', $item->id) }}" >
                                            {{ $item->order_id }}
                                        </a>
                                  
                                </td>
                                {{-- <td>{{ $item->order_id }}</td> --}}
                                <td>{{ $item->order?->name }}</td>
                                <td>
                                    {{ $item->product->name }}<br>
                                    <img src="{{ URL::asset('image/' . $item->product->image) }}" alt="item"
                                        width="100px">
                                </td>
                                <td>{{ $item->order?->phone }}</td>
                                <td>
                                    <button class="btn {{ $statusClass }}">
                                        {{ $status }}
                                    </button>
                                </td>
                                <td>{{ number_format($item->order?->total_price, 2) }}</td>
                                <td>{{ number_format($item->order?->delivery_charge, 2) }}</td>
                                <td>{{ number_format(($item->order?->total_price ?? 0) + ($item->order?->delivery_charge ?? 0), 2) }}
                                </td>
                                <td>{{ $item->comment }}</td>
                                <td>{{ $item->order?->total_qty }}</td>
                                <td class="tdClass">
                                    <label for="">Created ON:</label> {{ $item->created_at }}<br>
                                    <label for="">Shipped ON:</label> {{ $item->shipped_date }}<br>
                                    @if ($item->status == 'DELIVERED')
                                        <label for="">Delivered ON:</label> {{ $item->updated_at }}<br>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('rma.edit', $item->id) }}"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $rmas->links() }} <!-- Pagination links -->
            </div>
            <!--end::Table wrapper-->
        </div>
        <!--end::Card body-->
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
