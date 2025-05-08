@extends('layouts/contentNavbarLayout')


@section('content')
    <div class="container">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Facture /</span> Détail</h4>

        <div class="card mb-4">
            <div class="card-body">
                <h5>Facture #{{ $invoice->id }}</h5>
                <p><strong>Référence :</strong> {{ $invoice->order_identifier }}</p>
                <p><strong>Nom :</strong> {{ $invoice->user_name }}</p>
                <p><strong>Email :</strong> {{ $invoice->user_email }}</p>
                <p><strong>Montant :</strong> {{ $invoice->total_price }} TND</p>
                <p><strong>Date de création :</strong> {{ $invoice->created_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>

        <a href="{{ route('invoices.index') }}" class="btn btn-secondary">← Retour à la liste</a>
    </div>
@endsection
