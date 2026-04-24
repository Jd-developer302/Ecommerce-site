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
        <h1 class="page-title">Order Details</h1>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="card p-10">
        <div class="card-body">
            {{-- @php
                    $courier = 0;
                    if ($order->amount < 250) {
                        if ($order->delivery_type == 'ship') {
                            $courier = 25;
                        }
                    }
                @endphp --}}
            <div>
                <p><b>Order Id:</b> #{{ $order->order_id }}</p>
            </div>
            <div>
                <p><b>Name:</b> {{ $order->name }}</p>
            </div>
            <div>
                <p><b>Email:</b> {{ $order->email }}</p>
            </div>
            <div>
                <p><b>Phone:</b> {{ $order->areacode }} {{ $order->phone }}</p>
            </div>
            <div>
                <p><b>Whatsapp:</b> {{ $order->areacode }} {{ $order->whatsapp }}</p>
            </div>
            <div>
                <p><b>Source:</b> {{ $order->source }}</p>
            </div>
            <div>
                <p><b>Emirate:</b> {{ $order->city }}</p>
            </div>
            <div>
                <p><b>Address:</b> {{ $order->address }}</p>
            </div>
            <div>
                <p><b>Comment:</b> {{ $order->comment }}</p>
            </div>
            <div>
                <p><b>Payment Method</b> {{ @$order->payment_method }}</p>
            </div>
            <div>
                <p><b>Payment Status</b> {{ @$order->payment_status }}</p>
            </div>
            <div>
                <p><b>Trans Id</b> {{ @is_null($order->transaction) ? '' : $order->transaction->transaction_id }}</p>
            </div>
            <div>
                <p><b>Status:</b> <button class="btn btn-primary btn-sm">{{ $order->status }}</button>
                    @if ($is_crm)
                        <a href="{{ route('orders.changeStatus', $order->id) }}" class="btn btn-success btn-sm"
                            style="border-radius: 12px;">Change Status</a>
                    @endif
                </p>
                {{-- <form action="{{ route('orders.status') }}" method="post">
                    @csrf
                    <select name="status" id="status" class="form-control" required>
                        <option value="" selected>-- select --</option>
                        <option value="ORDER ON REVIEW">ORDER ON REVIEW</option>
                        <option value="ORDER CONFIRMED">ORDER CONFIRMED</option>
                        @can('order-status')
                            <option value="INVOICE PRINTED">INVOICE PRINTED</option>
                            <option value="PACKED">PACKED</option>
                            <option value="ASSIGNED TO RIDER">ASSIGNED TO RIDER</option>
                            <option value="ACCEPTED FROM DRIVER">ACCEPTED FROM DRIVER</option>
                            <option value="RESHEDULED">RESHEDULED</option>
                            <option value="DELIVERED">DELIVERED</option>
                            <option value="CANCELLED">CANCELLED</option>
                            <option value="NO ANSWER">NO ANSWER</option>
                        @endcan
                    </select>
                    <input type="hidden" name="order_id" value="{{ $order->order_id }}">
                    <input type="hidden" name="id" value="{{ $order->id }}">
                    <br>
                    <button type="submit" class="btn btn-success">Change status</button>
                </form> --}}
            </div>
            {{-- <div>
                <p><b>Total Amount:</b> {{ $order->total_price }}</p>
            </div>
            <div>
                <p><b>Delivery Charge:</b> {{ $order->delivery_charge }}</p>
            </div> --}}
            {{-- <div>
                    <p><b>Transaction Id:</b> {{ $order->trans_id }}</p>
                </div> --}}
            <h4>Products</h4>
            <!--begin::Table-->
            <table class="tableClass table table-bordered">
                <!--begin::Thead-->
                <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                    <tr style="background-color: #E4A11B;">
                        <th class="thClass">#</th>
                        <th class="thClass">Product</th>
                        <th class="thClass">Quantity</th>
                        <th class="thClass">Price</th>
                        <th class="thClass">Total(incl. vat)</th>
                        <th class="thClass">Payment </th>
                    </tr>
                </thead>
                <!--end::Thead-->
                <!--begin::Tbody-->
                <tbody style="text-align: right" class="fw-6 fw-semibold text-gray-600">
                    @foreach ($products as $index => $product)
                        <tr>
                            <td class="tdClass" scope="row">{{ $index + 1 }}</td>
                            <td class="tdClass"><img src="{{ URL::asset('image/' . $product->image) }}" alt="product"
                                    width="50px"><br>{{ $product->pname }}
                            </td>
                            <td class="tdClass">{{ $product->quantity }}</td>
                            <td class="tdClass">{{ $product->price }}</td>
                            <td class="tdClass">{{ $product->sub_price }}</td>
                            <td class="tdClass">
                                {{ @$product->payment_status }}<br>{{ @is_null($order->transaction) ? '' : $order->transaction->transaction_id }}
                            </td>

                        </tr>
                    @endforeach
                    @foreach ($bundles as $index1 => $bunlde)
                        <tr>
                            <th scope="row" class="tdClass">{{ $index1 + count($products) + 1 }}</th>
                            <td class="tdClass"><img src="{{ URL::asset('image/' . $bunlde->image) }}" alt="product"
                                    width="50px"><br>{{ $bunlde->bname }}
                            </td>
                            <td class="tdClass">{{ $bunlde->quantity }}</td>
                            <td class="tdClass">{{ $bunlde->price }}</td>
                            <td class="tdClass">{{ $bunlde->sub_price }}</td>
                            <td class="tdClass">
                                {{ @$product->payment_status }}<br>{{ @is_null($order->transaction) ? '' : $order->transaction->transaction_id }}
                            </td>
                        </tr>
                    @endforeach
                    @php
                        $cp = 0;
                    @endphp
                    @if ($order->coupon_price != null)
                        @php
                            $cp = $order->coupon_price;
                        @endphp
                    @endif
                    <tr>
                        <td class="tdClass" colspan="2"><b>Total Quantities: </b></th>
                        <td class="tdClass"><b>{{ $order->total_qty }}</b></td>
                        <td class="tdClass"><b>Sub Total Amount: </b></th>
                        <td class="tdClass">
                            <b>{{ round(($order->total_price + $cp - $order->delivery_charge - $order->total_vat) * 2) / 2 }}</b>
                        </td>
                    </tr>
                    <tr>
                        <td class="tdClass" colspan="4" style="text-align: right"><b>Total Vat: </b></th>
                        <td class="tdClass"><b>{{ $order->total_vat }}</b></td>
                    </tr>
                    <tr>
                        <td class="tdClass" colspan="4" style="text-align: right"><b>Delivery Charge: </b></th>
                        <td class="tdClass"><b>{{ $order->delivery_charge }}</b></td>
                    </tr>
                    <tr>
                        <td class="tdClass" colspan="4" style="text-align: right"><b>Coupon amount: </b></th>
                        <td class="tdClass">
                            @if ($order->coupon_price != null)
                                {{ $order->coupon_price }}
                            @else
                                <b>Coupon Not applied</b>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="tdClass" colspan="4" style="text-align: right"><b>Total Price: </b></th>
                        <td class="tdClass"><b>{{ $order->total_price }}</b></td>
                    </tr>
                </tbody>
                <!--end::Tbody-->
            </table>
            <div class="mt-4 mb-4">
                @if ($order->status == 'ORDER PLACED' || $order->status == 'TO BE CONFORMED' || $order->status == 'ORDER CONFIRMED')
                    @if ($is_crm)
                        <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-primary">Edit</a>
                    @endif
                @endif
                <a href="{{ route('orders.index') }}" class="btn btn-dark">Back</a>
            </div>
            <br>
            <div class="row">
                <div class="col-6">
                    <h4>Order updated history</h4>
                    <table class="tableClass table table-bordered">
                        <!--begin::Thead-->
                        <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                            <tr style="background-color: #E4A11B;">
                                <th class="thClass">Status</th>
                                <th class="thClass">Comment</th>
                                <th class="thClass">Changed By</th>
                                <th class="thClass">Date Time</th>
                            </tr>
                        </thead>
                        <tbody class="fw-6 fw-semibold text-gray-600">
                            @foreach ($history as $his)
                                <tr>
                                    <td class="tdClass"><button
                                            class="btn btn-sm {{ getClass($his->status) }}">{{ $his->status }}</button>
                                    </td>
                                    <td class="tdClass">{{ $his->comment }}</td>
                                    <td class="tdClass">{{ $his->changed_by }}</td>
                                    <td class="tdClass">{{ $his->created_at }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-6">
                    <h4>Previous Orders</h4>
                    <div class="table-responsive">
                        <table id="zero_config" class="tableClass table table-bordered">
                            <thead>
                                <tr style="background-color: #E4A11B;">
                                    <th class="thClass">Order No</th>
                                    <th class="thClass">Status</th>
                                    <th class="thClass">Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($previous as $item)
                                    <tr>
                                        <td class="tdClass" scope="row">
                                            <a href="{{ route('orders.show', $item->id) }}"
                                                target="_blank">{{ $item->order_id }}</a>
                                        </td>
                                        <td class="tdClass">
                                            <button
                                                class="btn btn-sm {{ getClass($item->status) }}">{{ $item->status }}</button>
                                        </td>
                                        <td class="tdClass">{{ $item->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
