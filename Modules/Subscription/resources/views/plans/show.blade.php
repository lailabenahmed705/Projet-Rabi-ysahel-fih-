@extends('layouts/contentNavbarLayout')

@section('title', 'Détails du Plan')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Plans /</span> Détails</h4>

<div class="card">
  <div class="card-body">
    <h5 class="card-title">{{ $plan->name }}</h5>

    <ul class="list-group list-group-flush">
      <li class="list-group-item"><strong>Prix HT :</strong> {{ $plan->price_HT }} {{ $plan->currency }}</li>
      <li class="list-group-item"><strong>Prix TTC :</strong> {{ $plan->price }} {{ $plan->currency }}</li>
      <li class="list-group-item"><strong>Durée :</strong> {{ $plan->periodicity_type }}</li>
      <li class="list-group-item"><strong>Jours de grâce :</strong> {{ $plan->grace_days }}</li>
      <li class="list-group-item"><strong>Rôle attribué :</strong> {{ $plan->role->name ?? '-' }}</li>
      <li class="list-group-item"><strong>Status :</strong>
        @if($plan->status)
          <span class="badge bg-success">Actif</span>
        @else
          <span class="badge bg-secondary">Inactif</span>
        @endif
      </li>
    </ul>

    <hr>

    <h6 class="mt-4">Fonctionnalités associées :</h6>
    @if($plan->features->isEmpty())
      <p class="text-muted">Aucune fonctionnalité liée à ce plan.</p>
    @else
      <ul class="list-group">
        @foreach($plan->features as $feature)
          <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $feature->name }}
            <span class="badge bg-primary">{{ $feature->pivot->charges }}</span>
          </li>
        @endforeach
      </ul>
    @endif
  </div>
</div>

<a href="{{ route('plans.index') }}" class="btn btn-secondary mt-3">← Retour à la liste</a>
<a href="{{ route('plans.edit', $plan->id) }}" class="btn btn-warning mt-3">Modifier</a>
@endsection
