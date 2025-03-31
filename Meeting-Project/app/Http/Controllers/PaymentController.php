<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use App\Models\Booking;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function showPaymentForm($booking_id)
    {
        $booking = Booking::findOrFail($booking_id);
        return view('payment.form', compact('booking'));
    }

    public function processPayment(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'stripeToken' => 'required'
        ]);

        $booking = Booking::findOrFail($request->booking_id);

        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $charge = Charge::create([
                'amount' => $booking->room->price * 100, // Convert to cents
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Payment for Booking ID: ' . $booking->id,
            ]);

            $booking->status = 'paid';
            $booking->save();

            Session::flash('success', 'Payment successful!');

            return redirect()->route('user.bookings');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
