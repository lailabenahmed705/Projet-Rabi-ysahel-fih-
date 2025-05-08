@extends('dashboardClientLayouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Your Invoices</h1>
    @if(session('message'))
        <div class="alert alert-info text-center">{{ session('message') }}</div>
    @elseif(isset($invoices) && $invoices->isNotEmpty())
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Total Price</th>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Invoice Date</th>
                        <th>Invoice Time</th>
                        <th>Status</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoices as $invoice)
                    <tr>
                        <td>{{ $invoice->order_identifier }}</td>
                        <td>{{ $invoice->total_price }}</td>
                        <td>{{ $invoice->user_email }}</td>
                        <td>{{ $invoice->user_name }}</td>
                        <td>{{ $invoice->created_at->format('d/m/Y') }}</td>
                        <td>{{ $invoice->created_at->addHours(1)->format('H:i:s') }}</td>
                        <td>Successful</td>
                        <td><a href="{{ route('invoices.show', $invoice->id) }}" class="btn btn-primary">View</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-muted text-center">No invoices available !</p>
    @endif
</div>
@endsection

@section('styles')
<style>
    .container {
        max-width: 960px;
    }
    h1 {
        color: #04BBFF; /* Styling the header color to match the theme */
    }
    table {
        margin-top: 20px;
    }
    th, td {
        vertical-align: middle;
        text-align: center; /* Center align table headers and cells */
    }
    .btn-primary {
        background-color: #04BBFF; /* Blue background for primary button */
        border-color: #04BBFF; /* Matching border color */
    }
    .btn-primary:hover {
        background-color: #0390DC; /* Darker blue on hover */
        border-color: #0390DC; /* Matching border color on hover */
    }
</style>
@endsection
