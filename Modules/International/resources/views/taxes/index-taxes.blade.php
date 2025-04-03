{{-- resources/views/taxes/index-taxes.blade.php --}}
@extends('layouts/contentNavbarLayout')

@section('content')
@include('international::layouts.TaxesHeader')


<div class="container">
    <div class="mb-3">
        <a href="{{ route('taxes.create') }}" class="btn btn-primary">Add Tax</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Rate</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($taxes as $tax)
            <tr>
                <td>{{ $tax->name }}</td>
                <td>{{ $tax->rate }}{{ $tax->type == 'percentage' ? '%' : '' }}</td>
                <td>{{ $tax->type }}</td>
                <td>
                  <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="mdi mdi-dots-vertical"></i>
                                                </button>
                                        <div class="dropdown-menu">
                                            <a href="{{ route('taxes.edit', $tax->id) }}" class="dropdown-item"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                            <form action="{{ route('taxes.destroy', $tax->id) }}" method="post" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this medical type?')"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</button>
                                            </form>
                                        </div>
                  </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
