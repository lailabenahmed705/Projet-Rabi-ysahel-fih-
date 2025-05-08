@extends('layouts/contentNavbarLayout')

@section('content')
@include('international::layouts.locationHeader')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add staes</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
    <form action="{{ route('locations.states.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">State Name</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="iso_code">ISO Code</label>
            <input type="text" id="iso_code" name="iso_code" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="country_id">Country</label>
            <select id="country_id" name="country_id" class="form-control" required>
                <option value="">Select Country</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group form-check">
        <input type="hidden" name="status" value="inactive">
        <input type="checkbox" id="status" name="status" class="form-check-input" value="active" checked>
            <label for="status" class="form-check-label">Active</label>
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
