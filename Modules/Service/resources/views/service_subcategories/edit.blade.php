
@extends('layouts/contentNavbarLayout')
@section('content')
<div class="container">
    <h2>Edit Service Subcategory</h2>

    <form action="{{ route('service-subcategories.update', $serviceSubCategory->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="service_category_id">Select Category</label>
            <select name="service_category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $serviceSubCategory->service_category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="name">Subcategory Name</label>
            <input type="text" name="name" value="{{ $serviceSubCategory->name }}" class="form-control" required>
        </div>

        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
