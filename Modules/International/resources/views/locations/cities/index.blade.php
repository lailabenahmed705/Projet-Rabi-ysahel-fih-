@extends('layouts/contentNavbarLayout')

@section('title', 'Location Settings')

@section('content')
@include('international::layouts.locationHeader')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-3 text-end">
                        <a href="{{ route('locations.cities.create') }}" class="btn btn-primary">Add City</a>
                    </div>

                    <table class="table" id="cities-table">
                        <thead>
                            <tr>
                                <th>
                                    <input type="text" id="search-name" class="form-control" placeholder="Search Name">
                                </th>
                                <th>
                                    <input type="text" id="search-postal_code" class="form-control" placeholder="Search Postal Code">
                                </th>
                                <th>
                                    <input type="text" id="search-dependency" class="form-control" placeholder="Search State">
                                </th>
                                <th>
                                    <select id="search-status" class="form-control">
                                        <option value="">All</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </th>
                                <th>
                                    <button id="search-button" class="btn btn-secondary">Search</button>
                                </th>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <th>postal Code</th>
                                <th>State</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cities as $city)
                                <tr>
                                    <td>{{ $city->name }}</td>
                                    <td>{{ $city->postal_code }}</td>
                                    <td>{{ $city->state ? $city->state->name : 'No State' }}</td>
                                    <td>{{ ucfirst($city->status) }}</td>
                                    <td>
                                        <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="mdi mdi-dots-vertical"></i>
                                                </button>
                                            <div class="dropdown-menu">
                                                <a href="{{ route('locations.cities.edit', $city->id) }}" class="dropdown-item">
                                                    <i class="mdi mdi-pencil-outline me-1"></i> Edit
                                                </a>
                                                <form action="{{ route('locations.cities.destroy', $city->id) }}" method="post" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this city?')">
                                                        <i class="mdi mdi-trash-can-outline me-1"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('search-button').addEventListener('click', function() {
        var searchName = document.getElementById('search-name').value.toLowerCase();
        var searchIsoCode = document.getElementById('search-iso-code').value.toLowerCase();
        var searchState = document.getElementById('search-state').value.toLowerCase();
        var searchStatus = document.getElementById('search-status').value.toLowerCase();
        var rows = document.querySelectorAll('#cities-table tbody tr');

        rows.forEach(function(row) {
            var name = row.cells[0].textContent.toLowerCase();
            var isoCode = row.cells[1].textContent.toLowerCase();
            var state = row.cells[2].textContent.toLowerCase();
            var status = row.cells[3].textContent.toLowerCase();
            var match = true;

            if (searchName && !name.includes(searchName)) match = false;
            if (searchIsoCode && !isoCode.includes(searchIsoCode)) match = false;
            if (searchState && !state.includes(searchState)) match = false;
            if (searchStatus && searchStatus !== "" && searchStatus !== status) match = false;

            if (match) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>

@endsection
