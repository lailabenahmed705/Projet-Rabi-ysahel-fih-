<!-- resources/views/medical-type/edit.blade.php -->
@extends('layouts/contentNavbarLayout')

@section('title', 'Edit Medical Type')

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Edit Medical Type /</span> {{ $medicalType->name }}</h4>

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('medical-type.update', $medicalType->id) }}">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="name" class="form-label">Medical Type Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $medicalType->name }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update Medical Type</button>
            </form>
        </div>
    </div>
@endsection
