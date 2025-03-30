@extends('layouts.app')

@section('content')
    <div class="text-center mt-5">
        <h1>Welcome to Meeting Room Booking System</h1>
        <p>Book your meeting room easily and securely.</p>
        <a href="{{ route('bookings.index') }}" class="btn btn-primary">Get Started</a>
    </div>
@endsection
