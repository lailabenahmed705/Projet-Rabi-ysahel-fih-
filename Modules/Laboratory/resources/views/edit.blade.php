@extends('layouts/contentNavbarLayout')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Laboratories /</span> Edit</h4>

<div class="card">
  <div class="card-body">
    <form action="{{ route('laboratory.update', $laboratory->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="name" class="form-label">Laboratory Name</label>
        <input type="text" class="form-control" name="name" value="{{ $laboratory->name }}" required>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" value="{{ $laboratory->email }}">
      </div>

      <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control" name="phone" value="{{ $laboratory->phone }}">
      </div>

      <div class="mb-3">
        <label for="country_id" class="form-label">Country</label>
        <select name="country_id" class="form-control">
          @foreach($countries as $id => $name)
            <option value="{{ $id }}" {{ $laboratory->address->country_id == $id ? 'selected' : '' }}>{{ $name }}</option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="city_id" class="form-label">City</label>
        <select name="city_id" class="form-control">
          @foreach($cities as $id => $name)
            <option value="{{ $id }}" {{ $laboratory->address->city_id == $id ? 'selected' : '' }}>{{ $name }}</option>
          @endforeach
        </select>
      </div>

      <button type="submit" class="btn btn-warning">Update</button>
    </form>
  </div>
</div>
@endsection
