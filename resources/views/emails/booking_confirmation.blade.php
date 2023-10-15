<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation</title>
</head>
<body>
<h1>Booking Confirmation</h1>

<p>Hello {{ $booking->name }},</p>

<p>Your booking has been confirmed:</p>

<p><strong>Booking Details:</strong></p>
<ul>
    <li>Name: {{ $booking->name }}</li>
    <li>Email: {{ $booking->email }}</li>
    <li>Phone: {{ $booking->phone_number }}</li>
    <li>Vehicle Make: {{ $booking->vehicle_make }}</li>
    <li>Vehicle Model: {{ $booking->vehicle_model }}</li>
    <li>Booking Date and Time: {{ $booking->booking_date }}</li>
</ul>

<p>Thank you for choosing our service.</p>
</body>
</html>
