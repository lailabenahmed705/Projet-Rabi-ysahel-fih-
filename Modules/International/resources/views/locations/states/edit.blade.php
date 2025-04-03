@extends('layouts/contentNavbarLayout')

@section('title', 'Edit State')

@section('content')
@include('international::layouts.locationHeader')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit State</h3>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('locations.states.update', $state->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label for="name">State Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $state->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="iso_code">ISO Code</label>
                            <input type="text" id="iso_code" name="iso_code" class="form-control" value="{{ $state->iso_code }}" required>
                        </div>

                        <div class="form-group">
                            <label for="country_id">Country</label>
                            <select id="country_id" name="country_id" class="form-control" required>
                                <option value="">Select Country</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}" {{ $state->country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group form-check">
                            <input type="hidden" name="status" value="inactive">
                            <input type="checkbox" id="status" name="status" class="form-check-input" value="active" {{ $state->status == 'active' ? 'checked' : '' }}>
                            <label for="status" class="form-check-label">Active</label>
                        </div>

                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
