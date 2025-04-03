@extends('layouts/contentNavbarLayout')

@section('title', 'Location Settings')

@section('content')
@include('international::layouts.locationHeader')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Countries Table</h3>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table" id="countries-table">
                        <thead>
                            <tr>
                                <th>
                                    <input type="text" id="search-id" class="form-control search-input" placeholder="Search ID">
                                </th>
                                <th>
                                    <input type="text" id="search-name" class="form-control search-input" placeholder="Search Name">
                                </th>
                                <th>
                                    <input type="text" id="search-phone-code" class="form-control search-input" placeholder="Search Phone Code">
                                </th>
                                <th>
                                    <input type="text" id="search-region" class="form-control search-input" placeholder="Search Region">
                                </th>
                                <th>
                                    <select id="search-status" class="form-control search-input">
                                        <option value="">All</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </th>
                                <th>
                                    <button id="search-button" class="btn btn-purple">Search</button>
                                </th>
                            </tr>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone code</th>
                                <th>Region</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($countries as $country)
                                <tr>
                                    <td>{{ $country->id }}</td>
                                    <td>{{ $country->name }}</td>
                                    <td>{{ $country->phone_code }}</td>
                                    <td>{{ $country->region }}</td>
                                    <td>{{ $country->status }}</td>
                                    <td>
                                    <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="mdi mdi-dots-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                <a href="{{ route('locations.countries.edit', $country->id) }}" class="dropdown-item"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                                @csrf
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
    function performSearch() {
        var searchId = document.getElementById('search-id').value.toLowerCase();
        var searchName = document.getElementById('search-name').value.toLowerCase();
        var searchPhoneCode = document.getElementById('search-phone-code').value.toLowerCase();
        var searchRegion = document.getElementById('search-region').value.toLowerCase();
        var searchStatus = document.getElementById('search-status').value.toLowerCase();
        var rows = document.querySelectorAll('#countries-table tbody tr');

        rows.forEach(function(row) {
            var id = row.cells[0].textContent.toLowerCase();
            var name = row.cells[1].textContent.toLowerCase();
            var phoneCode = row.cells[2].textContent.toLowerCase();
            var region = row.cells[3].textContent.toLowerCase();
            var status = row.cells[4].textContent.toLowerCase();
            var match = true;

            if (searchId && !id.includes(searchId)) match = false;
            if (searchName && !name.includes(searchName)) match = false;
            if (searchPhoneCode && !phoneCode.includes(searchPhoneCode)) match = false;
            if (searchRegion && !region.includes(searchRegion)) match = false;
            if (searchStatus && searchStatus !== "" && searchStatus !== status) match = false;

            if (match) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    document.getElementById('search-button').addEventListener('click', performSearch);

    document.querySelectorAll('.search-input').forEach(input => {
        input.addEventListener('keypress', function(event) {
            if (event.keyCode === 13) { // Enter key
                performSearch();
            }
        });
    });
</script>

@endsection
