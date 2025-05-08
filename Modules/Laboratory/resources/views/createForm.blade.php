@extends('layouts/contentNavbarLayout')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Create Laboratory</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('laboratory.store') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Laboratory Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="city_id" class="form-label">City</label>
            <select name="city_id" class="form-select" required>
                <option value="">Select City</option>
                @foreach($cities as $city)
                    <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>
                        {{ $city->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <select name="country_id" class="form-select" required>
                <option value="">Select Country</option>
                    @foreach($countries as $country)
                         <option value="{{ $country->id }}">{{ $country->name }}</option>
                     @endforeach
                  </select>


        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" value="{{ old('address') }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email (optional)</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
        </div>

        <button type="submit" class="btn btn-primary">Save Laboratory</button>
    </form>
</div>
@endsection
