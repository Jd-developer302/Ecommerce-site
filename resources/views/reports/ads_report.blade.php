@extends('layouts.master')

@section('content')
    <script src="{{ asset('assetst/js/jquery.min.js') }}"></script>
    <div class="page-header">
        <h1 class="page-title">Ads Report</h1>
    </div>
    <!-- PAGE HEADER END -->
    <div class="card">
        <form action="{{ route('ads_report.index') }}" method="GET">
            <div class="row m-5">
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                    <label for="order_id">Order Id</label>
                    <input type="text" name="order_id" class="form-control" placeholder="Order ID"
                        value="{{ request('order_id') }}">
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                    <label for="order_id">Product Code</label>
                    <input type="text" name="product_code" class="form-control" placeholder="Product Code"
                        value="{{ request('product_code') }}">
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                    <label for="order_id">SKU Code</label>
                    <input type="text" name="sku_code" class="form-control" placeholder="SKU Code"
                        value="{{ request('sku_code') }}">
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12 mt-3">
                    <label for="order_id">Start Date</label>
                    <input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}">
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12 mt-3">
                    <label for="order_id">End Date</label>
                    <input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}">
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12 mt-3">
                    <div class="d-flex">
                        <button type="submit" class="btn btn-primary mt-5">Search</button>
                        <a href="{{ route('ads_report.index') }}" class="btn btn-dark mt-5 ms-2">Reset</a>
                    </div>
                </div>
            </div>
        </form>
        <div class="card-body">
            <form action="{{ route('ads_report.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <h3 class="card-title">Upload Meta Ads Excel</h3>
                    <input type="file" name="file" class="form-control" id="file" required>
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>

            <h3 class="mt-3">Ads Report Details</h3>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr style="background-color: #E4A11B; color: white;">
                            <th>Order ID</th>
                            <th>Product Code</th>
                            <th>SKU Code</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Delivery Charge</th>
                            <th>Daily Spend</th>
                            <th>CPS</th>
                            <th>Cancellations</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($adsReports as $report)
                            <tr>
                                <td>{{ $report->order_id }}</td>
                                <td>{{ $report->product_code }}</td>
                                <td>{{ $report->sku_code }}</td>
                                <td>{{ $report->product_name }}</td>
                                <td>{{ $report->quantity }}</td>
                                <td>{{ $report->product_total_price }}</td>
                                <td>{{ $report->delivery_charge }}</td>
                                <td>{{ $report->daily_spend }}</td>
                                <td>{{ $report->quantity > 0 ? $report->product_total_price / $report->quantity : 'N/A' }}
                                </td> <!-- CPS Calculation -->
                                <td>{{ $report->cancellations ?? 'N/A' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
