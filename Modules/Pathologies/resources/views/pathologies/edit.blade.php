@extends('layouts/contentNavbarLayout')

@section('title', 'Edit Pathology')

@section('content')
<div class="container">
  <h4 class="py-3 mb-4">
    <span class="text-muted fw-light">Pathology Management /</span> Edit
  </h4>

  <div class="card">
    <div class="card-body">
      <form action="{{ route('pathology.update', $pathology->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="name" class="form-label">Pathology Name</label>
          <input type="text" id="name" name="name" class="form-control" value="{{ $pathology->name }}" required>
        </div>

        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea id="description" name="description" class="form-control" rows="4" required>{{ $pathology->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('pathology-team.pathology-team') }}" class="btn btn-secondary">Cancel</a>
      </form>
    </div>
  </div>
</div>
@endsection
