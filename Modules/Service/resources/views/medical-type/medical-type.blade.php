@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Medical Type')

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Medical Type</h4>

    <div class="text-end mb-3">
        <a href="{{ route('medical-type.createForm') }}" class="btn btn-primary">Add Medical Type</a>
    </div>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header">Medical Types Table</h5>
        <div class="table-responsive text-nowrap">
            @if($medicalTypes->isEmpty())
                <p class="text-center mt-3">No medical type available!</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Create Date</th>
                            <th>Update Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($medicalTypes as $medicalType)
                            <tr>
                                <td>{{ $medicalType->id }}</td>
                                <td>{{ $medicalType->name }}</td>
                                <td>{{ $medicalType->created_at }}</td>
                                <td>{{ $medicalType->updated_at }}</td>
                                <td>{{ $medicalType->status }}</td>
                                <td>
                                    <!-- Condition plus spécifique pour afficher les boutons uniquement dans la liste "Medical Team" -->
                                    @if(request()->routeIs('medical-type.*'))
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><span  style="width: 20px;" ></span>
                                        <img src="{{ asset('images/trois-points.png') }}" alt="Menu Icon" style="width: 23px; height: 16px;"></button>
                                        <div class="dropdown-menu">
                                            <a href="{{ route('medical-type.editForm', $medicalType->id) }}" class="dropdown-item"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                            <form action="{{ route('medical-type.destroy', $medicalType->id) }}" method="post" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this medical type?')"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
