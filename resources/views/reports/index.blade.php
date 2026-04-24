@extends('layouts.master')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('assetst/js/jquery.min.js') }}"></script>

    <!-- Moment.js (necessary for daterangepicker) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- Date Range Picker JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.js"></script>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Filter</h1>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="card ml-2 mt-5 mb-5 mb-lg-10">
        <div class="card-body pb-3">
            <div class="card-toolbar">
                <meta name="csrf-token" content="{{ csrf_token() }}">

                <div class="row">
                    <div class="mb-5">
                        <button class="text-white"
                            style="float: right;background-color:#E4A11B;padding:5px 10px 5px 10px;border:none;"
                            id="exportButton" type="submit">Export to
                            CSV</button>
                    </div>
                </div>
                <div class="mt-2">
                    <form action="{{ route('reports.index') }}" method="GET">
                        <div class="row" style="margin-top: .5rem; margin-right:.5rem">
                            <div class="col-lg-4 col-md-12 col-sm-12 col-12 mt-5">
                                <div id="reportrange" class="form-control mt-4"
                                    style="background: #fff; cursor: pointer; padding: 5px 10px; color: #000; border: 1px solid #ccc; width: 100%;">
                                    <i class="fa fa-calendar"></i>&nbsp;
                                    <span>{{ $filterDate ?? 'Today' }}</span>
                                    <i class="fa-solid fa-caret-down"></i>
                                </div>

                                <!-- Hidden Inputs for Dates -->
                                <input type="hidden" name="fromDate" id="fromDate" class="form-control"
                                    value="{{ old('fromDate', request('fromDate')) }}" />
                                <input type="hidden" name="toDate" id="toDate" class="form-control"
                                    value="{{ old('toDate', request('toDate')) }}" />
                                <input type="hidden" name="source" value="{{ request()->get('source') }}" />
                                <input type="hidden" name="status" value="{{ request()->get('status') }}" />

                                <script type="text/javascript">
                                    $(function() {
                                        // Initialize dates
                                        var start = moment().subtract(29, 'days');
                                        var end = moment();

                                        // Callback to update inputs
                                        function cb(start, end) {
                                            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                                            $('#fromDate').val(start.format('YYYY-MM-DD'));
                                            $('#toDate').val(end.format('YYYY-MM-DD'));
                                        }

                                        // Initialize daterangepicker
                                        $('#reportrange').daterangepicker({
                                            startDate: start,
                                            endDate: end,
                                            ranges: {
                                                'Today': [moment(), moment()],
                                                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                                                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                                                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                                                'This Month': [moment().startOf('month'), moment().endOf('month')],
                                                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                                                    'month').endOf('month')]
                                            }
                                        }, cb);

                                        cb(start, end);
                                    });
                                </script>
                            </div>
                            <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                                <label for="" class="mt-2">Source</label>
                                <select name="source" id="source" class="form-control" aria-label="Select Source">
                                    <option value="">Select Source</option>
                                    <option value="Website" {{ request('source') == 'Website' ? 'selected' : '' }}>Website
                                    </option>
                                    <option value="Message" {{ request('source') == 'Message' ? 'selected' : '' }}>Message
                                    </option>
                                    <option value="Lead" {{ request('source') == 'Lead' ? 'selected' : '' }}>Lead
                                    </option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                                <label for="" class="mt-2">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="ORDER PLACED"
                                        {{ request('status') == 'ORDER PLACED' ? 'selected' : '' }}>ORDER PLACED</option>
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
                            <div class="col-lg-1 col-md-6 col-sm-12 col-6" style="margin-top:2rem">
                                <label for=""></label><button class="btn btn-sm btn-dark"><i
                                        class="fa fa-filter"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card ml-2 mt-5 mb-5 mb-lg-10">
            <!--begin::Card header-->
            <div class="card-header">
                <!--begin::Heading-->
                <div class="card-title">
                    <h3>Reports</h3>
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
                    <table class="table table-flush align-middle table-bordered table-row-solid gy-4 gs-9" id=myTable>
                        <!--begin::Thead-->
                        <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                            <tr style="background-color: #E4A11B;">
                                <th class="thClass">No</th>
                                <th class="thClass">Product</th>
                                <th class="thClass">SKU</th>
                                <th class="thClass">Source</th>
                                <th class="thClass">Status</th>
                                <th class="thClass">Quantity</th>
                            </tr>
                        </thead>
                        <!--end::Thead-->
                        <!--begin::Tbody-->
                        <tbody class="fw-6 fw-semibold text-gray-600">
                            @foreach ($Orders as $key => $item)
                                <tr>
                                    <th scope="row" class="tdClass">{{ $key + 1 }}</th>
                                    <td class="tdClass">{{ $item->name }}<br><img
                                            src="{{ URL::asset('image/' . $item->image) }}" alt="item" width="100px">
                                    </td>
                                    <td class="tdClass">{{ $item->sku }}</td>
                                    <td class="tdClass"> {{ $item->source }}</td>
                                    <td class="tdClass">
                                        {{ $item->status }}
                                    </td>
                                    <td class="tdClass">{{ $item->total_quantity }}</td>
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
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('exportButton').addEventListener('click', function() {
                    let startDate = document.getElementById('start_date').value;
                    let endDate = document.getElementById('end_date').value;
                    let source = document.getElementById('source').value;
                    let status = document.getElementById('status').value;

                    // Prepare the data to be sent to the server
                    let filters = {
                        start_date: startDate,
                        end_date: endDate,
                        source: source,
                        status: status
                    };

                    // Send the filters in an AJAX request
                    fetch('/get-filtered-data', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content'),
                            },
                            body: JSON.stringify(filters)
                        })
                        .then(response => response.blob()) // Expecting a CSV file as blob
                        .then(blob => {
                            // Create a download link and trigger the file download
                            const url = window.URL.createObjectURL(blob);
                            const a = document.createElement('a');
                            a.href = url;
                            a.download = 'filtered-data-export.csv'; // Set the filename
                            a.click();
                            window.URL.revokeObjectURL(url);
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                });
            });
        </script>
        <style>
            #exportButton {
                pointer-events: auto;
                cursor: pointer;
            }
        </style>
    @endsection
