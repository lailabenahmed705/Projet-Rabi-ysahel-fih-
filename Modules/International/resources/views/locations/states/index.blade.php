@extends('layouts/contentNavbarLayout')

@section('title', 'Location Settings')

@section('content')
@include('international::layouts.locationHeader')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>States Table</h3>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="GET" action="{{ route('locations.states.index') }}">
                        <table class="table" id="states-table">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="text" name="name" id="search-name" class="form-control" placeholder="Search Name" value="{{ request('name') }}">
                                    </th>
                                    <th>
                                        <input type="text" name="iso_code" id="search-state-code" class="form-control" placeholder="Search State Code" value="{{ request('iso_code') }}">
                                    </th>
                                    <th>
                                        <input type="text" name="country" id="search-country" class="form-control" placeholder="Search Country" value="{{ request('country') }}">
                                    </th>
                                    <th>
                                        <select name="status" id="search-status" class="form-control">
                                            <option value="">All</option>
                                            <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </th>
                                    <th>
                                        <button type="submit" class="btn btn-secondary">Search</button>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <th>iso_code</th>
                                    <th>Country</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($states as $state)
                                    <tr>
                                        <td>{{ $state->name }}</td>
                                        <td>{{ $state->iso_code }}</td>
                                        <td>{{ data_get($state, 'country.name', '-') }}</td>

                                        <td>{{ ucfirst($state->status) }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="mdi mdi-dots-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ route('locations.states.edit', $state->id) }}">
                                                        <i class="mdi mdi-pencil-outline me-1"></i> Edit
                                                    </a>
                                                    <form method="POST" action="{{ route('locations.states.destroy', $state->id) }}" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item text-danger">
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
