@extends('layouts/contentNavbarLayout')

@section('content')
<div class="container mt-5">
    <div class="col-md-11 mx-auto">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-gradient-purple text-white text-center">
                <h4 class="py-3 mb-0" style="color:white">Permission Details</h4>
            </div>
            <div class="card-body">
                <h5><strong>Name:</strong> {{ $permission->name }}</h5>
                <h6 class="mt-4 mb-2"><strong>Roles that have this permission:</strong></h6>
                <ul class="list-group">
                    @forelse($permission->roles as $role)
                        <li class="list-group-item">{{ $role->name }}</li>
                    @empty
                        <li class="list-group-item text-muted">No roles assigned.</li>
                    @endforelse
                </ul>

                <div class="mt-4">
                    <a href="{{ route('permissions.index') }}" class="btn btn-outline-secondary">← Back to Permissions</a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('permission::permissions.style')
@endsection
