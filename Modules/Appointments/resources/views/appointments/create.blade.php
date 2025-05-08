@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Book Appointment</h1>
    <form action="{{ route('appointments::appointments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="medical_team_id">Medical Team</label>
            <select class="form-control" id="medical_team_id" name="medical_team_id" required>
                @foreach($medicalTeams as $team)
                    <option value="{{ $team->id }}">{{ $team->FirstName }} {{ $team->LastName }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="availability_time">Availablility Time</label>
            <select name="availability_id" class="form-control" required>
    <option value="" disabled selected>Select Time</option>
    @foreach($availabilities as $availability)
        <option value="{{ $availability->id }}">
            {{ $availability->available_date }} - {{ $availability->start_time }}
        </option>
    @endforeach
</select>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="ordonnance">Ordonnance</label>
            <input type="text" class="form-control" id="ordonnance" name="ordonnance">
        </div>
        <button type="submit" class="btn btn-primary">Book Appointment</button>
    </form>
</div>
@endsection
