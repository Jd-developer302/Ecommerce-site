@extends('layouts.master')
@section('content')
    <script src="{{ asset('assetst/js/jquery.min.js') }}"></script>
    @php
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
        }
    @endphp
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Previous Orders</h1>
        <div>
            <ol class="breadcrumb">
                <a href="{{ route('orders.index') }}" class="btn btn-sm btn-primary my-1">Back</a>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="card mt-3 p-4">
        <div class="mb-3">
            <h5>Previous Orders</h5>
            <div class="table-responsive">
                <table id="zero_config" class="tableClass table table-bordered">
                    <thead>
                        <tr style="background-color: #E4A11B;">
                            <th class="thClass">Order No</th>
                            <th class="thClass">Name</th>
                            <th class="thClass">Phone</th>
                            <th class="thClass">Amount</th>
                            <th class="thClass">Status</th>
                            <th class="thClass">Created At</th>
                            <th class="thClass">Created By</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($previous as $item)
                            <tr>
                                <td class="tdClass" scope="row">
                                    <a href="{{ route('orders.show', $item->id) }}"
                                        target="_blank">{{ $item->order_id }}</a>
                                </td>
                                <td class="tdClass">{{ $item->name }}</td>
                                <td class="tdClass">{{ $item->phone }}</td>
                                <td class="tdClass">
                                    <div style="text-align: right;">{{ $item->total_price }} AED</div>
                                </td>
                                <td class="tdClass">
                                    <button class="btn btn-sm {{ getClass($item->status) }}">{{ $item->status }}</button>
                                </td>
                                <td class="tdClass">{{ $item->created_at }}</td>
                                <td class="tdClass">{{ $item->created_by }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
        <div class="card-header">
            <!--begin::Heading-->
            <div class="card-title">
                <h1>Edit Order</h1>
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        @if (\Session::has('error'))
            <div class="alert alert-danger">
                <ul>
                    <li>{!! \Session::get('error') !!}</li>
                </ul>
            </div>
        @endif
        <div class="card-body">
            <form method="POST" action="{{ route('orders.updateData') }}" enctype="multipart/form-data" class="test-form">
                @csrf
                <div class="mb-3">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <label for="phone" class="form-label">Customer Phone</label><br>
                    <div class="row">
                        {{-- <div class="col-1">
                            <select name="areacode" id="areacode" value="{{ $order->areacode }}" class="form-control"
                                required>
                                <option value="">Area Code</option>
                                <option value="050" {{ old('areacode', $order->areacode) == '050' ? 'selected' : '' }}>
                                    050</option>
                                <option value="052" {{ old('areacode', $order->areacode) == '052' ? 'selected' : '' }}>
                                    052</option>
                                <option value="054" {{ old('areacode', $order->areacode) == '054' ? 'selected' : '' }}>
                                    054</option>
                                <option value="055" {{ old('areacode', $order->areacode) == '055' ? 'selected' : '' }}>
                                    055</option>
                                <option value="056" {{ old('areacode', $order->areacode) == '056' ? 'selected' : '' }}>
                                    056</option>
                                <option value="058" {{ old('areacode', $order->areacode) == '058' ? 'selected' : '' }}>
                                    058</option>
                            </select>
                        </div> --}}
                        <div class="col-12">
                            <input value="{{ $order->phone }}" type="number" id="phone" class="form-control"
                                name="phone" placeholder="Phone" minlength="10" maxlength="10" required autofocus
                                oninput="enforceMaxLength(this)"">
                        </div>
                    </div>
                    <input type="hidden" name="order_id" value="{{ $order->order_id }}">

                    @if ($errors->has('phone'))
                        <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Customer Name</label>
                    <input type="text" id="name" class="form-control" name="name" value="{{ $order->name }}"
                        placeholder="Name" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Customer Email</label>
                    <input type="email" id="email" class="form-control" name="email" value="{{ $order->email }}"
                        placeholder="Email">

                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">Customer Emirate</label>
                    <select class="form-control" name="city" id="city" required>
                        <option value="">-Select-</option>
                        <option value="DUBAI" @if ('DUBAI' == $order->city) selected @endif>DUBAI</option>
                        <option value="ABU DHABI" @if ('ABU DHABI' == $order->city) selected @endif>ABU DHABI
                        </option>
                        <option value="SHARJAH" @if ('SHARJAH' == $order->city) selected @endif>SHARJAH</option>
                        <option value="AJMAN" @if ('AJMAN' == $order->city) selected @endif>AJMAN</option>
                        <option value="RAK" @if ('RAK' == $order->city) selected @endif>RAK</option>
                        <option value="FUJAIRAH" @if ('FUJAIRAH' == $order->city) selected @endif>FUJAIRAH</option>
                        <option value="UMM AL QUWAIN" @if ('UMM AL QUWAIN' == $order->city) selected @endif>UMM AL QUWAIN
                        </option>
                        <option value="AL AIN" @if ('AL AIN' == $order->city) selected @endif>AL AIN</option>
                    </select>

                    @if ($errors->has('city'))
                        <span class="text-danger text-left">{{ $errors->first('city') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="source" class="form-label">Source</label>
                    <select class="form-control" name="source" id="source" required>
                        <option value="">-Select-</option>
                        <option value="Website" @if ('Website' == $order->source) selected @endif>Website</option>
                        <option value="Message" @if ('Message' == $order->source) selected @endif>Message</option>
                        <option value="Leads" @if ('Leads' == $order->source) selected @endif>Leads</option>
                    </select>
                    @if ($errors->has('source'))
                        <span class="text-danger text-left">{{ $errors->first('source') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Customer Address</label>
                    <textarea type="text" id="address" class="form-control" name="address" value="{{ $order->address }}"
                        placeholder="Address" required>{{ $order->address }}</textarea>

                    @if ($errors->has('address'))
                        <span class="text-danger text-left">{{ $errors->first('address') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <div class="row">
                        <div class="col-6"><input value="{{ $order->lat }}" type="number" id="lat"
                                class="form-control" name="lat" placeholder="Latitude"></div>
                        <div class="col-6"><input value="{{ $order->long }}" type="number" id="long"
                                class="form-control" name="long" placeholder="Longitude"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Products</label>
                    <div class="table-responsive">
                        <table class="tableClass" id="dynamicAddRemove">
                            <tr>
                                <th class="thClass" align='center'>Sku</td>
                                <th class="thClass" align='center'>Name</td>
                                <th class="thClass" align='center'>Unit Price</td>
                                <th class="thClass" align='center'>Quantity</td>
                                    {{-- <td class="tdClass" align='center'>Vat</td> --}}
                                <th class="thClass" align='center'>Amount</td>
                                <th class="thClass" align='center'>Action</td>
                            </tr>
                            @foreach ($order_linesp as $item)
                                <tr>
                                    <td class="tdClass">{{ $item->sku }}</td>
                                    <td class="tdClass"><img src="{{ URL::asset('image/' . $item->image) }}"
                                            alt="product" width="50px"><br>{{ $item->pname }}
                                    </td>
                                    <td class="tdClass">{{ $item->price }}</td>
                                    <td class="tdClass">{{ $item->quantity }}</td>
                                    <td class="tdClass">{{ $item->sub_price }}</td>
                                    <td class="tdClass"><a href="{{ route('delete.cartitem', [$item->id, $order->id]) }}"
                                            type="button"
                                            class="btn btn-outline-danger remove-input-field">Delete</button></a>
                                </tr>
                            @endforeach
                            @foreach ($order_linesb as $item)
                                <tr>
                                    <td class="tdClass">{{ $item->sku }}</td>
                                    <td class="tdClass"><img src="{{ URL::asset('image/' . $item->image) }}"
                                            alt="product" width="50px"><br>{{ $item->bname }}
                                    </td>
                                    <td class="tdClass">{{ $item->quantity }}</td>
                                    <td class="tdClass">{{ $item->price }}</td>
                                    <td class="tdClass">{{ $item->sub_price }}</td>
                                    <td class="tdClass"><a href="{{ route('delete.cartitem', [$item->id, $order->id]) }}"
                                            type="button"
                                            class="btn btn-outline-danger remove-input-field">Delete</button></a>
                                </tr>
                            @endforeach



                            <button type="button" name="add" id="dynamic-ar" class="btn btn-primary btn-sm m-1">Add
                                Product</button>
                            <button type="button" name="add" id="dynamic-ar1" class="btn btn-dark btn-sm m-1">Add
                                Bundle</button>
                        </table>
                        <table>
                            <tr>
                                <td class="tdClass" width="90%">Sub Total</td>
                                <td class="tdClass"><input type="text" name="sub_total" id="sub-total"
                                        class="sub-total form-control"
                                        value="{{ round(($order->total_price - $order->delivery_charge - $order->total_vat) * 2) / 2 }}"
                                        readonly></td>
                            </tr>
                            <tr>
                                <td class="tdClass" width="90%">Vat</td>
                                <td class="tdClass"><input type="text" name="total_vat" id="total-vat"
                                        class="form-control" value="{{ $order->total_vat }}" readonly></td>
                            </tr>
                            <tr>
                                <td class="tdClass" width="90%">Delivery Charge</td>
                                <td class="tdClass"><input type="text" name="delivery_charge" id="delivery-charge"
                                        class="form-control" value="{{ $order->delivery_charge }}" readonly></td>
                            </tr>
                            <tr>
                                <td class="tdClass" width="90%">Total Price</td>
                                <td class="tdClass"><input type="text" name="total_sum"
                                        class="total-sum form-control" value="{{ $order->total_price }}" readonly></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="comment" class="form-label">Comment / Remarks</label>
                    <textarea value="{{ $order->comment }}" type="text" class="form-control" name="comment" placeholder="Comment">{{ $order->comment }}</textarea>

                    @if ($errors->has('comment'))
                        <span class="text-danger text-left">{{ $errors->first('comment') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="coupon">Coupon Code</label>
                    <div class="row">
                        <input type="text" value="{{ $order->coupon_code }}" name="coupon_code"
                            class="col-7 form-control" placeholder="Coupon code" id="coupon_code" style="width:70%">
                        {{-- <select name="coupon_code" id="coupon_code" class="form-control">
                            <option value="">Select coupon</option>
                            @foreach ($coupons as $item)
                                <option value="{{ $item->code }}" @if ($item->code == $order->coupon_code) selected @endif>
                                    {{ $item->code }}</option>
                            @endforeach
                        </select> --}}
                        @if ($order->coupon_code == '')
                            <a class="btn btn-dark col-3" id="couponApply" style="color:#fff">Apply</a>
                            @php
                                $isApplied = 0;
                            @endphp
                        @else
                            @php
                                $isApplied = 1;
                            @endphp
                        @endif

                        <input type="hidden" name="is_coupon_applied" id="is_coupon_applied"
                            value="{{ $isApplied }}">
                        <input type="hidden"name="coupon_price" id="coupon_price" value="{{ $order->coupon_price }}">
                        <input type="hidden" name="coupon_id" id="coupon_id" value="{{ $order->coupon_id }}">
                    </div>

                </div>

                <br>

                <button type="submit" class="btn btn-primary">Place Order</button>
                <a href="{{ route('orders.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script type="text/javascript">
            var i = 0;
            var push = 0;
            $("#prevOrder").hide();
            var options = "<option>--select product--</option>";
            var options1 = "<option>--select product--</option>";
            var products = <?= $products ?>;
            var bundles = <?= $bundles ?>;
            for (i = 0; i < products.length; i++) {
                options = options + "<option value=" + products[i]['id'] + " data-price=" + products[i]['price'] +
                    " data-deliverycharge=" + products[i]['delivery_charge'] +
                    " data-sku=" + products[i]['sku'] +
                    " data-name=" + products[i]['name'] + ">" + products[i]['name'] + "</option>";
            }
            for (i = 0; i < bundles.length; i++) {
                options1 = options1 + "<option value=" + bundles[i]['id'] + " data-price=" + bundles[i]['price'] +
                    " data-deliverycharge=" + products[i]['delivery_charge'] +
                    " data-sku=" + bundles[i]['sku'] +
                    " data-name=" + bundles[i]['name'] + ">" + bundles[i]['name'] + "</option>";
            }
            // Iterate over object and add options to select

            var j = -1;
            $("#dynamic-ar").click(function() {
                ++j;
                $("#dynamicAddRemove").append(
                    '<tr><td class="tdClass"  align="center"><input type="text" name="orderline[' + j +
                    '][sku]" id="sku" class="form-control sku">' +
                    '<td class="tdClass"  align="center" width="20%"><select name="orderline[' +
                    j +
                    '][product_id]" id="productid" class="mySelect js-example-basic-single form-control" required>' +
                    options +
                    ' </select></td><td class="tdClass" align="center"><input type="text" name="orderline[' + j +
                    '][price]" placeholder="Enter Price" value="" class="form-control unit-price" readonly/><input type="hidden" name="orderline[' +
                    j +
                    '][name]" placeholder="Enter Price" value="" class="form-control product-name"/><input type="hidden"  value="" class="form-control delivery-charge"/></td><td class="tdClass" align="center"><input type="number" name="orderline[' +
                    j +
                    '][quantity]" placeholder="Quantity" value="0" class="form-control quantity" min="1" required /></td><td class="tdClass" align="center"><input type="text" name="orderline[' +
                    j +
                    '][sub_price]" placeholder="Enter amount" value="" class="form-control total-price" readonly /></td><td class="tdClass"><a class="view  btn btn-outline-primary mr-1" href="" target="_blank">View</a><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
                );
                // $.each(products, function(index, value) {
                //     $("<option/>", {
                //         value: index, 
                //         text: value
                //     }).appendTo(selectElem);
                // });
            });
            $("#dynamic-ar1").click(function() {
                ++j;
                $("#dynamicAddRemove").append(
                    '<tr><td class="tdClass"  align="center"><input type="text" name="orderline[' + j +
                    '][sku]" id="sku" class="form-control sku">' +
                    '<td class="tdClass"  align="center" width="20%"><select name="orderline[' + j +
                    '][bundle_id]" id="productid" class="mySelect form-control" required>' +
                    options1 +
                    ' </select></td><td class="tdClass" align="center"><input type="text" name="orderline[' + j +
                    '][price]" placeholder="Enter Price" value="" class="form-control unit-price" readonly/><input type="hidden" name="orderline[' +
                    j +
                    '][name]" placeholder="Enter Price" value="" class="form-control product-name"/><input type="hidden"  value="" class="form-control delivery-charge"/></td><td class="tdClass" align="center"><input type="number" name="orderline[' +
                    j +
                    '][quantity]" placeholder="Quantity" value="0" class="form-control quantity" min="1" required /></td><td class="tdClass" align="center"><input type="text" name="orderline[' +
                    j +
                    '][sub_price]" placeholder="Enter amount" value="" class="form-control total-price" readonly /></td><td class="tdClass"><a class="view  btn btn-outline-primary mr-1" href="" target="_blank">View</a><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
                );
                // $.each(products, function(index, value) {
                //     $("<option/>", {
                //         value: index, 
                //         text: value
                //     }).appendTo(selectElem);
                // });
            });
            $(document).on('click', '.remove-input-field', function() {
                $(this).parents('tr').remove();
                j--;
                updateTotalSum();
            });
            $(document).on('click', '#couponApply', function() {
                var code = $('#coupon_code').val();
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                var applied = $("#is_coupon_applied").val();
                if (applied != 1) {
                    $.ajax({
                        url: '/getCouponDetails',
                        type: 'post',
                        data: {
                            _token: CSRF_TOKEN,
                            code: code,
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.success == true) {
                                $("#coupon_price").val(response.details['price']);
                                $("#coupon_id").val(response.details['id']);
                                $("#is_coupon_applied").val(1);
                                reduceTotal(response.details['price']);
                            }
                        }
                    });
                }

            });
            document.addEventListener('keydown', function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    var currentElement = event.target;
                    var nextElement = document.querySelector('[tabIndex="' + (currentElement.tabIndex + 1) + '"]');
                    if (nextElement) {
                        nextElement.focus();
                    }
                }
            });

            function enforceMaxLength(el) {
                if (el.value.length > 10) {
                    el.value = el.value.slice(0, 10);
                }
            }

            function reduceTotal(amount) {
                var total = $(".total-sum").val()
                $(".total-sum").val(Math.round((total - amount) * 2) / 2);
            }
            $(document).ready(function() {
                $('.js-example-basic-single').select2({
                    minimumInputLength: 2,
                });
            });
            $(document).on('change', '.sku', function() {
                // Loop through the array and search for the SKU
                var row = $(this).closest("tr");
                var sku_to_search = row.find(".sku").val();
                for (var i = 0; i < products.length; i++) {
                    if (products[i].sku == sku_to_search) {
                        // If the SKU is found, retrieve the data and break out of the loop
                        var row = $(this).closest("tr");
                        var selectedOption = $(this).find(":selected");
                        row.find(".delivery-charge").val(products[i].delivery_charge);
                        row.find(".unit-price").val(products[i].price);
                        row.find(".product-name").val(products[i].name);
                        row.find(".sku").val(products[i].sku);
                        row.find(".mySelect").val(products[i].id);
                        row.find(".quantity").val(1);
                        row.find(".total-price").val(products[i].price);
                        var pname = products[i].name;
                        var replaced = pname.split(' ').join('_');
                        var url = 'https://uae.winscart.com/' + replaced + '-' + products[i].id;
                        row.find("a").attr("href", url);
                        updateTotalSum();
                        break;
                    }
                }

                // Check if the data was retrieved and display it
                // if (name && price) {
                //     console.log("Product name: " + name);
                //     console.log("Product price: " + price);
                // } else {
                //     console.log("SKU not found");
                // }
            });
            $(document).on('change', '.mySelect', function() {
                //var product_id = $(this).val();

                // for (i = 0; i < products.length; i++) {
                //    if(produts[i]['id']== product_id){
                //     var product_price =  produts[i]['price'];
                //     break;
                //    }
                // }
                var row = $(this).closest("tr");
                var selectedOption = $(this).find(":selected");
                var unitPrice = selectedOption.data("price");
                var name = selectedOption.data("name");
                var sku = selectedOption.data("sku");
                var deliveryCharge = selectedOption.data("deliverycharge");
                row.find(".delivery-charge").val(deliveryCharge);
                row.find(".unit-price").val(unitPrice);
                row.find(".product-name").val(name);
                row.find(".sku").val(sku);
                row.find(".quantity").val(1);
                row.find(".total-price").val(unitPrice);
                var replaced = name.split(' ').join('_');
                var url = 'https://uae.winscart.com/' + replaced + '-' + products[i].id;
                row.find("a").attr("href", url);
                updateTotalSum();
                // var quantity = row.find(".quantity").val();
                // if (quantity) {
                //     var totalPrice = unitPrice * quantity;
                //     row.find(".total-price").val(totalPrice);
                // }
            });
            $('.test-form').submit(function(e) {
                if (push == 0) {
                    e.preventDefault();
                    push = 1;
                    if (confirm("Are you sure you want to submit?")) {
                        $(this).submit();
                    }
                }
            });
            $(document).on('change', '.quantity', function() {
                var row = $(this).closest("tr");
                var unitPrice = row.find(".unit-price").val();
                var quantity = $(this).val();
                //var deliveryCharge =  $("#delivery-charge").val();
                var subTotal = unitPrice * quantity;
                var totalPrice = parseInt(unitPrice * quantity);
                row.find(".total-price").val(totalPrice);
                $("#sub-total").val(subTotal);
                updateTotalSum();
            });

            function updateTotalSum() {
                var totalSum = <?= $order->total_price ?>;
                var dcold = <?= $order->delivery_charge ?>;
                $(".total-price").each(function() {
                    totalSum += parseFloat($(this).val());
                });
                $(".sub-total").val(totalSum);
                var lowestDeliveryCharge = <?= $order->delivery_charge ?>;

                $('.delivery-charge').each(function() {
                    // Extract delivery charge from the row
                    var delCharge = parseFloat($(this).val());
                    // If it's the first row or the delivery charge is lower than the current lowest,
                    // update the lowest delivery charge
                    if (lowestDeliveryCharge == null) {
                        lowestDeliveryCharge = delCharge;
                    } else if (delCharge < lowestDeliveryCharge) {
                        lowestDeliveryCharge = delCharge;
                    }

                    $("#delivery-charge").val(lowestDeliveryCharge);
                    $(".total-sum").val(Math.round((totalSum + lowestDeliveryCharge - dcold) * 2) / 2);
                });

            }
        </script>
    @endsection
