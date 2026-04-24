@extends('layouts.master')

@section('content')
    <script src="{{ asset('assetst/js/jquery.min.js') }}"></script>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Rma Order Details</h1>
    </div>
    <!-- PAGE-HEADER END -->
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
                    <p><b>Order Id:</b> #{{ $rma->order_id }}</p>
                </div>
                <div>
                    <p><b>Name:</b> {{ $rma->name }}</p>
                </div>
                <div>
                    <p><b>Email:</b> {{ $rma->email }}</p>
                </div>
                <div>
                    <p><b>Phone:</b> {{ $rma->phone }}</p>
                </div>
                <div>
                    <p><b>City:</b> {{ $rma->city }}</p>
                </div>
                <div>
                    <p><b>Address:</b> {{ $rma->address }}</p>
                </div>
                <div>
                    <p><b>Comment:</b> {{ $rma->comment }}</p>
                </div>
                <div>
                    <p><b>Status:</b> <button class="btn btn-primary btn-sm">{{ $rma->status }}</button></p>
                </div>
                @if ($rma->status != 'REPLICATED')
                    <div>
                        <form action="{{ route('assignedrma.status') }}" method="post">
                            @csrf
                            <input type="hidden" name="order_id" id="picked_order_id" value="{{ $rma->order_id }}"
                                class="form-control" placeholder="scan for pickup ....">
                            <label for="Status">Status</label>
                            <select name="status" id="changeStatus" class="form-control m-2" required>
                                <option value="">--select--</option>
                                @if (
                                    $rma->status == 'RMA' ||
                                        $rma->status == 'TO BE CONFIRMED' ||
                                        $rma->status == 'rma CONFIRMED' ||
                                        $rma->status == 'ATTENDED' ||
                                        $rma->status == 'OUT FOR DELIVERY' ||
                                        $rma->status == 'PICKEDUP' ||
                                        $rma->status == 'RESCHEDULE')
                                    <option value="CANCELLED">CANCELLED</option>
                                    <option value="RESCHEDULE">RESCHEDULE</option>
                                @endif
                                @if ($rma->status == 'RMA' || $rma->status == 'TO BE CONFIRMED' || $rma->status == 'ORDER CONFIRMED')
                                    <option value="ORDER CONFIRMED">ORDER CONFIRMED</option>
                                    <option value="TO BE CONFIRMED">TO BE CONFIRMED</option>
                                @endif
                                {{-- <option value="NO ANSWER">NO ANSWER</option> --}}
                                {{-- <option value="TO BE CONFIRMED">TO BE CONFIRMED</option> --}}
                                @if (
                                    $rma->status == 'PICKEDUP' ||
                                        $rma->status == 'OUT FOR DELIVERY' ||
                                        $rma->status == 'ATTENDED' ||
                                        $rma->status == 'CANCELLED')
                                    <option value="DELIVERED">DELIVERED</option>
                                    <option value="OUT FOR DELIVERY">OUT FOR DELIVERY</option>
                                    <option value="ORDER CONFIRMED">ORDER CONFIRMED</option>
                                @endif
                                @if ($rma->status == 'OUT FOR DELIVERY' || $rma->status == 'ATTENDED')
                                    <option value="ATTENDED">ATTENDED</option>
                                @endif
                                @if ($rma->status == 'CANCELLED FOR AUTH' || $rma->status == 'NO ANSWER FOR AUTH')
                                    <option value="ATTENDED">ATTENDED</option>
                                    <option value="CANCELLED">CANCELLED</option>
                                    <option value="RESCHEDULE">RESCHEDULE</option>
                                @endif
                                {{-- @if ($order->status == 'DELIVERED')
                                    <option value="RMA">RMA</option>
                                    <option value="ATTENDED">ATTENDED</option>
                                @endif --}}
                                @if ($rma->status == 'NO ANSWER')
                                    <option value="RMORDER CONFIRMED">ORDER CONFIRMED</option>
                                @endif
                                @if ($rma->status == 'RESCHEDULE')
                                    <option value="RTO">RTO</option>
                                @endif

                                @if ($rma->status == 'RTO')
                                    <option value="CANCELLED">CANCELLED</option>
                                @endif
                                {{-- <option value="CUSTOMER AVAILABLE">CUSTOMER AVAILABLE</option> --}}
                            </select>
                            <textarea name="comment" id="comment" class="form-control m-2" cols="30" rows="10" required
                                placeholder="Enter reason" style="display: none;"></textarea>
                            <div id="delivery_date">
                                <label for="date">Delivery Date</label>
                                <input type="date" name="delivery_date" class="form-control" required>
                            </div>
                            <button class="btn btn-sm btn-dark mt-2 mb-5">
                                Change</button>
                        </form>
                    </div>
                @endif
                <div>
                    <p><b>Total Amount:</b> {{ $rma->total_price }}</p>
                </div>
                <div>
                    <p><b>Delivery Charge:</b> {{ $rma->delivery_charge }}</p>
                </div>
                {{-- <div>
                    <p><b>Transaction Id:</b> {{ $rma->trans_id }}</p>
                </div> --}}
                <h4>Products</h4>
                <div class="table-responsive">
                    <table class="table table-flush align-middle table-bordered table-row-solid gy-4 gs-9">
                        <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                            <tr style="background-color: #E4A11B;">
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
                                {{ $product->name }}
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
                                <td class="tdClass"><b>{{ $rma->total_qty }}</b></td>
                                <th scope="row" class="tdClass"><b>Sub Total Amount: </b></th>
                                <td class="tdClass"><b>{{ $rma->total_price }}</b></td>
                            </tr>
                        </tbody>
                        <!--end::Tbody-->
                    </table>
                    <!--end::Table-->
                </div>
                {{-- <h4>Notes</h4>
                <p>Delivery note : {{ $rma->note }}</p>
                <img src="{{ URL::asset('delivery_note/' . $rma->note_image) }}" alt="note" width="300px">
                <div class="mt-4 mb-4">
                    <a href="{{ route('orders.note', $rma->id) }}" class="btn btn-info">Add / Edit Note</a>
                </div> --}}
                <br>
            </div>
            {{-- <div class="mt-4 mb-4">
                <a href="{{ route('drivers.index', $rma->id) }}" class="btn btn-info">Back</a>
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
