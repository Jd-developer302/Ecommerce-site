<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>winscart</title>
</head>

<body>
    <h3>Hello {{ $details['name'] }},</h3>
    <p>Your order #00{{ $details['email'] }} is {{ $details['message'] }} successfully.</p>

    <br>
    We hope to see you again
    <br>
    winscart.com
    <br>
    <img src="{{ URL::asset('front/assets/images/logo.png') }}" width="100px">
</body>

</html>
