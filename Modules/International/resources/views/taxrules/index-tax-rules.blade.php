{{-- resources/views/tax-rules/index-tax-rules.blade.php --}}
@extends('layouts/contentNavbarLayout')

@section('content')
@include('international::layouts.TaxesHeader')

<div class="container">
    <a href="{{ route('taxrules.create') }}" class="btn btn-primary mb-3">Add Tax Rule</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Country</th>
                <th scope="col">Tax</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($taxRules as $rule)
            <tr>
                <th scope="row">{{ $rule->id }}</th>
                <td>{{ $rule->country->name }}</td>
                <td>{{ $rule->tax->name }}</td>
                <td>
                  <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="mdi mdi-dots-vertical"></i>
                                                </button>
                                        <div class="dropdown-menu">
                                            <a href="{{ route('taxrules.edit', $rule->id) }}" class="dropdown-item"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                            <form action="{{ route('taxrules.destroy', $rule->id) }}" method="post" style="display:inline;">
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
