@extends('layouts/contentNavbarLayout')

@section('title', 'Location Settings')

@section('content')
@include('international::layouts.locationHeader')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Dependencies Table</h3>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table" id="dependencies-table">
                        <thead>
                            <tr>
                                <th>
                                    <input type="text" id="search-name" class="form-control" placeholder="Search Name">
                                </th>
                                <th>
                                    <input type="text" id="search-state" class="form-control" placeholder="Search State">
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
                                <th>State</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dependencies as $dependency)
                                <tr>
                                    <td>{{ $dependency->name }}</td>
                                    <td>{{ $dependency->state->name }}</td>
                                    <td>{{ ucfirst($dependency->status) }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <img src="{{ asset('images/trois-points.png') }}" alt="Menu Icon" style="width: 23px; height: 16px;">
                                            </button>
                                            <div class="dropdown-menu">
                                                <a href="{{ route('locations.dependencies.edit', $dependency->id) }}" class="dropdown-item">
                                                    <i class="mdi mdi-pencil-outline me-1"></i> Edit
                                                </a>
                                                <form action="{{ route('locations.dependencies.destroy', $dependency->id) }}" method="post" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this dependency?')">
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
        var searchState = document.getElementById('search-state').value.toLowerCase();
        var searchStatus = document.getElementById('search-status').value.toLowerCase();
        var rows = document.querySelectorAll('#dependencies-table tbody tr');

        rows.forEach(function(row) {
            var name = row.cells[0].textContent.toLowerCase();
            var state = row.cells[1].textContent.toLowerCase();
            var status = row.cells[2].textContent.toLowerCase();
            var match = true;

            if (searchName && !name.includes(searchName)) match = false;
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
