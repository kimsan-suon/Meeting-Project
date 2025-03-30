@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>All Bookings</h2>

        @if($bookings->isEmpty())
            <p>No bookings found.</p>
        @else
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>User</th>
                    <th>Room</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->user->name }}</td>
                        <td>{{ $booking->room->name }}</td>
                        <td>{{ $booking->date }}</td>
                        <td>{{ $booking->time }}</td>
                        <td>{{ $booking->status }}</td>
                        <td>
                            @if($booking->status == 'pending')
                                <a href="{{ route('admin.bookings.approve', $booking->id) }}" class="btn btn-success">Approve</a>
                                <a href="{{ route('admin.bookings.cancel', $booking->id) }}" class="btn btn-danger">Cancel</a>
                            @else
                                <span class="badge bg-secondary">{{ ucfirst($booking->status) }}</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
