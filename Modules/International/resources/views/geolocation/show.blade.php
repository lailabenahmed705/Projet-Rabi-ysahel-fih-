@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Geolocation Details</h2>

    @if ($geolocation)
        <p><strong>Name:</strong> {{ $geolocation->name }}</p>
        <p><strong>Latitude:</strong> {{ $geolocation->latitude }}</p>
        <p><strong>Longitude:</strong> {{ $geolocation->longitude }}</p>
    @else
        <p class="text-danger">Geolocation not found.</p>
    @endif

    <a href="{{ route('geolocations.index') }}" class="btn btn-secondary">Back</a>
</div>

@endsection
