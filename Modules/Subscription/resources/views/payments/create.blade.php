@extends('layouts/contentNavbarLayout')

@section('content')
<div class="container">
    <h2>Add Payment</h2>
    <form method="POST" action="{{ route('payments.store') }}">
        @csrf
        <div class="mb-3">
            <label>Reference</label>
            <input type="text" name="reference" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Order Identifier</label>
            <input type="text" name="order_identifier" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Amount (€)</label>
            <input type="number" name="amount" step="0.01" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>User ID</label>
            <input type="number" name="user_id" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
