@extends('layouts/contentNavbarLayout')

@section('content')
<div class="container">
    <h2 class="mb-4">Feature List</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('features.create') }}" class="btn btn-primary mb-3">Add Feature</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Consumable</th>
                <th>Periodicity</th>
                <th>Type</th>
                <th>Quota</th>
                <th>Postpaid</th>
            </tr>
        </thead>
        <tbody>
            @foreach($features as $feature)
            <tr>
                <td>{{ $feature->name }}</td>
                <td>{{ $feature->consumable ? 'Yes' : 'No' }}</td>
                <td>{{ $feature->periodicity ?? '-' }}</td>
                <td>{{ $feature->periodicity_type ?? '-' }}</td>
                <td>{{ $feature->quota ? 'Yes' : 'No' }}</td>
                <td>{{ $feature->postpaid ? 'Yes' : 'No' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
