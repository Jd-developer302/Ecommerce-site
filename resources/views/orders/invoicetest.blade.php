@php
    $i = 0;
@endphp
@foreach ($details as $details)
    @if ($i > 0)
        {{-- <div class="page-break"></div> --}}
    @endif
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>Invoice</title>
        <style>
            @page {
                size: A6;
                margin: 0;
            }

            body {
                font-family: Arial, sans-serif;
                font-size: 12px;
                margin: 0;
                padding: 10px  10px  10px 20px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 5px;
            }

            th,
            td {
                text-align: left;
                padding: 3px;
                border: 1px solid black;
            }

            th {
                background-color: #ccc;
            }

            .header {
                text-align: center;
                margin-bottom: 10px;
            }

            .header img {
                max-width: 100%;
                height: auto;
            }

            .footer {
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                text-align: center;
                font-size: 10px;
            }
        </style>
    </head>

    <body>
        @php
            $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
        @endphp
        <div class="header">
            {{-- <img src="{{ URL::asset('front/logo.jpg') }}" alt="Your logo"> --}}
            <h3>Invoice</h3>
            <p>Invoice Id: WC/{{ now()->year }}/{{ $details['order_id'] }}</p>
            <p>Invoice Date: {{ date('d-m-Y', strtotime($details['created_at'])) }}</p>
            <center>{!! $generator->getBarcode($details['order_id'], $generator::TYPE_CODE_128) !!}</center>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Sku</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($details['lines'] as $item)
                    <tr>
                       <td class="tdClass">{{ $item->product_name }}</td>
                       <td class="tdClass">{{ $item->sku }}</td>
                       <td class="tdClass">AED {{ $item->price }}</td>
                       <td class="tdClass">{{ $item->quantity }}</td>
                       <td class="tdClass">AED {{ $item->sub_price }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3">Delivery Charge</td>
                   <td class="tdClass" colspan="2">AED {{ $details['delivery_charge'] }}</td>
                </tr>
                <tr>
                    <td colspan="3">VAT</td>
                   <td class="tdClass" colspan="2">AED {{ $details['total_vat'] }}</td>
                </tr>
                <tr>
                    <td colspan="3">Total</td>
                   <td class="tdClass" colspan="2">AED {{ $details['total_price'] }}</td>
                </tr>
            </tbody>
        </table>
        <table>
            <thead>
              <tr>
                <th colspan="2">Shipping Address</th>
              </tr>
            </thead>
            <tbody>
              <tr>
               <td class="tdClass">Name:</td>
               <td class="tdClass">{{ $details['name'] }}</td>
              </tr>
              <tr>
               <td class="tdClass">Address:</td>
               <td class="tdClass">{{ $details['address'] }}</td>
              </tr>
              <tr>
               <td class="tdClass">City, State Zip:</td>
               <td class="tdClass">{{ $details['city'] }}</td>
              </tr>
              <tr>
               <td class="tdClass">Contact:</td>
               <td class="tdClass">{{ $details['areacode'] }} {{ $details['phone'] }}</td>
              </tr>
              <tr>
               <td class="tdClass">Email:</td>
               <td class="tdClass">{{ $details['email'] }}</td>
              </tr>
            </tbody>
          </table>
          <P><b>Coment:</b>{{ $details['comment'] }}</P>
        <div class="footer">
            <p>Najm Al Sama Electronic Trading, Qasimia,Sharjah UAE |+971 58 658 3113 | uae@winscart.com</p>
        </div>
    </body>

    </html>
    @php
        $i++;
    @endphp
@endforeach
