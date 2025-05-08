@extends('layouts/contentNavbarLayout')

@section('title', 'Liste des Souscriptions')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Souscriptions /</span> Liste</h4>

@if(session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@endif

<div class="card">
  <div class="card-datatable table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Utilisateur</th>
          <th>Email</th>
          <th>Plan</th>
          <th>Prix</th>
          <th>Date de début</th>
          <th>Date de fin</th>
          <th>Statut</th>
        </tr>
      </thead>
      <tbody>
        @forelse($subscriptions as $subscription)
          <tr>
            <td>{{ $subscription->id }}</td>
            <td>{{ $subscription->user->name ?? '-' }}</td>
            <td>{{ $subscription->user->email ?? '-' }}</td>
            <td>{{ $subscription->plan->name ?? '-' }}</td>
            <td>{{ $subscription->price }} {{ $subscription->plan->currency ?? '€' }}</td>
            <td>{{ $subscription->starts_at }}</td>
            <td>{{ $subscription->ends_at }}</td>
            <td>
              @if(\Carbon\Carbon::parse($subscription->ends_at)->isFuture())
                <span class="badge bg-success">Active</span>
              @else
                <span class="badge bg-danger">Expirée</span>
              @endif
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="8" class="text-center text-muted">Aucune souscription trouvée.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
