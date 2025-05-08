@extends('layouts/contentNavbarLayout')

@section('title', 'View Pathology')

@section('content')
<div class="container">
  <h4 class="py-3 mb-4">
    <span class="text-muted fw-light">Pathology Management /</span> View
  </h4>

  <div class="card">
    <div class="card-body">
      <h5><strong>Name:</strong> {{ $pathology->name }}</h5>
      <p><strong>Description:</strong></p>
      <p>{{ $pathology->description }}</p>

      <a href="{{ route('pathology-team.pathology-team') }}" class="btn btn-secondary mt-3">Back to List</a>
    </div>
  </div>
</div>
@endsection
