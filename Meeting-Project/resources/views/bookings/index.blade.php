@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center my-4">Select a Meeting Room</h2>

        <div class="row">
            @foreach($rooms as $room)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ asset('images/' . $room->image) }}" alt="{{ $room->name }}" style="width:100%; height:auto;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $room->name }}</h5>
                            <p class="card-text">{{ Str::limit($room->description, 100) }}</p>
                            <a href="{{ route('bookings.show', $room->id) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
