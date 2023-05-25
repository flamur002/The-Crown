<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booked</title>
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/img/crown2_16.png') }}"/>

</head>
<body>
    <hr>
    <h2>Booking complete!</h2>
    <hr>

    <p>Dear {{$name}},<br>
    <br>
    We would like to take a moment to express our gratitude for choosing to stay with us at The Crown. We are thrilled that you have completed your booking and we are eagerly anticipating your arrival.    <br>
    Our team is dedicated to providing you with an exceptional experience, from the moment you arrive until the moment you depart. We want you to feel comfortable and at home during your stay, so please don't hesitate to let us know if there is anything we can do to make your stay more enjoyable.    <br>
    <br>
    Here are your booking details and everything you need to know:    <br> <br>
    <ul>
        <li><strong>Confirmation Code: {{$code}}</strong></li>
        <li><strong>Check In Date: {{$checkin}} after 11 a.m.</strong></li>
        <li><strong>Check Out Date: {{$checkout}} before 10 a.m.</strong></li>
        <li><strong>Number of Guests: {{$guests}}</strong></li>
        <li><strong>Room Type: {{$type}}</strong></li>
    </ul>
    <h3>Total price: £{{$price}}</h3>
    <br>
    <br>
    If you have any questions or need assistance with your booking, please do not hesitate to contact us. Our staff is available 24/7 to ensure that your needs are met.
    <br>
    We can't wait to welcome you to our hotel and provide you with a memorable stay. Thank you again for choosing The Crown.
    <br>
    Thank you for choosing The Crown. We look forward to serving you soon!
    <br>
    <br>
    <br>
    Best regards,   <br>
    The Crown Team
    </p>
    <hr>
</body>
</html>
