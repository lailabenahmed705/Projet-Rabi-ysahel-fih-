@extends('layouts/contentNavbarLayout')

@section('title', 'Edit Country')

@section('content')
@include('international::layouts.locationHeader')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Country</h3>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('locations.countries.update', $country->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label for="name">Country Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $country->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="iso3">ISO3 Code</label>
                            <input type="text" id="iso3" name="iso3" class="form-control" value="{{ $country->iso3 }}" required>
                        </div>

                        <div class="form-group">
                            <label for="numeric_code">Numeric Code</label>
                            <input type="text" id="numeric_code" name="numeric_code" class="form-control" value="{{ $country->numeric_code }}" required>
                        </div>

                        <div class="form-group">
                            <label for="phone_code">Phone Code</label>
                            <input type="text" id="phone_code" name="phone_code" class="form-control" value="{{ $country->phone_code }}" required>
                        </div>

                        <div class="form-group">
                            <label for="currency_name">Currency Name</label>
                            <select id="currency_name" name="currency_name" class="form-control">
                                @foreach($currencies as $currency)
                                    <option value="{{ $currency->name }}" {{ $country->currency_name == $currency->name ? 'selected' : '' }}>{{ $currency->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="region">Region</label>
                            <input type="text" id="region" name="region" class="form-control" value="{{ $country->region }}" required>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control">
                                <option value="active" {{ $country->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $country->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
