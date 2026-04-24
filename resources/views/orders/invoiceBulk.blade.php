@php
    $i = 0;
@endphp
@foreach ($details as $details)
    @if ($i > 0)
        <div class="page-break"></div>
    @endif
    <!DOCTYPE html>
    <html>

    <head>
        {{-- <title>Invoice Winscart</title> --}}
    </head>
    <style type="text/css">
        body {
            font-family: 'Roboto Condensed', sans-serif;
        }

        .m-0 {
            margin: 0px;
        }

        .p-0 {
            padding: 0px;
        }

        .pt-5 {
            padding-top: 0.313rem;
        }

        .mt-10 {
            margin-top: 0.625rem;
        }

        .text-center {
            text-align: center !important;
        }

        .w-100 {
            width: 100%;
        }

        .w-50 {
            width: 50%;
        }

        .w-85 {
            width: 85%;
        }

        .w-15 {
            width: 15%;
        }

        .w-20 {
            width: 20%;
        }

        .logo img {
            width: 200px;
            height: 100px;
        }

        .logo span {
            margin-left: 8px;
            top: 19px;
            position: absolute;
            font-weight: bold;
            font-size: 25px;
        }

        .gray-color {
            color: #5D5D5D;
        }

        .text-bold {
            font-weight: bold;
        }

        .border {
            border: 1px solid black;
        }

        table tr,
        th,
        td {
            border: 1px solid #d2d2d2;
            border-collapse: collapse;
            padding: 7px 8px;
        }

        table tr th {
            background: #F4F4F4;
            font-size: 15px;
        }

        table tr td {
            font-size: 13px;
        }

        table {
            border-collapse: collapse;
        }

        .box-text p {
            line-height: 10px;
        }

        .float-left {
            float: left;
        }

        .total-part {
            font-size: 16px;
            line-height: 12px;
        }

        .total-right p {
            padding-right: 20px;
        }

        .page-break {
            page-break-before: always;
        }
    </style>

    <body>
        <div class="head-title">
            <h1 class="text-center m-0 p-0">Invoice</h1>
        </div>
        <div class="add-detail">
            <div class="float-left">
                @php
                    $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                @endphp
                <p class="m-0 text-bold">Invoice Id - <span
                        class="gray-color">WC/{{ now()->year }}/{{ $details['order_id'] }}</span></p>
                <p class="m-0 text-bold">Order Id - <span class="gray-color">{{ $details['order_id'] }}</span>
                </p>
                <p class="m-0 text-bold">Order Date - <span
                        class="gray-color">{{ date('d-m-Y', strtotime($details['created_at'])) }}</span></p>
                {!! $generator->getBarcode($details['order_id'], $generator::TYPE_CODE_128) !!}
            </div>
            <div class="w-250 logo mt-1">
                <img src="/front/logo.jpg" style="float: right">
            </div>
            <div style="clear: both;"></div>
        </div>
        <div class="table-section bill-tbl mt-10">
            <table class="table mt-10">
                <tr>
                    <th class="w-50">From</th>
                    <th class="w-50">To</th>
                </tr>
                <tr>
                   <td class="tdClass">
                        <div class="box-text">
                            <p>Najm Al Sama Electronic Trading</p>
                            <p>Qasimia</p>
                            <p>Sharjah UAE</p>
                            <p>Contact : +971 58 658 3113</p>
                            <p>Email : uae@winscart.com</p>
                        </div>
                    </td>
                   <td class="tdClass">
                        <div class="box-text">
                            <p>{{ $details['name'] }}</p>
                            <p>{{ $details['city'] }}</p>
                            <p>{{ $details['address'] }}</p>
                            <p>Contact : {{ $details['phone'] }}</p>
                            <p>Email : {{ $details['email'] }}</p>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="table-section bill-tbl mt-10">
            <table class="table mt-10">
                <tr>
                    <th class="w-50">Payment Method</th>
                    <th class="w-50">Shipping Method</th>
                </tr>
                <tr>
                    <td class="w-50">Cash On Delivery</td>
                    <td class="w-50">
                        @if ($details['delivery_charge'] == 0)
                            Free Shipping
                        @else
                            Shipping with a fee
                        @endif
                    </td>
                </tr>
            </table>
        </div>
        <div class="table-section bill-tbl mt-10">
            <table class="table mt-10">
                <tr>
                    <th class="w-15">SKU</th>
                    <th class="w-15">PRODUCT</th>
                    <th class="w-15">PRICE</th>
                    <th class="w-15">QTY</th>
                    <th class="w-20">VAT</th>
                    <th class="w-20">SUB TOTAL</th>
                </tr>
                @foreach ($details['lines'] as $item)
                    <tr align="center">
                       <td class="tdClass">{{ $item->sku }}</td>
                       <td class="tdClass">{{ $item->name }}</td>
                       <td class="tdClass">AED {{ $item->price }}</td>
                       <td class="tdClass">{{ $item->quantity }}</td>
                       <td class="tdClass">AED {{ $item->vat }}</td>
                       <td class="tdClass">AED {{ $item->sub_price }}</td>
                        {{--<td class="tdClass">0</td>
           <td class="tdClass">{{$item->sub_price}}</td> --}}
                    </tr>
                @endforeach
                <tr>
                    <td colspan="7">
                        <div class="total-part">
                            <div class="total-left w-85 float-left" align="right">
                                <p>Delivery Charge</p>
                                <p>Total VAT</p>
                                <p>Total Payable</p>
                            </div>
                            <div class="total-right w-15 float-left text-bold" align="right">
                                <p>AED {{ $details['delivery_charge'] }}</p>
                                <p>AED {{ $details['total_vat'] }}</p>
                                <p>AED {{ $details['total_price'] }}</p>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

    </html>
    @php
        $i++;
    @endphp
@endforeach
<script>
    window.print();
</script>
