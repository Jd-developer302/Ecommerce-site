@extends('layouts.app-master')

@section('content')
    <div class="card ml-2 mt-5 mb-5 mb-lg-10">
        <!--begin::Card header-->
        <div class="card-toolbar">
            <form action="{{ route('assigned.status') }}" method="post" id="myForm">
                @csrf
                <input type="hidden" name="order_id" id="picked_order_id" value="{{ $order->order_id }}" class="form-control"
                    placeholder="scan for pickup ....">
                <label for="Status">Status</label>
                <select name="status" id="changeStatus" class="form-control" required>
                    <option value="">--select--</option>
                    <option value="DELIVERED">DELIVERED</option>
                    <option value="CANCELLED FOR AUTH">CANCELLED</option>
                    <option value="NO ANSWER FOR AUTH ">NO ANSWER</option>
                    <option value="RESHEDULED">RESHEDULED</option>
                </select>
                <div id="delivery_date">
                    <label for="date">Delivery Date</label>
                    <input type="date" name="delivery_date" class="form-control" required>
                </div>
                {{-- <button class="btn btn-sm btn-secondary" href=""><i class="fa fa-print"></i>
                Invoice</button> --}}
            </form>
        </div>
        <div id="qr-reader" style="width: 350px"></div>
        <div class="card-header">
            <!--begin::Heading-->
            <div class="card-title">
                <h3>Order Details</h3>
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
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
                    <table class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9">
                        <!--begin::Thead-->
                        <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                            <tr>
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
                                   <td class="tdClass"><img src="{{ URL::asset('image/' . $product->image) }}" alt="product"
                                            width="50px"><br>{{ $product->name }}
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
    <script src="https://unpkg.com/html5-qrcode"></script>
    <script>
        $(document).ready(function() {
            $("#delivery_date").hide();
            $("input").prop('required', false);
            $("#changeStatus").change(function() {
                var changeStatus = $("select#changeStatus").val();
                if (changeStatus == 'RESHEDULED') {
                    $("#delivery_date").show();
                    $("input").prop('required', true);
                } else {
                    $("#delivery_date").hide();
                    $("input").prop('required', false);
                }

            });
            // var order_id = <?= $order->order_id ?>;
            var order_id = $('#picked_order_id').val();
            //var changeStatus = $('#changeStatus').val();
            //var changeStatus = $("#changeStatus option:selected").val();
            // $("#changeStatus").change(function() {
            //     var changeStatus=$("select#changeStatus").val();
            //     console.log(changeStatus);
            //     //var changeStatus=$(this).val();
            // });


            function onScanSuccess(decodedText, decodedResult) {
                // alert(`Code scanned = ${decodedText}`, decodedResult);
                $("#changeStatus").change(function() {
                    var changeStatus = $("select#changeStatus").val();
                    //console.log(changeStatus);
                    //var changeStatus=$(this).val();
                });
                // alert(changeStatus);
                //$("#picked_order_id").val(decodedText);
                if (changeStatus == "") {
                    alert('Select Status');
                } else {
                    if (order_id == decodedText) {
                        document.getElementById("myForm").submit();
                    } else {
                        alert('please scan correct package');
                    }
                }
            }
            var html5QrcodeScanner = new Html5QrcodeScanner(
                "qr-reader", {
                    fps: 10,
                    qrbox: 250
                });
            html5QrcodeScanner.render(onScanSuccess);

        });
    </script>
@endsection
