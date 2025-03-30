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
                </tr>
                </thead>
                <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->room->name }}</td>
                        <td>{{ $booking->date }}</td>
                        <td>{{ $booking->time }}</td>
                        <td>{{ $booking->status }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
