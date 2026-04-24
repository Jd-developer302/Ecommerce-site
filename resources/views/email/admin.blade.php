<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Details from winscart</title>
</head>

<body>
    <h3>Hello support<h3>
    <p>An order is placed on your site please check.</p>

    <h4>Order Detail</h4>
    ---------------------------------------------
    <br>
    Order #00{{ $details->id }}<br>
    placed on {{ $details->created_at }}<br>
    Transaction Id: {{ $details->trans_id }}


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
            @php
                $tprice = 0;
                $tqty = 0;
                $courier = 0;
            @endphp
            <tbody class="fw-6 fw-semibold text-gray-600">
                @foreach ($details->products as $index => $product)
                    <tr>
                        <th scope="row" class="tdClass">{{ $index + 1 }}</th>
                       <td class="tdClass"><img src="{{ URL::asset('image/' . $product->image) }}" alt="product"
                                width="100px"><br>{{ $product->name }} @if ($product->variant != null)
                                ({{ $product->variant }})
                            @endif
                        </td>
                        @php
                            $tprice = $tprice + $product->price * $product->quantity;
                            $tqty = $tqty + $product->quantity;
                        @endphp
                       <td class="tdClass">{{ $product->quantity }}</td>
                       <td class="tdClass">{{ $product->price }}</td>
                       <td class="tdClass">{{ $product->price * $product->quantity }}</td>

                    </tr>
                @endforeach
                @if ($tprice < 250)
                    @php
                        $courier = 25;
                    @endphp
                @endif
                <tr>
                    <th scope="row" colspan="2"><b>Total Quantities: </b></th>
                   <td class="tdClass"><b>{{ $tqty }}</b></td>
                    <th scope="row" class="tdClass"><b>Sub Total: </b></th>
                   <td class="tdClass"><b>{{ $tprice }}</b></td>
                </tr>
                <tr>
                    <th scope="row" colspan="3"></th>
                    <th scope="row" class="tdClass"><b>Shipping Charges: </b></th>
                   <td class="tdClass"><b>{{ $courier }}</b></td>
                </tr>
                <tr>
                    <th scope="row" colspan="3"></th>
                    <th scope="row" class="tdClass"><b>Total Amount: </b></th>
                   <td class="tdClass"><b>{{ $tprice+$courier }}</b></td>
                </tr>
            </tbody>
            <!--end::Tbody-->
        </table>
        <!--end::Table-->
    </div>

    ----------------------------------------------
    <br>
    winscart.com
    <br>
    <img src="{{ URL::asset('front/assets/images/logo.png') }}" width="100px">
</body>

</html>
