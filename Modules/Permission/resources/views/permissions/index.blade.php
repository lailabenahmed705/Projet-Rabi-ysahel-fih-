@extends('layouts/contentNavbarLayout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-gradient-purple text-white text-center">
                    <h4 class="py-3 mb-0" style="color:white">Permissions Table</h4>
                </div>
                <div class="table-responsive text-nowrap p-4">
                    <table class="table table-hover table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Guard Name</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->id }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->guard_name }}</td>
                                    <td>{{ $permission->created_at }}</td>
                                    <td>{{ $permission->updated_at }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <img src="{{ asset('images/trois-points.png') }}" alt="Menu Icon" class="menu-icon">
                                            </button>
                                            <div class="dropdown-menu">
                                                <a href="{{ route('permissions.show', $permission->id) }}" class="dropdown-item">
                                                    <i class="mdi mdi-eye-outline me-1"></i> Show Roles
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('permission::permissions.style')
@endsection
