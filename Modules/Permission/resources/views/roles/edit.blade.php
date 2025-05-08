@extends('layouts/contentNavbarLayout')

@section('title', 'Edit Role')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-gradient-purple text-white">
                    <h4 class="py-3 mb-0 text-center" style="color:white">Edit Role</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('roles.update', $role->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mb-4">
                            <label for="name" class="form-label">Role Name</label>
                            <input type="text" class="form-control form-control-lg" id="name" name="name"
                                   value="{{ old('name', $role->name) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="guard_name" class="form-label">Guard Name</label>
                            <input type="text" class="form-control form-control-lg" id="guard_name" name="guard_name"
                                   value="{{ old('guard_name', $role->guard_name) }}" required>
                        </div>

                        {{-- Optional: Edit Permissions --}}
                        <div class="mb-4">
                            <label class="form-label">Assign Permissions</label>
                            <div class="row">
                                @foreach($permissions as $permission)
                                    <div class="col-md-6 mb-2">
                                        <div class="form-check">
                                            <input class="form-check-input"
                                                   type="checkbox"
                                                   name="permissions[]"
                                                   value="{{ $permission->name }}"
                                                   id="permission_{{ $permission->id }}"
                                                   {{ $role->permissions->contains('name', $permission->name) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="permission_{{ $permission->id }}">
                                                {{ $permission->name }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-purple btn-lg mx-2" style="color:white">Update</button>
                            <a href="{{ route('roles.index') }}" class="btn btn-secondary btn-lg mx-2">Cancel</a>
                        </div>
                    </form>
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
    }
    .card-header {
        border-radius: 15px 15px 0 0;
        border-bottom: none;
    }
    .form-control-lg, .form-select-lg {
        border-radius: 10px;
    }
    .btn-lg {
        border-radius: 10px;
        padding: 10px 20px;
    }
    .btn-purple {
        background-color: #6f42c1;
        border-color: #6f42c1;
    }
    .btn-purple:hover {
        background-color: #4b0082;
        border-color: #4b0082;
    }
    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }
    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
    }
</style>
@endsection
