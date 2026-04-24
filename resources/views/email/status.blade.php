<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>winscart</title>
</head>

<body>
    @if ($details->status == 'shipped')
        <h2>Shipment Confirmation</h2>
        <H6>Order #00{{ $details->id }}</h6>
        <h4>Hello,</h4>
        <p>Your order has been shipped and Our delivery partner will contact you soon.</p>

        <p>If you have questions about your order, you can email us at support@proximaenergyme.com  or call us
            at +971565791033</p>
        <br>
        Thank you, winscart !
        <br>
        <img src="{{ URL::asset('front/assets/images/logo.png') }}" width="100px">
    @elseif($details->status == 'delivered')
        <h2>Delivery Confirmation</h2>
        <H6>Order #00{{ $details->id }}</h6>
        <h4>Hello,</h4>
        <p>Your order has been delivered.</p>

        <p>If you have questions about your order, you can email us at support@proximaenergyme.com  or call us at +971565791033</p>
        <br>
        Thank you, winscart !
        <br>
        <img src="{{ URL::asset('front/assets/images/logo.png') }}" width="100px">
    @else
        <H6>Order #00{{ $details->id }}</h6>
        <h4>Hello,</h4>
        <p>Your order has been {{$details->status}}.</p>

        <p>If you have questions about your order, you can email us at support@proximaenergyme.com  or call us
            at +971565791033</p>
        <br>
        Thank you, winscart !
        <br>
        <img src="{{ URL::asset('front/assets/images/logo.png') }}" width="100px">
    @endif

</body>

</html>
