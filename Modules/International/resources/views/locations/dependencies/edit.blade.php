@extends('layouts/contentNavbarLayout')

@section('page-script')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

@endsection

@section('content')
<h2>Edit Country</h2>
    <form action="{{ route('locations.dependencies.update', $dependency->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="dependency_name">Dependency Name</label>
            <input type="text" id="dependency_name" class="form-control" value="{{ $dependency->name }}" disabled>
        </div>



        <div class="form-group">
            <label for="state">State</label>
            <input type="text" id="state" class="form-control" value="{{ $dependency->state->name }}" disabled>
        </div>

        <div class="form-group form-check">
            <input type="checkbox" id="status" name="status" class="form-check-input" {{ $dependency->status = 'inactive' ? '' : 'checked'  }}>
            <label for="status" class="form-check-label">Active</label>

        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>
@endsection
