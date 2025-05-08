@extends('layouts/contentNavbarLayout')

@section('content')
<div class="container">
    <h2>Service Subcategories</h2>
    <a href="{{ route('service-subcategories.create') }}" class="btn btn-primary mb-3">Add New Subcategory</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Subcategory Name</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subcategories as $subcategory)
                <tr>
                    <td>{{ $subcategory->name }}</td>
                    <td>{{ $subcategory->category->name ?? '-' }}</td>
                    <td>
                        <a href="{{ route('service-subcategories.edit', $subcategory->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('service-subcategories.destroy', $subcategory->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Confirm Delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
