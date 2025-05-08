@extends('layouts/contentNavbarLayout')

@section('title', 'Mes Commandes')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Commandes /</span> Liste</h4>

@if($orders->isEmpty())
  <div class="alert alert-warning">Aucune commande disponible.</div>
@else
  <div class="card">
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Plan</th>
            <th>Total</th>
            <th>Statut</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($orders as $order)
            <tr>
              <td>{{ $order->id }}</td>
              <td>{{ $order->plan->name ?? '-' }}</td>
              <td>{{ $order->total_price }} TND</td>
              <td><span class="badge bg-success">{{ $order->status }}</span></td>
              <td>{{ $order->created_at->format('Y-m-d') }}</td>
              <td>
                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-primary">Voir</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endif
@endsection