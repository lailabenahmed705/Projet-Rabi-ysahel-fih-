@extends('layouts/contentNavbarLayout')

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Pharmacy /</span> Create Pharmacy
</h4>

<div class="card">
  <div class="card-body">
    <form action="{{ route('pharmacy.store') }}" method="POST">
      @csrf

      <div class="row gy-4">
        <div class="col-md-6">
          <div class="form-floating form-floating-outline">
            <input type="text" id="name" name="name" class="form-control" required />
            <label for="name">Pharmacy Name</label>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-floating form-floating-outline">
            <select name="city_id" id="city_id" class="form-select">
              <option value="">Select City</option>
              @foreach($cities as $city)
              <option value="{{ $city->id }}">{{ $city->name }}</option>
              @endforeach
            </select>
            <label for="city_id">City</label>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-floating form-floating-outline">
            <input type="text" id="address" name="address" class="form-control" required />
            <label for="address">Address</label>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-floating form-floating-outline">
            <input type="text" id="phone" name="phone" class="form-control" required />
            <label for="phone">Phone</label>
          </div>
        </div>

        <div class="text-end">
          <button type="submit" class="btn btn-primary">Create</button>
          <a href="{{ route('pharmacy.pharmacy') }}" class="btn btn-secondary">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
