@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <img src="{{ asset('images/' . $room->image) }}" alt="{{ $room->name }}" class="card-img-top">
                    <div class="card-body">
                        <h2 class="card-title">{{ $room->name }}</h2>
                        <p class="card-text">{{ $room->description }}</p>
                        <p>Price: ${{ number_format($room->price, 2) }}</p>


                        <h3 class="mt-4">Select Date and Time</h3>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('bookings.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="room_id" value="{{ $room->id }}">

                            <div class="mb-3">
                                <label for="date" class="form-label">Date:</label>
                                <input type="date" name="date" id="date" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="time" class="form-label">Time:</label>
                                <input type="time" name="time" id="time" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Book Now</button>
                            <a href="{{ route('bookings.index') }}" class="btn btn-secondary">Back to Booking Page</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
