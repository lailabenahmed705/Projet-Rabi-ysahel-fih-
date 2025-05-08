@extends('layouts/contentNavbarLayout')

@section('content')
<div class="container">
    <h4 class="my-4">Complete Medical Team List</h4>

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('create-medical-team') }}" class="btn btn-primary">
            <i class="mdi mdi-plus-circle-outline"></i> Add Medical Team
        </a>
    </div>

    @if($medicalTeams->isEmpty())
        <p>No team members found.</p>
    @else
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Specialty</th>
                    <th>Actions</th> <!-- Nouvelle colonne -->
                </tr>
            </thead>
            <tbody>
                @foreach($medicalTeams as $team)
                    <tr>
                        <td>{{ $team->user->name }}</td>
                        <td>{{ $team->user->email }}</td>
                        <td>{{ $team->user->phone }}</td>
                        <td>{{ $team->medicalType->name ?? 'Not defined' }}</td>
                        <td>

                        <a href="{{ route('medical-team.showDetails', $team->id) }}" class="btn btn-sm btn-info">
                           <i class="mdi mdi-eye"></i> View
                              </a>

                            <a href="{{ route('medical-team.editForm', $team->id) }}" class="btn btn-sm btn-warning">
                                <i class="mdi mdi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('medical-team.destroy', $team->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this member?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="mdi mdi-delete"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
