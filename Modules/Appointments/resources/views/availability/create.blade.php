@extends('layouts/contentNavbarLayout')

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Availability /</span> Set Availability
    </h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h4 class="card-header">Set Availability for {{  $medicalTeam->user->name }}</h4>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="post" action="{{ route('availability.store', $medicalTeam->id) }}">
                        @csrf
                        <div class="row gy-4">
                            <!-- Date -->
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <h5>Available Date</h5>
                                    <input type="date" id="available_date" name="available_date" class="form-control" required />
                                    
                                </div>
                            </div>
                            <!-- Time Slots -->
                            <div class="col-md-12">
                                <h5>Available Time Slots</h5>
                                <div class="d-flex flex-wrap">
                                    @foreach($timeSlots as $timeSlot)
                                        <div class="form-check m-2">
                                            <input class="form-check-input" type="checkbox" name="time_slots[]" value="{{ $timeSlot }}" id="timeSlot-{{ $timeSlot }}" checked>
                                            <label class="form-check-label" for="timeSlot-{{ $timeSlot }}">
                                                {{ $timeSlot }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="text-right p-2">
                            <button type="submit" class="btn btn-primary">Set Availability</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
