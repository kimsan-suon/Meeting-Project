<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request

        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        $room = Room::findOrFail($request->room_id);

        // Create a new booking
        Booking::create([
            'user_id' => Auth::id(),
            'room_id' => $request->room_id,
            'date' => $request->date,
            'time' => $request->time,
            'status' => 'pending',
            'price' => $room->price,
        ]);

        return redirect()->route('bookings.index')->with('success', 'Room booked successfully!');
    }

    public function userBookings()
    {
        // Get the authenticated user's bookings
        $bookings = Booking::where('user_id', auth()->id())->get();

        return view('bookings.user_bookings', compact('bookings'));
    }

    public function adminBookings()
    {
        // Only allow access to admins (for example, using role-based permission)
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('home')->with('error', 'You do not have permission.');
        }

        $bookings = Booking::all();

        return view('bookings.admin_bookings', compact('bookings'));
    }

    public function approveBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'approved';
        $booking->save();

        return redirect()->route('admin.bookings')->with('success', 'Booking approved.');
    }

    public function cancelBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'canceled';
        $booking->save();

        return redirect()->route('admin.bookings')->with('success', 'Booking canceled.');
    }


}
