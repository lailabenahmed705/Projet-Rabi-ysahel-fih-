@extends('layouts/contentNavbarLayout')

@section('title', 'Plans d’abonnement')

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Souscriptions /</span> Choisissez un plan
</h4>

@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="row">
  @forelse($plans as $plan)
    <div class="col-md-4">
      <div class="card mb-4 shadow-sm border">
        <div class="card-body">
          <h5 class="card-title text-primary">{{ $plan->name }}</h5>

          <ul class="list-unstyled mb-3">
            <li><strong>Prix HT :</strong> {{ $plan->price_HT ?? '-' }} {{ $plan->currency }}</li>
            <li><strong>Prix TTC :</strong> {{ $plan->price }} {{ $plan->currency }}</li>
            <li><strong>Périodicité :</strong> {{ $plan->periodicity_type ?? '-' }}</li>
            <li><strong>Durée :</strong> {{ $plan->invoice_months }} mois</li>
            <li><strong>Jours d’essai :</strong> {{ $plan->trial_days }} jours</li>
            <li><strong>Nombre d'abonnés max :</strong> {{ $plan->active_subscribers_limit ?? 'Illimité' }}</li>
          </ul>

          <form method="POST" action="{{ route('subscriptions.subscribe') }}">
            @csrf
            <input type="hidden" name="plan_id" value="{{ $plan->id }}">
            <button type="submit" class="btn btn-outline-primary w-100">S’abonner</button>
          </form>
        </div>
      </div>
    </div>
  @empty
    <div class="col-12">
      <div class="alert alert-warning">Aucun plan n'est disponible pour le moment.</div>
    </div>
  @endforelse
</div>
@endsection
