@extends('layouts/contentNavbarLayout')

@section('title', 'Mon abonnement')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Souscriptions /</span> Mon abonnement actif</h4>

@if($subscription)
  <div class="card">
    <div class="card-body">
      <h5>{{ $subscription->plan->name }}</h5>
      <p>
        Prix : {{ $subscription->price }} {{ $subscription->plan->currency ?? 'EUR' }}<br>
        Du : {{ $subscription->starts_at }} au {{ $subscription->ends_at }}
      </p>
    </div>
  </div>
@else
  <div class="alert alert-warning">Vous n'avez pas encore d'abonnement actif.</div>
@endif
@endsection
