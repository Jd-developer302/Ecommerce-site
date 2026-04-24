@extends('layouts.master')

@section('content')
    <script src="{{ asset('assetst/js/jquery.min.js') }}"></script>
    <div class="page-header">
        <h1 class="page-title">RMA Order Detail</h1>
    </div>
    <div class="container-fluid mt-5">
        <div class="card">
            <div class="card-header" style="background-color: #E4A11B;color:#fff;">
                <h5 class="card-title">Customer Details</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-6">
                        <p><strong>Name: </strong>{{ $rma->order->name }}</p>
                        <p><strong>Phone: </strong> {{ $rma->order?->phone }}</p>
                    </div>
                    <div class="col-6 text-end">
                        <h5><strong>RMA No:</strong> {{ $rma->order->order_id }}</h5>
                        <p><strong>Date:</strong> {{ $rma->created_at }}</p>
                    </div>
                </div>

                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr style="background-color: #E4A11B;">
                            <th>Product</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                               <strong>Product Name:-</strong> {{ $rma->product->name }}
                                <br><br>
                                @if ($rma->product?->image)
                                    <img src="{{ asset('image/' . $rma->product->image) }}" alt="Product Image"
                                        style="width: 100px; height: auto;">
                                @else
                                    <span>No Image Available</span>
                                @endif
                                <br><br>
                               <strong> Product Description:-</strong>  {!! $rma->product->description !!}
                            </td>
                            <td>{{ $rma->order?->total_qty }}</td>
                        </tr>
                    </tbody>
                </table>

                <table class="table">
                    <tbody>
                        <tr>
                            <td><strong>Delivery Charge</strong></td>
                            <td class="text-end">{{ $rma->order?->delivery_charge }}</td>
                        </tr>
                        <tr>
                            <td><strong>Total</strong></td>
                            <td class="text-end"><strong>{{ $rma->order?->total_price }}</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
