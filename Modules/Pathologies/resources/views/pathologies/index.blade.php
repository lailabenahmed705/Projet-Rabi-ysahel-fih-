@extends('layouts/contentNavbarLayout')

@section('title', 'Pathology List')

@section('content')
<div class="container">
  <h4 class="py-3 mb-4">
    <span class="text-muted fw-light">Pathology Management /</span> List
  </h4>

  <!-- Add Button -->
  <div class="mb-3">
    <a href="{{ route('pathology.createForm') }}" class="btn btn-primary">
      <i class="mdi mdi-plus me-1"></i> Add New Pathology
    </a>
  </div>

  <!-- Pathology Table -->
  <div class="card">
    <div class="table-responsive text-nowrap">
      <table class="table table-bordered table-hover">
        <thead class="table-light">
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Created At</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($pathologies as $pathology)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $pathology->name }}</td>
              <td>{{ $pathology->description }}</td>
              <td>{{ $pathology->created_at->format('Y-m-d') }}</td>
              <td>
                <a href="{{ route('pathology.show', $pathology->id) }}" class="btn btn-sm btn-info">View</a>
                <a href="{{ route('pathology.edit', $pathology->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('pathology.destroy', $pathology->id) }}" method="POST" style="display:inline-block;">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this pathology?')">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="text-center">No pathologies found.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
