@extends('layouts.master')

@section('content')
    <script src="{{ asset('assetst/js/jquery.min.js') }}"></script>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Create Order</h1>
        <div>
            <ol class="breadcrumb">
                <a href="{{ route('orders.index') }}" class="btn btn-sm btn-primary my-1">Back</a>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="card mt-3 p-4">
        @if (\Session::has('error'))
            <div class="alert alert-danger">
                <ul>
                    <li>{!! \Session::get('error') !!}</li>
                </ul>
            </div>
        @endif
        <div class="card-body">
            <form method="POST" action="{{ route('orders.store') }}" enctype="multipart/form-data" class="test-form">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <label for="phone" class="form-label">Customer Phone</label><br>
                            <div class="row">
                                {{-- <div class="col-3">
                                    <select name="areacode" id="areacode" class="form-control" required
                                        onchange="enablePhoneInput()" tabindex="1">
                                        <option value="">Area Code</option>
                                        <option value="050">050</option>
                                        <option value="052">052</option>
                                        <option value="054">054</option>
                                        <option value="055">055</option>
                                        <option value="056">056</option>
                                        <option value="058">058</option>
                                    </select>
                                </div> --}}
                                <div class="col-12">
                                    <input value="{{ old('phone') }}" type="number" id="phone" class="form-control"
                                        name="phone" placeholder="Phone" minlength="10" maxlength="10" tabindex="2"
                                        required oninput="enforceMaxLength(this)" autofocus>
                                    @if ($errors->has('phone'))
                                        <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                            </div>
                            @if ($errors->has('phone'))
                                <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Customer Name</label>
                            <input value="{{ old('name') }}" type="text" id="name" class="form-control"
                                name="name" placeholder="Name" tabindex="3" required>

                            @if ($errors->has('name'))
                                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Customer Email</label>
                            <input value="{{ old('email') }}" type="email" id="email" class="form-control"
                                name="email" placeholder="Email" tabindex="4">

                            @if ($errors->has('email'))
                                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Customer Address</label>
                            <textarea value="{{ old('address') }}" type="text" id="address" class="form-control" name="address"
                                placeholder="Address" required></textarea>

                            @if ($errors->has('address'))
                                <span class="text-danger text-left">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">Customer Emirate</label>
                            <select class="form-control" tabindex="5" name="city" id="city" required>
                                <option value="">-Select-</option>
                                <option value="DUBAI">DUBAI</option>
                                <option value="ABU DHABI">ABU DHABI</option>
                                <option value="SHARJAH">SHARJAH</option>
                                <option value="AJMAN">AJMAN</option>
                                <option value="RAK">RAK</option>
                                <option value="FUJAIRAH">FUJAIRAH</option>
                                <option value="UMM AL QUWAIN">UMM AL QUWAIN</option>
                                <option value="AL AIN">AL AIN</option>
                            </select>
                            @if ($errors->has('city'))
                                <span class="text-danger text-left">{{ $errors->first('city') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="source" class="form-label">Source</label>
                            <select class="form-control" name="source" id="source" required>
                                <option value="">-Select-</option>
                                <option value="Website">Website</option>
                                <option value="Message">Message</option>
                                <option value="Leads">Leads</option>
                            </select>
                            @if ($errors->has('source'))
                                <span class="text-danger text-left">{{ $errors->first('source') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <div class="row">
                                <div class="col-6"><input value="{{ old('latitude') }}" type="number" id="lat"
                                        class="form-control" name="lat" placeholder="Latitude"></div>
                                <div class="col-6"><input value="{{ old('longitude') }}" type="number" id="long"
                                        class="form-control" name="long" placeholder="Longitude"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="card-body">
                            <div class="mb-3">
                                <h5 id="#prevOrder">Previous Orders</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dynamicOrders">
                                        <tr></tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Products</label>
                    <div class="table-responsive">
                        <table class="tableClass table table-bordered" id="dynamicAddRemove">
                            <tr style="background-color: #E4A11B;">
                                <th class="thClass" align='center'>Sku</td>
                                <th class="thClass" align='center'>Name</td>
                                <th class="thClass" align='center'>Unit Price</td>
                                <th class="thClass" align='center'>Quantity</td>
                                    {{-- <td class="tdClass" align='center'>Vat</td> --}}
                                <th class="thClass" align='center'>Amount</td>
                                <th class="thClass" align='center'>Action</td>
                            </tr>


                            <button type="button" name="add" id="dynamic-ar" accesskey="p"
                                class="btn btn-primary btn-sm m-1">Add
                                Product</button>
                            <button type="button" name="add" id="dynamic-ar1" accesskey="b"
                                class="btn btn-dark btn-sm m-1">Add
                                Bundle</button>
                        </table>
                        <table>
                            <tr>
                                <td class="tdClass" width="90%">Sub Total</td>
                                <td class="tdClass"><input type="text" name="sub_total" id="sub-total"
                                        class="sub-total form-control" value="0" readonly></td>
                            </tr>
                            <tr>
                                <td class="tdClass" width="90%">Delivery Charge</td>
                                <td class="tdClass"><input type="text" name="delivery_charge" id="delivery-charge"
                                        class="form-control" value="0" readonly></td>
                            </tr>
                            <tr>
                                <td class="tdClass" width="90%">Total Price</td>
                                <td class="tdClass"><input type="text" name="total_sum"
                                        class="total-sum form-control" value="0" readonly></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="comment" class="form-label">Comment / Remarks</label>
                    <textarea value="{{ old('comment') }}" type="text" class="form-control" name="comment" placeholder="Comment"></textarea>

                    @if ($errors->has('comment'))
                        <span class="text-danger text-left">{{ $errors->first('comment') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="coupon">Coupon Code</label>
                    <div class="row">
                        <input type="text" value="" name="coupon_code" class="col-7 form-control"
                            placeholder="Coupon code" id="coupon_code" style="width:70%">
                        {{-- <select name="coupon_code" id="coupon_code" class="form-control">
                            <option value="">Select coupon</option>
                            @foreach ($coupons as $item)
                                <option value="{{ $item->code }}">{{ $item->code }}</option>
                            @endforeach
                        </select> --}}
                        <a class="btn btn-dark col-3" id="couponApply" style="color:#fff">Apply</a>
                        <input type="hidden" name="is_coupon_applied" id="is_coupon_applied" value="0">
                        <input type="hidden" name="coupon_price" id="coupon_price" value="0">
                    </div>

                </div>
                {{-- <div class="mb-3">
                    <label class="switch mb-3">
                        <input type="checkbox" value="1" name="confirmed">
                        <label for="confirmed" class="form-label">Is confirmed?</label>

                    </label>
                </div> --}}

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
                    " data-deliverycharge=" + bundles[i]['delivery_charge'] +
                    " data-sku=" + bundles[i]['sku'] +
                    " data-name=" + bundles[i]['name'] + ">" + bundles[i]['name'] + "</option>";
            }
            // Iterate over object and add options to select

            var j = -1;
            $("#dynamic-ar").click(function() {
                ++j;
                $("#dynamicAddRemove").append(
                    '<tr><td class="tdClass"  align="center"><input type="text" name="orderline[' + j +
                    '][sku]" id="sku" class="form-control sku" placeholder="Enter SKU">' +
                    '<td class="tdClass"  align="center" width="20%"><select name="orderline[' +
                    j +
                    '][product_id]" id="productid" class="mySelect js-example-basic-single form-control" required>' +
                    options +
                    ' </select></td><td class="tdClass" align="center"><input type="text" name="orderline[' + j +
                    '][price]" placeholder="" value="" class="form-control unit-price" readonly/><input type="hidden" name="orderline[' +
                    j +
                    '][name]" placeholder="" value="" class="form-control product-name"/><input type="hidden"  value="" class="form-control delivery-charge"/></td><td class="tdClass" align="center"><input type="number" name="orderline[' +
                    j +
                    '][quantity]" placeholder="Quantity" value="0" class="form-control quantity" min="1" required /></td><td class="tdClass" align="center"><input type="text" name="orderline[' +
                    j +
                    '][sub_price]" placeholder="" value="" class="form-control total-price" readonly /></td><td class="tdClass"><a class="view btn btn-outline-primary mr-1" href="" target="_blank">View</a><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
                );
                // $.each(products, function(index, value) {
                //     $("<option/>", {
                //         value: index, 
                //         text: value
                //     }).appendTo(selectElem);
                // });
                $(document).ready(function() {
                    $('.js-example-basic-single').select2();
                });
            });
            $("#dynamic-ar1").click(function() {
                ++j;
                $("#dynamicAddRemove").append(
                    '<tr><td class="tdClass"  align="center"><input type="text" name="orderline[' + j +
                    '][sku]" id="sku" class="form-control sku" placeholder="Enter SKU">' +
                    '<td class="tdClass"  align="center" width="20%"><select name="orderline[' + j +
                    '][bundle_id]" id="productid" class="mySelect form-control" required>' +
                    options1 +
                    ' </select></td><td class="tdClass" align="center"><input type="text" name="orderline[' + j +
                    '][price]" placeholder="" value="" class="form-control unit-price" readonly/><input type="hidden" name="orderline[' +
                    j +
                    '][name]" placeholder="" value="" class="form-control product-name"/><input type="hidden"  value="" class="form-control delivery-charge"/></td><td class="tdClass" align="center"><input type="number" name="orderline[' +
                    j +
                    '][quantity]" placeholder="Quantity" value="0" class="form-control quantity" min="1" required /></td><td class="tdClass" align="center"><input type="text" name="orderline[' +
                    j +
                    '][sub_price]" placeholder="" value="" class="form-control total-price" readonly /></td><td class="tdClass"><a class="view  btn btn-outline-primary mr-1" href="" target="_blank">View</a><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
                );
                // $.each(products, function(index, value) {
                //     $("<option/>", {
                //         value: index, 
                //         text: value
                //     }).appendTo(selectElem);
                // });
                $(document).ready(function() {
                    $(".mySelect").select2();
                });
            });
            $(document).on('click', '.remove-input-field', function() {
                $(this).parents('tr').remove();
                j--;
                updateTotalSum();
            });
            // $(document).ready(function() {
            //     $('.js-example-basic-single').select2({
            //         minimumInputLength: 2,
            //     });
            // });
            $('.test-form').submit(function(e) {
                if (push == 0) {
                    e.preventDefault();
                    push = 1;
                    if (confirm("Are you sure you want to submit?")) {
                        $('.test-form').submit();
                    }
                }
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
                        console.log(selectedOption);
                        row.find(".delivery-charge").val(products[i].delivery_charge);
                        row.find(".unit-price").val(products[i].price);
                        row.find(".product-name").val(products[i].name);
                        row.find(".sku").val(products[i].sku);
                        row.find(".mySelect").val(products[i].id).select2().trigger('change');
                        row.find(".quantity").val(1);
                        row.find(".total-price").val(products[i].price);
                        var pname = products[i].name;
                        var replaced = pname.split(' ').join('_');
                        var url = 'https://uae.winscart.com/' + replaced + '-' + products[i].id;
                        row.find("a").attr("href", url);
                        console.log(url);
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
            $(document).on('click', '#couponApply', function() {
                var code = $('#coupon_code').val();
                console.log('copon', code);
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
                                $("#is_coupon_applied").val(1);
                                $("#coupon_code").val(code);
                                reduceTotal(response.details['price']);
                            }
                        }
                    });
                }

            });

            function enablePhoneInput() {
                var areacode = document.getElementById("areacode");
                var phone = document.getElementById("phone");
                if (areacode.value !== "") {
                    phone.disabled = false;
                } else {
                    phone.disabled = true;
                }
            }

            function enforceMaxLength(el) {
                if (el.value.length > 10) {
                    el.value = el.value.slice(0, 10);
                }
            }
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
                var replaced = name.replace(" ", "_");
                var url = 'https://uae.winscart.com/' + replaced + '-' + products[i].id;
                console.log(url);
                row.find("a").attr("href", url);
                updateTotalSum();
                // var quantity = row.find(".quantity").val();
                // if (quantity) {
                //     var totalPrice = unitPrice * quantity;
                //     row.find(".total-price").val(totalPrice);
                // }
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
            $(document).on('change', '#phone', function() {
                $("#name").val('');
                $("#email").val('');
                $("#city").val('');
                $("#address").val('');
                $("#dynamicOrders").empty();
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                var phone = $('#phone').val();
                var areacode = $("#areacode").val();
                $.ajax({
                    url: '/getPhoneDetails',
                    type: 'post',
                    data: {
                        _token: CSRF_TOKEN,
                        phone: phone,
                        areacode: areacode,
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success == true) {
                            $("#name").val(response.details['name']);
                            $("#email").val(response.details['email']);
                            $("#address").val(response.details['address']);
                            $("#city").val(response.details['city']);
                            $("#lat").val(response.details['lat']);
                            $("#long").val(response.details['long']);
                            $("#prevOrder").show();
                            for (var i = 0; i < response.orders.length; i++) {
                                var dateString = response.orders[i]['created_at'];
                                var dateObject = new Date(dateString);
                                var formattedDate = dateObject.toLocaleDateString();
                                var status = getClass(response.orders[i]['status']);
                                if (i == 0) {
                                    $("#dynamicOrders").append(
                                        '<tr><th class = "thClass" > Order No </th> <th class = "thClass" > Status </th> <th class = "thClass" > Created At </th> <th class = "thClass" > Created By </th> </tr>'
                                    );
                                }
                                $("#dynamicOrders").append(
                                    '<tr><td class="tdClass"> <a href="' + response
                                    .orders[i]['id'] + '", ' + response
                                    .orders[i]['id'] + ') }}" target="_blank">' +
                                    response.orders[i]['order_id'] +
                                    '</a></td><td class="tdClass"  align="center" width="20%"><button class="btn btn-sm ' +
                                    status + '">' +
                                    response.orders[i]['status'] +
                                    '</button></td></td><td class="tdClass"  align="center" width="20%">' +
                                    formattedDate +
                                    '</td></td><td class="tdClass"  align="center" width="20%">' +
                                    response.orders[i]['created_by'] +
                                    '</td></tr>'
                                );
                            }
                        }
                    }
                });
            });

            function getClass(status) {
                if (status == 'DELIVERED') {
                    return 'delivered';
                } else if (status == 'NO ANSWER') {
                    return 'no_answer';
                } else if (status == 'CANCELLED') {
                    return 'cancelled';
                } else if (status == 'PICKEDUP') {
                    return 'pickedup';
                } else if (status == 'ORDER PLACED') {
                    return 'order_placed';
                } else if (status == 'TO BE CONFORMED') {
                    return 'awaiting_conformation';
                } else if (status == 'ORDER CONFIRMED') {
                    return 'order_conformed';
                } else if (status == 'PACKED') {
                    return 'packed';
                } else if (status == 'RESHEDULED') {
                    return 'resheduled';
                } else if (status == 'COMPLETED') {
                    return 'completed';
                } else if (status == 'INVOICE PRINTED') {
                    return 'invoice_printed';
                } else if (status == 'ASSIGNED TO RIDER') {
                    return 'assigned_to_rider';
                }
            }

            function moveToNext(event) {
                var currentField = event.target;
                var nextField;

                if (currentField.tagName === 'SELECT') {
                    nextField = currentField.parentElement.nextElementSibling.querySelector('input');
                } else if (event.keyCode === 13) {
                    event.preventDefault(); // prevent form submission
                    nextField = currentField.parentElement.nextElementSibling.querySelector('input, select');
                }

                if (nextField) {
                    nextField.focus();
                }
            }

            function reduceTotal(amount) {
                var total = $(".total-sum").val();
                var sub = total - amount;
                var round = Math.round(sub * 2) / 2;
                $(".total-sum").val(round);
            }
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

            function updateTotalSum() {
                var totalSum = 0;
                $(".total-price").each(function() {
                    totalSum += parseFloat($(this).val());
                });
                $(".sub-total").val(totalSum);
                var lowestDeliveryCharge = null;

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
                    $(".total-sum").val(Math.round((totalSum + lowestDeliveryCharge) * 2) / 2);
                });

            }
        </script>
    @endsection
