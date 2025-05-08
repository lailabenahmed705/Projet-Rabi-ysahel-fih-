@extends('layouts/contentNavbarLayout')

@section('title', 'Show Role Details')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-gradient-purple text-white text-center">
                    <h4 class="py-3 mb-0" style="color:white">Role Details: {{ $role->name }}</h4>
                </div>
                <div class="card-body p-4">
                    @if($role->permissions->isEmpty())
                        <p class="text-center">No permissions assigned to this role.</p>
                    @else
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Permission Name</th>
                                    <th>Guard</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($role->permissions as $index => $permission)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->guard_name }}</td>
                                        <td>{{ $permission->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                    <div class="text-center mt-4">
                        <a href="{{ route('roles.index') }}" class="btn btn-secondary">← Back to Roles</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-gradient-purple {
        background: linear-gradient(135deg, #6f42c1 0%, #4b0082 100%);
    }

    .card {
        border-radius: 15px;
        overflow: hidden;
    }

    .card-header {
        border-radius: 15px 15px 0 0;
        border-bottom: none;
        position: relative;
        overflow: hidden;
    }

    .card-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background: rgba(0, 0, 0, 0.1);
        pointer-events: none;
    }

    .table th, .table td {
        vertical-align: middle;
        padding: 0.75rem;
    }
</style>
@endsection
