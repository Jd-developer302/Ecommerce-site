@extends('layouts.master')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{asset('assetst/js/jquery.min.js')}}"></script>
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">


<!-- Moment.js (necessary for daterangepicker) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<!-- Date Range Picker CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<!-- Date Range Picker JavaScript -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.js"></script>
<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Filter</h1>
</div>
<!-- PAGE-HEADER END -->
<div class="card ml-2 mt-5 mb-5 mb-lg-10">
    <div class="card-body pb-3">
        <div class="card-toolbar">
            <form action="{{ route('reports.sales') }}" id="dateForm" method="GET">
                <div class="row" style="margin-top: .5rem; margin-right:.5rem">
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                        <div id="reportrange" class="form-control mt-5" style="background: #fff; cursor: pointer; padding: 5px 10px; color:#000; border: 1px solid #ccc; width: 100%">
                            <i class="fa fa-calendar"></i>&nbsp;
                            <span>{{$filteredDate ?? 'Today'}}</span> <i class="fa-solid fa-caret-down"></i>
                        </div>
                        <input type="hidden" name="fromDate" id="fromDate" class="form-control"/>
                        <input type="hidden" name="toDate" id="toDate" class="form-control" />
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
                                    // $('#dateForm').submit();
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
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12 col-12 mt-5">
                        <select name="status" id="status" class="form-control">
                            <option value="">Select Status</option>
                            <option value="ORDER PLACED" {{ request('status') == 'ORDER PLACED' ? 'selected' : '' }}>
                                ORDER PLACED</option>
                            <option value="TO BE CONFIRMED"
                                {{ request('status') == 'TO BE CONFIRMED' ? 'selected' : '' }}>TO BE CONFIRMED
                            </option>
                            <option value="ORDER CONFIRMED"
                                {{ request('status') == 'ORDER CONFIRMED' ? 'selected' : '' }}>ORDER CONFIRMED
                            </option>
                            <option value="INVOICE PRINTED"
                                {{ request('status') == 'INVOICE PRINTED' ? 'selected' : '' }}>INVOICE PRINTED
                            </option>
                            <option value="PACKED" {{ request('status') == 'PACKED' ? 'selected' : '' }}>PACKED
                            </option>
                            <option value="ASSIGNED TO RIDER"
                                {{ request('status') == 'ASSIGNED TO RIDER' ? 'selected' : '' }}>ASSIGNED TO RIDER
                            </option>
                            <option value="PICKEDUP" {{ request('status') == 'PICKEDUP' ? 'selected' : '' }}>
                                PICKEDUP</option>
                            <option value="RESHEDULED" {{ request('status') == 'RESHEDULED' ? 'selected' : '' }}>
                                RESHEDULED</option>
                            <option value="DELIVERED" {{ request('status') == 'DELIVERED' ? 'selected' : '' }}>
                                DELIVERED</option>
                            <option value="CANCELLED" {{ request('status') == 'CANCELLED' ? 'selected' : '' }}>
                                CANCELLED</option>
                            <option value="NO ANSWER" {{ request('status') == 'NO ANSWER' ? 'selected' : '' }}>NO
                                ANSWER</option>
                            <option value="OUT FOR DELIVERY"
                                {{ request('status') == 'OUT FOR DELIVERY' ? 'selected' : '' }}>OUT FOR DELIVERY
                            </option>
                            <option value="ATTENTED" {{ request('status') == 'ATTENTED' ? 'selected' : '' }}>
                                ATTENTED</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 col-12 mt-1"><button class="btn btn-sm btn-dark mt-5"><i class="fa fa-filter"></i></button></div>
                </div>
            </form>
        </div>
    </div>
    <div class="card ml-2 mt-5 mb-5 mb-lg-10">
        <!--begin::Card header-->
        <div class="card-header">
            <!--begin::Heading-->
            <div class="card-title">
                <h3>Sales Reports</h3>
            </div>
            <!--end::Heading-->
            <!--end::Toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body">
            <div class="mt-2">
                @include('layouts.partials.messages')
            </div>
            <!--begin::Table wrapper-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9">
                    <!--begin::Thead-->
                    <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                        <tr style="background-color: #E4A11B;">
                            <th class="thClass">Date</th>
                            <th class="thClass">No of Orders</th>
                            <th class="thClass">No of products</th>
                            <th class="thClass">VAT</th>
                            <th class="thClass">Sales</th>
                        </tr>
                    </thead>
                    <!--end::Thead-->
                    <!--begin::Tbody-->
                    <tbody class="fw-6 fw-semibold text-gray-600">
                        @foreach ($sales as $item)
                        <tr>
                            <td class="tdClass">{{ $item->date }}</td>
                            <td class="tdClass">{{ $item->total_orders }}</td>
                            <td class="tdClass">{{ $item->total_products }}</td>
                            <td class="tdClass">AED {{ $item->total_tax }}</td>
                            <td class="tdClass">AED {{ $item->total_sales }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <!--end::Tbody-->
                </table>
                {{-- <div class="d-flex">
                    {!! $items->links('pagination::bootstrap-4') !!}
                </div> --}}
                <!--end::Table-->
            </div>
            <!--end::Table wrapper-->
        </div>
        <!--end::Card body-->
    </div>
    @endsection