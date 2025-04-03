@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Geolocation</h2>
    <form action="{{ route('geolocations.update', $geolocation->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $geolocation->name }}" required>
        </div>
        <div class="mb-3">
            <label>Latitude</label>
            <input type="text" name="latitude" class="form-control" value="{{ $geolocation->latitude }}" required>
        </div>
        <div class="mb-3">
            <label>Longitude</label>
            <input type="text" name="longitude" class="form-control" value="{{ $geolocation->longitude }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('geolocations.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
