@extends('layouts/contentNavbarLayout')
@section('content')
    <div class="container">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Factures /</span> Liste</h4>

        <div class="card">
            <div class="card-body">
                @if($invoices->isEmpty())
                    <div class="alert alert-warning">Aucune facture disponible.</div>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Référence</th>
                                <th>Montant</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($invoices as $invoice)
                                <tr>
                                    <td>{{ $invoice->id }}</td>
                                    <td>{{ $invoice->order_identifier }}</td>
                                    <td>{{ $invoice->total_price }} TND</td>
                                    <td>{{ $invoice->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <a href="{{ route('invoices.show', $invoice->id) }}" class="btn btn-sm btn-primary">Voir</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
