@extends('layouts/contentNavbarLayout')

@section('title', 'Availability Settings')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">All Availability Settings</h4>
        <a href="{{ route('availability-settings.create') }}" class="btn btn-primary">ADD NEW</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm rounded-3 p-3">
        <h5 class="card-header bg-white">Availability Settings Table</h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Medical Team</th>
                            <th>Start Shift</th>
                            <th>End Shift</th>
                            <th>Break Start</th>
                            <th>Break End</th>
                            <th>Consultation Duration</th>
                            <th>Transport Time</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($availabilitySettings as $setting)
                            <tr>
                                <td>{{ $setting->medicalTeam->user->name ?? '-' }}</td>
                                <td>{{ $setting->start_shift }}</td>
                                <td>{{ $setting->end_shift }}</td>
                                <td>{{ $setting->break_start ?? '-' }}</td>
                                <td>{{ $setting->break_end ?? '-' }}</td>
                                <td>{{ $setting->consultation_duration }} min</td>
                                <td>{{ $setting->transport_time }} min</td>
                                <td>
    <div class="d-flex gap-2">
        <a href="{{ route('availability-settings.edit', $setting->id) }}" class="btn btn-sm btn-warning">
            <i class="mdi mdi-pencil-outline"></i> EDIT
        </a>
        <form action="{{ route('availability-settings.destroy', $setting->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                <i class="mdi mdi-trash-can-outline"></i> DELETE
            </button>
        </form>
    </div>
</td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted">No availability settings found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
