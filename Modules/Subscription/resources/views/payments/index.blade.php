@extends('layouts/contentNavbarLayout')

@section('content')
<h1>Liste des paiements</h1>

@if($payments->isEmpty())
    <div class="alert alert-warning">Aucun paiement trouvé.</div>
@else
    <table class="table">
        <thead>
            <tr>
                <th>Référence</th>
                <th>Montant</th>
                <th>Date de paiement</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
                <tr>
                    <td>{{ $payment->reference }}</td>
                    <td>{{ $payment->amount }} TND</td>
                    <td>{{ $payment->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('payments.show', $payment->id) }}" class="btn btn-sm btn-primary">Voir</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection
