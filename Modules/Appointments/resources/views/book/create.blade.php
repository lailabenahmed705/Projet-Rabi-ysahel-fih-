@extends('layouts.contentNavbarLayout')

@section('title', 'Confirm Booking')

@section('content')
<div class="container">
  <h4 class="mb-4">Confirm Booking</h4>

  <form action="{{ route('bookings.store') }}" method="POST">
    @csrf

    <input type="hidden" name="medical_team_id" value="{{ $medicalTeamId }}">
    <input type="hidden" name="start_time" value="{{ $start }}">
    <input type="hidden" name="end_time" value="{{ $end }}">

    <div class="mb-3">
      <label for="patient_name" class="form-label">Your Name</label>
      <input type="text" class="form-control" id="patient_name" name="patient_name" required>
    </div>

    <div class="mb-3">
      <label for="patient_phone" class="form-label">Phone Number</label>
      <input type="text" class="form-control" id="patient_phone" name="patient_phone" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Selected Time</label>
      <p class="form-control-plaintext">
        {{ \Carbon\Carbon::parse($start)->format('d M Y H:i') }} → {{ \Carbon\Carbon::parse($end)->format('H:i') }}
      </p>
    </div>

    <button type="submit" class="btn btn-success">Confirm Booking</button>
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
  </form>
</div>
@endsection
