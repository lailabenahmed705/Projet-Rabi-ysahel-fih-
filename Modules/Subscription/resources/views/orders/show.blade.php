@extends('layouts/contentNavbarLayout')

@section('content')
<div class="container">
    <h4 class="mb-4">Détail de la commande</h4>

    <div class="card mb-4">
        <div class="card-header">Commande #{{ $order->id }}</div>
        <div class="card-body">
            <p><strong>Référence interne:</strong> {{ $order->order_identifier ?? '-' }}</p>
            <p><strong>Statut:</strong> {{ ucfirst($order->status) }}</p>
            <p><strong>Montant total:</strong> {{ $order->total_price }} {{ $order->plan->currency ?? 'TND' }}</p>
            <p><strong>Date de création:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    @if ($order->plan)
    <div class="card mb-4">
        <div class="card-header">Détails du plan</div>
        <div class="card-body">
            <p><strong>Nom du plan:</strong> {{ $order->plan->name }}</p>
            <p><strong>Prix HT:</strong> {{ $order->plan->price_HT }}</p>
            <p><strong>Périodicité:</strong> {{ $order->plan->periodicity_type }}</p>
        </div>
    </div>
    @endif

    <a href="{{ route('orders.index') }}" class="btn btn-secondary">← Retour à la liste</a>
</div>
@endsection
