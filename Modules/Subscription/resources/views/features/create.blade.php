@extends('layouts/contentNavbarLayout')

@section('content')
<div class="container">
    <h2 class="mb-4">Add New Feature</h2>

    <form action="{{ route('features.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Feature Name</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label for="consumable" class="form-label">Consumable</label>
            <select name="consumable" class="form-select" required>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="periodicity" class="form-label">Periodicity</label>
            <input type="number" name="periodicity" class="form-control" value="{{ old('periodicity') }}">
        </div>

        <div class="mb-3">
            <label for="periodicity_type" class="form-label">Periodicity Type</label>
            <input type="text" name="periodicity_type" class="form-control" value="{{ old('periodicity_type') }}">
        </div>

        <div class="mb-3">
            <label for="quota" class="form-label">Quota</label>
            <select name="quota" class="form-select" required>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="postpaid" class="form-label">Postpaid</label>
            <select name="postpaid" class="form-select" required>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Save Feature</button>
    </form>
</div>
@endsection
