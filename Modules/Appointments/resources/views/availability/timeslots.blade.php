@extends('layouts/contentNavbarLayout')

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Availability /</span> Available Time Slots
    </h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h4 class="card-header">Available Time Slots for {{ $date }}</h4>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($timeSlots as $timeSlot)
                            <li class="list-group-item">{{ $timeSlot }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
