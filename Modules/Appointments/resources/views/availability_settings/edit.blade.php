@extends('layouts/contentNavbarLayout')

@section('title', 'Edit Availability Setting')

@section('content')
<div class="container">
    <h4 class="mb-4">Edit Availability Setting</h4>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
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

    <form action="{{ route('availability-settings.update', $availabilitySetting->medical_team_id) }}" method="POST">
    @csrf
    @method('PUT')


        {{-- Champ masqué car <select> disabled n'est pas soumis --}}
        <input type="hidden" name="medical_team_id" value="{{ $availabilitySetting->medical_team_id }}">

        <div class="mb-3">
            <label for="medical_team_id" class="form-label">Medical Team</label>
            <select id="medical_team_id" class="form-control" disabled>
                @foreach ($medicalTeams as $team)
                    <option value="{{ $team->id }}" {{ $team->id == $availabilitySetting->medical_team_id ? 'selected' : '' }}>
                        {{ $team->user->name ?? 'N/A' }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="start_shift" class="form-label">Start Shift</label>
            <input type="time" name="start_shift" class="form-control"
                value="{{ old('start_shift', \Carbon\Carbon::parse($availabilitySetting->start_shift)->format('H:i')) }}" required>
        </div>

        <div class="mb-3">
            <label for="end_shift" class="form-label">End Shift</label>
            <input type="time" name="end_shift" class="form-control"
                value="{{ old('end_shift', \Carbon\Carbon::parse($availabilitySetting->end_shift)->format('H:i')) }}" required>
        </div>

        <div class="mb-3">
            <label for="break_start" class="form-label">Break Start</label>
            <input type="time" name="break_start" class="form-control"
                value="{{ old('break_start', $availabilitySetting->break_start ? \Carbon\Carbon::parse($availabilitySetting->break_start)->format('H:i') : '') }}">
        </div>

        <div class="mb-3">
            <label for="break_end" class="form-label">Break End</label>
            <input type="time" name="break_end" class="form-control"
                value="{{ old('break_end', $availabilitySetting->break_end ? \Carbon\Carbon::parse($availabilitySetting->break_end)->format('H:i') : '') }}">
        </div>

        <div class="mb-3">
            <label for="consultation_duration" class="form-label">Consultation Duration (minutes)</label>
            <input type="number" name="consultation_duration" class="form-control"
                value="{{ old('consultation_duration', $availabilitySetting->consultation_duration) }}" required>
        </div>

        <div class="mb-3">
            <label for="transport_time" class="form-label">Transport Time (minutes)</label>
            <input type="number" name="transport_time" class="form-control"
                value="{{ old('transport_time', $availabilitySetting->transport_time) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('availability-settings.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
