@extends('layouts/contentNavbarLayout')

@section('title', 'Create Availability Setting')

@section('content')
<div class="container">
  <h4 class="mb-4">Create Availability Setting</h4>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <form action="{{ route('availability-settings.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="medical_team_id" class="form-label">Medical Team</label>
      <select name="medical_team_id" class="form-control">
        <option value="">Select Team</option>
        @foreach($medicalTeams as $team)
          <option value="{{ $team->id }}">{{ $team->user->name ?? 'Unknown' }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="start_shift" class="form-label">Start Shift</label>
      <input type="time" name="start_shift" class="form-control">
    </div>

    <div class="mb-3">
      <label for="end_shift" class="form-label">End Shift</label>
      <input type="time" name="end_shift" class="form-control">
    </div>

    <div class="mb-3">
      <label for="break_start" class="form-label">Break Start</label>
      <input type="time" name="break_start" class="form-control">
    </div>

    <div class="mb-3">
      <label for="break_end" class="form-label">Break End</label>
      <input type="time" name="break_end" class="form-control">
    </div>

    <div class="mb-3">
      <label for="consultation_duration" class="form-label">Consultation Duration (minutes)</label>
      <input type="number" name="consultation_duration" class="form-control">
    </div>

    <div class="mb-3">
      <label for="transport_time" class="form-label">Transport Time (minutes)</label>
      <input type="number" name="transport_time" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
  </form>
</div>
@endsection
