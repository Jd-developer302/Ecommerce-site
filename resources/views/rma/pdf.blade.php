<!DOCTYPE html>
<html>

<head>
 
</head>
<style type="text/css">
    body {
        font-family: 'Roboto Condensed', sans-serif;
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
        margin: 1px !important;
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
    @php
        $groupedRmas = $rmas->groupBy('driver_id');
    @endphp

    @foreach ($groupedRmas as $driver_id => $orders)
        @php
            $driver = $drivers[$driver_id] ?? null;
        @endphp

        <div class="head-title">
            <h1 class="text-center m-0 p-0">
                {{ $driver ? "Orders of $driver->name" : 'RMA Orders Report' }}
            </h1>
            <h6>Generated Date: {{ \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s') }}</h6>
        </div>
        <div class="table">
            <table class="able table-bordered">
                <tr>
                    <th class="thClass" width="3% !important" style="font-size: 11px;">Sl. No.</th>
                    <th class="thClass" width="3% !important" style="font-size: 11px;">ORDER ID</th>
                    <th class="thClass break-word" width="10% !important" style="font-size: 11px;">NAME</th>
                    <th class="thClass" width="7% !important" style="font-size: 11px;">PHONE</th>
                    <th class="thClass" width="7% !important" style="font-size: 11px;">Status</th>
                    <th class="thClass" width="7% !important" style="font-size: 11px;">Comment</th>
                    <th class="thClass" width="7% !important" style="font-size: 11px;">CITY</th>
                    <th class="thClass" width="7% !important" style="font-size: 11px;">ADDRESS</th>
                    <th class="thClass" width="10% !important" style="font-size: 11px;">PRODUCT</th>
                    <th class="thClass" width="12% !important" style="font-size: 11px;">QTY</th>
                    <th class="thClass" width="7% !important" style="font-size: 11px;">PRICE</th>
                    
                </tr>

                @foreach ($orders as $key => $item)
                    <tr align="center">
                        <td class="tdClass" width="3% !important" style="font-size: 11px;">{{ $key + 1 }}</td>
                        <td class="tdClass" width="10% !important" style="font-size: 11px;">{{ $item->order_id }}</td>
                        <td class="tdClass break-word" width="7% !important" style="font-size: 11px;">{{ $item->name }}</td>
                        <td class="tdClass" width="7% !important" style="font-size: 11px;">{{ $item->phone }}</td>
                        <td class="tdClass" width="7% !important" style="font-size: 11px;">{{ $item->rma_status }}</td>
                        <td class="tdClass" width="7% !important" style="font-size: 11px;">{{ $item->comment }}</td>
                        <td class="tdClass" width="7% !important" style="font-size: 11px;">{{ $item->city }}</td>
                        <td class="tdClass" width="7% !important"style="font-size: 11px;">{{ $item->address }}</td>
                        <td class="tdClass" width="10% !important" style="font-size: 11px;">{{ $item->product_name }}</td>
                        <td class="tdClass" width="12% !important"style="font-size: 11px;">{{ $item->total_qty }}</td>
                        <td class="tdClass" width="7% !important" style="font-size: 11px;"> AED {{ $item->total_price }}</td>
                        
                    </tr>
                @endforeach
            </table>
        </div>

    @endforeach
</body>

<script>
    window.print();
</script>

</html>
