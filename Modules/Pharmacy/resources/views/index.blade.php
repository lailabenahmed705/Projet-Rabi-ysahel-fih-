@extends('layouts/contentNavbarLayout')

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Pharmacy /</span> All Pharmacies
</h4>

<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Pharmacy List</h5>
    <a href="{{ route('pharmacy.createForm') }}" class="btn btn-primary">Add Pharmacy</a>
  </div>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>City</th>
          <th>Address</th>
          <th>Phone</th>
          <th class="text-end">Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($pharmacies as $pharmacy)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $pharmacy->name }}</td>
          <td>{{ $pharmacy->city->name ?? '-' }}</td>
          <td>{{ $pharmacy->address }}</td>
          <td>{{ $pharmacy->phone }}</td>
          <td class="text-end">
            <a href="{{ route('pharmacy.edit', $pharmacy->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
            <form action="{{ route('pharmacy.destroy', $pharmacy->id) }}" method="POST" class="d-inline">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this pharmacy?')">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
