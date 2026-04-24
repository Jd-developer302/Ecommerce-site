@extends('layouts.master')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css"> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.js"></script>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

    <style>
        .custom-yellow {
            background-color: #E4A11B !important;
            /* Custom Yellow */
            color: #000 !important;
            /* White Text */
        }
    </style>

    <div class="page-header">
        <h1 class="page-title">Products State Overview</h1>
        <div>
            {{-- <ol class="breadcrumb">
                <a href="{{ route('coupons.create') }}" class="btn btn-sm btn-primary my-1">Add Coupon</a>
            </ol> --}}
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="card ml-2 mt-5 mb-5 mb-lg-10">
        <div class="row m-3">
            <form action="{{ route('product.state') }}" method="GET" class="p-3">
                {{-- @csrf --}}
                <label for="name" class="form-label">Search Product</label>
                <div class="row g-3">
                    <div class="col-12 col-md-4">
                        <div id="reportrange" class="form-control"
                            style="margin-top:40px ;background: #fff; cursor: pointer; padding: 5px 10px; color:#000; border: 1px solid #ccc; width: 100%">
                            <i class="fa fa-calendar"></i>&nbsp;
                            <span>
                                {{ request()->fromDate ? \Carbon\Carbon::parse(request()->fromDate)->format('M d, Y') : 'Start Date' }}
                                -
                                {{ request()->toDate ? \Carbon\Carbon::parse(request()->toDate)->format('M d, Y') : 'End Date' }}
                            </span>
                            <i class="fa-solid fa-caret-down"></i>
                        </div>

                        <!-- Hidden form to send the date range -->
                        <form id="dateForm" method="GET" action="{{ url()->current() }}">
                            <input type="hidden" class="form-control" name="fromDate" id="fromDate"
                                value="{{ request()->fromDate }}" />
                            <input type="hidden" class="form-control" name="toDate" id="toDate"
                                value="{{ request()->toDate }}" />
                        </form>

                        <script type="text/javascript">
                            $(function() {
                                var start = moment().subtract(29, 'days');
                                var end = moment();

                                // Use existing values if they exist
                                @if (request()->has('fromDate') && request()->has('toDate'))
                                    start = moment("{{ request()->fromDate }}");
                                    end = moment("{{ request()->toDate }}");
                                @endif

                                function cb(start, end) {
                                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                                    $('#fromDate').val(start.format('YYYY-MM-DD'));
                                    $('#toDate').val(end.format('YYYY-MM-DD'));
                                    $('#dateForm').submit(); // Auto-submit when date changes
                                }

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
                            });
                        </script>

                    </div>
                    {{-- <div class="col-12 col-md-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ request('name') }}"
                            placeholder="Search by name">
                    </div> --}}
                    {{-- <div class="col-12 col-md-3">
                        <label for="sku" class="form-label">SKU</label>
                        <input type="text" class="form-control" name="sku" placeholder="Search by SKU"
                            value="{{ request('sku') }}">

                    </div> --}}
                    <div class="col-12 col-md-2 ">
                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-primary mt-4">Search</button>
                            <a href="{{ route('product.state') }}" class="btn btn-dark mt-4 ms-2">Refresh</a>
                        </div>
                    </div>
                </div>
                {{-- <select class="form-select form-select-sm" name="sort_order" onchange="this.form.submit()">
                    <option value="">Sort by Total Spend</option>
                    <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>Ascending</option>
                    <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>Descending</option>
                </select> --}}
            </form>
        </div>
        <div class="card-body">
            <div class="mt-2">
                @include('layouts.partials.messages')
            </div>
            <div class="row">

                <div class="col-12">
                    <form action="{{ route('product.state.export') }}" method="post" style="float: right">
                        @csrf
                        <input type="hidden" name="ids" id="selectedProducts" value="">
                        <input type="hidden" name="fromDate" value="{{ $fromDate }}">
                        <input type="hidden" name="toDate" value="{{ $toDate }}">
                        <button type="submit" class="btn btn-sm btn-primary m-1">
                            <i class="fa fa-file-excel"></i> Report Export
                        </button>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <!--begin::Table-->
                <table id="myDataTable" class="table table-striped table-bordered">
                    <!--begin::Thead-->
                    <thead class="table-warning">
                        <tr style="background-color: #E4A11B !important;">
                            <th class="thClass custom-yellow"><input type="checkbox" id="selectAll"> No</th>
                            <th class="thClass custom-yellow">Product Name</th>
                            <th class="thClass custom-yellow">Product SKU</th>
                            <th class="thClass custom-yellow">Total Orders</th>
                            <th class="thClass custom-yellow">Total Quantities</th>
                            <th class="thClass custom-yellow">Total Spend</th>
                            <th class="thClass custom-yellow">Cost Per Sale</th>
                            <th class="thClass custom-yellow">Action</th>
                        </tr>
                    </thead>

                    <tbody class="fw-6 fw-semibold text-gray-600">
                        @php
                            $totalOrders = 0;
                            $totalQuantity = 0;
                            $totalSpend = 0;
                            $count = 0;
                        @endphp
                        @foreach ($products as $key => $product)
                            @php
                                $totalOrders += $product->total_orders;
                                $totalSpend += $product->total_spend;
                                $totalQuantity += $product->total_quantity;
                                $count++;
                                $cps = $product->total_orders > 0 ? $product->total_spend / $product->total_quantity : 0;
                            @endphp
                            <tr>
                                <th scope="row" class="tdClass">
                                    <input type="checkbox" class="product-checkbox" value="{{ $product->id }}">
                                    {{ $key + 1 }}
                                </th>
                                <td class="tdClass">
                                    @if ($product->type == 'product')
                                        <a href="{{ route('product.spands.index', ['product_id' => $product->id]) }}"
                                            style="text-decoration: none; color:#E4A11B;">
                                            {{ $product->name }}
                                        </a>
                                    @else
                                        <a href="{{ route('product.spands.index', ['bundle_id' => $product->id]) }}"
                                            style="text-decoration: none; color:#E4A11B;">
                                            {{ $product->name }}
                                        </a>
                                    @endif

                                </td>
                                <td class="tdClass">{{ $product->sku }}</td>
                                <td>{{ $product->total_orders }}</td>
                                <td>{{ $product->total_quantity }}</td>
                                <td>{{ number_format($product->total_spend, 2) }} AED</td>
                                <td>{{ number_format($cps, 2) }} AED</td>
                                <td>
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#spendModal" data-id="{{ $product->id }}"
                                        data-name="{{ $product->name }}" data-type="{{ $product->type }}">
                                        Add Spend
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                    <tfoot class="custom-yellow">
                        <tr style="background-color: #E4A11B;">
                            <td colspan="2" class="custom-yellow"><strong>Total Products:- {{ $count }}</strong>
                            </td>
                            <td class="custom-yellow"><strong>Average Per Product</strong></td>
                            <td class="custom-yellow"><strong>{{ $totalOrders }}</strong></td>
                             <td class="custom-yellow"><strong>{{ $totalQuantity }}</strong></td>
                            <td class="custom-yellow">
                                <strong>
                                    {{ ceil($totalSpend) }} AED
                                </strong>
                            </td>
                            <td class="custom-yellow"><strong>
                                    {{ number_format($totalOrders > 0 ? $totalSpend / $totalQuantity : 0, 2) }} AED
                                </strong></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>

                {{-- {{ $products->links() }} --}}
            </div>
            <!--end::Table wrapper-->
        </div>
        <!--end::Card body-->
    </div>

    <div class="modal fade" id="spendModal" tabindex="-1" aria-labelledby="spendModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="spendModalLabel">Add Total Spend</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="spendForm" action="{{ route('product-spands.store') }}" method="POST">
                        @csrf

                        <input type="hidden" name="type" id="modalType">
                        <input type="hidden" name="product_id" id="modalProductId">
                        <input type="hidden" name="bundle_id" id="modalBundleId">

                        <div class="mb-3">
                            <label for="modalProductName" class="form-label">Product/Bundle Name</label>
                            <input type="text" id="modalProductName" class="form-control" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="total_spand" class="form-label">Total Spend</label>
                            <input type="number" name="total_spand" id="total_spand" step="any"
                                class="form-control" required>
                            @error('total_spand')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="date_spend" class="form-label">Date Spend (Optional)</label>
                            <input type="date" name="date_spend" id="date_spend" class="form-control">
                            @error('date_spend')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="reason" class="form-label">Reason (Optional)</label>
                            <input type="text" name="reason" id="reason" class="form-control">
                            @error('reason')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var spendModal = document.getElementById("spendModal");

            spendModal.addEventListener("show.bs.modal", function(event) {
                var button = event.relatedTarget;
                var type = button.getAttribute("data-type"); // 'product' or 'bundle'
                var id = button.getAttribute("data-id");
                var name = button.getAttribute("data-name");

                document.getElementById("modalType").value = type;
                document.getElementById("modalProductName").value = name;

                if (type === "product") {
                    document.getElementById("modalProductId").value = id;
                    document.getElementById("modalBundleId").value = "";
                } else if (type === "bundle") {
                    document.getElementById("modalBundleId").value = id;
                    document.getElementById("modalProductId").value = "";
                }
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let checkboxes = document.querySelectorAll('.product-checkbox');
            let selectedIdsInput = document.getElementById('selectedProducts'); // Corrected ID
            let selectAll = document.getElementById('selectAll');

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    updateSelectedIds();
                });
            });

            selectAll.addEventListener('change', function() {
                checkboxes.forEach(checkbox => {
                    checkbox.checked = selectAll.checked;
                });
                updateSelectedIds();
            });

            function updateSelectedIds() {
                let selectedIds = Array.from(checkboxes)
                    .filter(i => i.checked)
                    .map(i => i.value)
                    .join(',');

                selectedIdsInput.value = selectedIds; // Ensuring the correct field gets updated
            }
        });
    </script>
    {{-- <script>
        $(document).ready(function() {
            var table = $('#myDataTable').DataTable({
                "pageLength": 50,
                "lengthMenu": [
                    [50, 100, 200, -1],
                    [50, 100, 200, "All"]
                ],
                "ordering": true,
                "searching": true,
                "paging": true,
                "responsive": true
            });

            // Function to update footer values
            function updateFooter() {
                var totalOrders = 0;
                var totalSpend = 0;
                var totalCps = 0;

                // Loop through visible rows and calculate totals
                table.rows({
                    search: 'applied'
                }).every(function() {
                    var row = $(this.node());
                    totalOrders += parseInt(row.find('td:eq(2)').text()) || 0; // Total Orders Column
                    totalSpend += parseFloat(row.find('td:eq(3)').text().replace(/[^0-9.-]+/g, "")) ||
                        0; // Total Spend Column
                    totalCps += parseFloat(row.find('td:eq(4)').text().replace(/[^0-9.-]+/g, "")) ||
                        0; // Cost Per Sale Column
                });

                // Update footer
                $('tfoot tr td:eq(1)').text(totalOrders);
                $('tfoot tr td:eq(2)').text(totalSpend.toFixed(2) + ' OMR');
                $('tfoot tr td:eq(3)').text(totalCps.toFixed(2) + ' OMR');
            }

            // Update footer on search, filter, or pagination
            table.on('draw', function() {
                updateFooter();
            });

            // Initial footer update
            updateFooter();
        });
    </script> --}}
@endsection
