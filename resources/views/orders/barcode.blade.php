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
        <h1 class="text-center m-0 p-0">Orders</h1>
    </div>
    <div class="add-detail">
        <div class="float-left">
            @php
                $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
            @endphp

        </div>
    </div>
    <div class="table">
        <table class="table">
            <tr>
                <th class="w-50">Barcode</th>
                <th class="w-50">ORDER ID</th>
            </tr>
            @foreach ($orders as $item)
                <tr align="center">
                    <td class="tdClass">{!! $generator->getBarcode($item, $generator::TYPE_CODE_128) !!}</td>
                    <td class="tdClass">{{ $item }}</td>
                </tr>
            @endforeach
            </tr>
        </table>
    </div>

</html>
<script>
    window.print();
</script>
