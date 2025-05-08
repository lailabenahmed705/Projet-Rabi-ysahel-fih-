@extends('layouts/contentNavbarLayout')
@section('content')
<h1>Détail du paiement</h1>

<ul>
    <li><strong>Référence :</strong> {{ $payment->reference }}</li>
    <li><strong>Montant :</strong> {{ $payment->amount }} TND</li>
    <li><strong>Date :</strong> {{ $payment->created_at->format('d/m/Y H:i') }}</li>
</ul>

<a href="{{ route('payments.index') }}" class="btn btn-secondary">Retour</a>
@endsection
