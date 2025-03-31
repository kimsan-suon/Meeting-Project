@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Your Bookings</h2>

        @if($bookings->isEmpty())
            <p>You have no bookings yet.</p>
        @else
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Room</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->room->name }}</td>
                        <td>{{ $booking->date }}</td>
                        <td>{{ $booking->time }}</td>
                        <td>
                            @if($booking->status == 'pending')
                                <span class="text-warning">Pending</span>
                            @elseif($booking->status == 'paid')
                                <span class="text-success">Paid</span>
                            @elseif($booking->status == 'approved')
                                <span class="text-primary">Approved</span>
                            @else
                                <span class="text-danger">Canceled</span>
                            @endif
                        </td>
                        <td>
                            @if($booking->status == 'pending')
                                <a href="{{ route('payment.form', $booking->id) }}" class="btn btn-primary btn-sm">Pay Now</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
