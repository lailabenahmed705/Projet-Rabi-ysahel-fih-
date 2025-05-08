@extends('layouts/contentNavbarLayout')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Laboratories /</span> List</h4>

<div class="card">
  <div class="card-body">
    <a href="{{ route('laboratory.createForm') }}" class="btn btn-primary mb-3">Add New Laboratory</a>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Country</th>
          <th>City</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($laboratories as $lab)
        <tr>
          <td>{{ $lab->name }}</td>
          <td>{{ $lab->email }}</td>
          <td>{{ $lab->phone }}</td>
          <td>{{ $lab->address->country->name ?? '-' }}</td>
          <td>{{ $lab->address->city->name ?? '-' }}</td>
          <td>
            <a href="{{ route('laboratory.edit', $lab->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('laboratory.destroy', $lab->id) }}" method="POST" style="display:inline-block;">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this laboratory?')">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
