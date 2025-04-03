@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Geolocation</h2>
    <form action="{{ route('geolocations.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Latitude</label>
            <input type="text" name="latitude" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Longitude</label>
            <input type="text" name="longitude" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('geolocations.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
