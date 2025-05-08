@extends('layouts/contentNavbarLayout')

@section('title', 'Appointments Table')

@section('content')
<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">Appointments /</span> List
</h4>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="text-end mb-3">
    <a href="{{ route('appointments.step1') }}" class="btn btn-primary">Add Appointment</a>
</div>

<div class="card">
    <h5 class="card-header">Appointments Table</h5>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Medical Team</th>
                    <th>Service</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->id }}</td>
                        <td>{{ $appointment->medicalTeam->user->name ?? '—' }}</td>
                        <td>{{ $appointment->service->name ?? '—' }}</td>
                        <td>{{ $appointment->availability_date ?? '—' }}</td>
                        <td>{{ $appointment->availability_time ?? '—' }}</td>

                        <td>{{ ucfirst(str_replace('_', ' ', $appointment->appointment_location)) }}</td>
                        <td class="text-nowrap">
                            <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-sm btn-info">
                                <i class="mdi mdi-pencil-outline"></i> Edit
                            </a>

                            <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');">
                                    <i class="mdi mdi-trash-can-outline"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center">No appointments found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
