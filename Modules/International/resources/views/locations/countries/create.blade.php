@extends('layouts/contentNavbarLayout')

@section('content')
@include('international::layouts.locationHeader')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Country</div>

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

                    {{-- Formulaire d'ajout de pays --}}
                    <form action="{{ route('locations.countries.store') }}" method="POST">
                        @csrf

        <div class="mb-3">
            <label for="country_name">Country Name</label>
            <input type="text" id="country_name" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="iso3">ISO3 Code</label>
            <input type="text" id="iso3" name="iso3" class="form-control" required>
        </div>

        <div class="fmb-3">
            <label for="numeric_code">Numeric Code</label>
            <input type="text" id="numeric_code" name="numeric_code" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="phone_code">Phone Code</label>
            <input type="text" id="phone_code" name="phone_code" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="currency_name">Currency Name</label>
            <select id="currency_name" name="currency_name" class="form-control">
                @foreach($currencies as $currency)
                    <option value="{{ $currency->name }}">{{ $currency->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="region">Region</label>
            <input type="text" id="region" name="region" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
