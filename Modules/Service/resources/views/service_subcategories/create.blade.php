@extends('layouts/contentNavbarLayout')

@section('content')
<div class="container">
    <h2>Create Service Subcategory</h2>

    <form action="{{ route('service-subcategories.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="service_category_id">Select Category</label>
            <select name="service_category_id" class="form-control" required>
                <option value="">-- Choose Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="name">Subcategory Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <button class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
