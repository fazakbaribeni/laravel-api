<!DOCTYPE html>
<html>
<head>
    <title>Admin Notification</title>
</head>
<body>
<h1>Admin Notification</h1>

<p>Dear Paul,</p>

<p>A new booking has been made on your website:</p>

<p><strong>Booking Details:</strong></p>
<ul>
    <li>Name: {{ $booking->name }}</li>
    <li>Email: {{ $booking->email }}</li>
    <li>Phone: {{ $booking->phone_number }}</li>
    <li>Vehicle Make: {{ $booking->vehicle_make }}</li>
    <li>Vehicle Model: {{ $booking->vehicle_model }}</li>
    <li>Booking Date and Time: {{ $booking->booking_date }}</li>
</ul>

<p>Please take the necessary action regarding this booking.</p>
</body>
</html>
