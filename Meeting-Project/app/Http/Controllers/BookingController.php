<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'date' => 'required|date',
            'time' => 'required'
        ]);

        Booking::create([
            'user_id' => auth()->id(),
            'room_id' => $request->room_id,
            'date' => $request->date,
            'time' => $request->time,
            'status' => 'pending',
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
