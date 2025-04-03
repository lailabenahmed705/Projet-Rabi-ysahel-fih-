@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Geolocations</h2>
    <a href="{{ route('geolocations.create') }}" class="btn btn-primary">Create New Geolocation</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($geolocations as $geo)
            <tr>
                <td>{{ $geo->id }}</td>
                <td>{{ $geo->name }}</td>
                <td>{{ $geo->latitude }}</td>
                <td>{{ $geo->longitude }}</td>
                <td>
                    <a href="{{ route('geolocations.show', $geo->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('geolocations.edit', $geo->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('geolocations.destroy', $geo->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $geolocations->links() }}
</div>
@endsection
