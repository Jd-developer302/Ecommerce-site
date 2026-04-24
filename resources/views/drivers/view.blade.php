@extends('layouts.master')

@section('content')
 <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Order Details</h1>
    </div>
    <!-- PAGE-HEADER END -->
<script src="{{asset('assetst/js/jquery.min.js')}}"></script>
    <div class="card ml-2 mt-5 mb-5 mb-lg-10">
        <div class="card-body">
            <div class="p-3 mt-4">
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
                    <p><b>Phone:</b> {{ $order->phone }}</p>
                </div>
                <div>
                    <p><b>City:</b> {{ $order->city }}</p>
                </div>
                <div>
                    <p><b>Address:</b> {{ $order->address }}</p>
                </div>
                <div>
                    <p><b>Comment:</b> {{ $order->comment }}</p>
                </div>
                <div>
                    <p><b>Status:</b> <button class="btn btn-primary btn-sm">{{ $order->status }}</button></p>
                </div>
                <div>
                    <form action="{{ route('assigned.status') }}" method="post">
                        @csrf
                        <input type="hidden" name="order_id" id="picked_order_id" value="{{ $order->order_id }}"
                            class="form-control" placeholder="scan for pickup ....">
                        <label for="Status">Status</label>
                        <select name="status" id="changeStatus" class="form-control m-2" required>
                            <option value="">--select--</option>
                            @if (
                                $order->status == 'ORDER PLACED' ||
                                    $order->status == 'TO BE CONFORMED' ||
                                    $order->status == 'ORDER CONFIRMED' ||
                                    $order->status == 'ATTENTED' ||
                                    $order->status == 'OUT FOR DELIVERY' ||
                                    $order->status == 'PICKEDUP' ||
                                    $order->status == 'RESHEDULED')
                                <option value="CANCELLED">CANCELLED</option>
                                <option value="RESHEDULED">RESHEDULED</option>
                            @endif
                            {{-- <option value="NO ANSWER">NO ANSWER</option> --}}
                            @if ($order->status == 'ORDER PLACED' || $order->status == 'TO BE CONFORMED' || $order->status == 'ORDER CONFIRMED')
                                <option value="ORDER CONFIRMED">ORDER CONFIRMED</option>
                                <option value="TO BE CONFORMED">TO BE CONFORMED</option>
                            @endif
                            @if (
                                $order->status == 'PICKEDUP' ||
                                    $order->status == 'OUT FOR DELIVERY' ||
                                    $order->status == 'ATTENTED' ||
                                    $order->status == 'CANCELLED' ||
                                    $order->status == 'RESHEDULED')
                                <option value="DELIVERED">DELIVERED</option>
                                <option value="OUT FOR DELIVERY">OUT FOR DELIVERY</option>
                            @endif
                            @if ($order->status == 'OUT FOR DELIVERY' || $order->status == 'ATTENTED')
                                <option value="ATTENTED">ATTENTED</option>
                            @endif
                            @if ($order->status == 'DELIVERED')
                                <option value="RMA">RMA</option>
                                <option value="ATTENTED">ATTENTED</option>
                            @endif
                            @if ($order->status == 'CANCELLED FOR AUTH' || $order->status == 'NO ANSWER FOR AUTH')
                                <option value="ATTENTED">ATTENTED</option>
                                <option value="CANCELLED">CANCELLED</option>
                                <option value="RESHEDULED">RESHEDULED</option>
                            @endif
                            {{-- <option value="CUSTOMER AVAILABLE">CUSTOMER AVAILABLE</option> --}}
                        </select>
                        <textarea name="comment" id="comment" class="form-control m-2" cols="30" rows="10" required
                            placeholder="Enter reason" style="display: none;"></textarea>
                        <div id="delivery_date">
                            <label for="date">Delivery Date</label>
                            <input type="date" name="delivery_date" class="form-control" required>
                        </div>
                        <button class="btn btn-sm btn-dark mb-5">
                            Change</button>
                    </form>
                </div>
                <div>
                    <p><b>Total Amount:</b> {{ $order->total_price }}</p>
                </div>
                <div>
                    <p><b>Delivery Charge:</b> {{ $order->delivery_charge }}</p>
                </div>
                {{-- <div>
                    <p><b>Transaction Id:</b> {{ $order->trans_id }}</p>
                </div> --}}
                <h4>Products</h4>
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table table-flush align-middle table-bordered table-row-solid gy-4 gs-9">
                        <!--begin::Thead-->
                        <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                            <tr  style="background-color: #E4A11B;">
                                <th class="thClass">#</th>
                                <th class="thClass">Product</th>
                                <th class="thClass">Quantity</th>
                                <th class="thClass">Price</th>
                                <th class="thClass">Total</th>
                            </tr>
                        </thead>
                        <!--end::Thead-->
                        <!--begin::Tbody-->
                        <tbody class="fw-6 fw-semibold text-gray-600">
                            @foreach ($products as $index => $product)
                                <tr>
                                    <th scope="row" class="tdClass">{{ $index + 1 }}</th>
                                    <td class="tdClass"><img src="{{ URL::asset('image/' . $product->image) }}"
                                            alt="product" width="50px"><br>{{ $product->name }}
                                    </td>
                                    <td class="tdClass">{{ $product->quantity }}</td>
                                    <td class="tdClass">{{ $product->price }}</td>
                                    <td class="tdClass">{{ $product->sub_price }}</td>

                                </tr>
                            @endforeach
                            <tr>
                                <th scope="row" colspan="2"><b>Total Quantities: </b></th>
                                <td class="tdClass"><b>{{ $order->total_qty }}</b></td>
                                <th scope="row" class="tdClass"><b>Sub Total Amount: </b></th>
                                <td class="tdClass"><b>{{ $order->total_price }}</b></td>
                            </tr>
                        </tbody>
                        <!--end::Tbody-->
                    </table>
                    <!--end::Table-->
                </div>
                {{-- <h4>Notes</h4>
                <p>Delivery note : {{ $order->note }}</p>
                <img src="{{ URL::asset('delivery_note/' . $order->note_image) }}" alt="note" width="300px">
                <div class="mt-4 mb-4">
                    <a href="{{ route('orders.note', $order->id) }}" class="btn btn-info">Add / Edit Note</a>
                </div> --}}
                <br>
            </div>
            {{-- <div class="mt-4 mb-4">
                <a href="{{ route('drivers.index', $order->id) }}" class="btn btn-info">Back</a>
                <a href="{{ redirect()->back(); }}">Back</a>
            </div> --}}
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#delivery_date").hide();
            $("input").prop('required', false);
            $('#comment').show().prop('required', true);
            $("#changeStatus").change(function() {
                var changeStatus = $("select#changeStatus").val();
                if (changeStatus == 'RESHEDULED') {
                    $("#delivery_date").show();
                    $("input").prop('required', true);
                } else {
                    $("#delivery_date").hide();
                    $("input").prop('required', false);
                }
                if (changeStatus == 'DELIVERED') {
                    $('#comment').hide().prop('required', false);
                }

            });

        });
    </script>
@endsection
