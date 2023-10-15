<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Mail\BookingConfirmation;
use App\Mail\AdminNotification;

class BookingController extends Controller
{
    /** GET all bookings to render in VUE APP
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $bookings = Booking::all();
        return response()->json($bookings);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $booking = Booking::find($id);
        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }
        return response()->json($booking);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email',
                'phone_number' => 'required',
                'vehicle_make' => 'required',
                'vehicle_model' => 'required',
                'booking_date' => 'required|date',
                // Add more validation rules for other properties
            ]);

            $booking = new Booking();
            $booking->name = $validatedData['name'];
            $booking->email = $validatedData['email'];
            $booking->phone_number = $validatedData['phone_number'];
            $booking->vehicle_make = $validatedData['vehicle_make'];
            $booking->vehicle_model = $validatedData['vehicle_model'];
            $booking->booking_date = $validatedData['booking_date'];
            // Set other properties

            $booking->save();

            Mail::to($validatedData['email'])->send(new BookingConfirmation($booking));

            // Send email to the website admin
            Mail::to('admin@example.com')->send(new AdminNotification($booking));


            // Optionally, you can return a response
            return response()->json(['message' => 'Booking created successfully'], 201);
        }
    }


    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $booking = Booking::find($id);
        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        $booking->delete();
        return response()->json(['message' => 'Booking deleted']);
    }


    /***
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getBookedSlots(Request $request)
    {
        $date = $request->input('date');
        // Remove the time portion and format the date as "yyyy-mm-dd"
        $formattedDate = date('Y-m-d', strtotime($date));
        $bookedSlots = Booking::where('booking_date', 'like', "%{$formattedDate}%")->get();

        if ($bookedSlots->count() > 0) {
            // Retrieve dates and convert them into an array
            $dates = $bookedSlots->pluck('booking_date')->toArray();

            return response()->json(['dates' => $dates]);
        } else {
            return response()->json(['message' => 'Bookings not found'], 200);
        }


    }

}
