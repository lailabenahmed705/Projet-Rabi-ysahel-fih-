@extends('layouts/contentNavbarLayout')

@section('title', 'Liste des Plans')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Abonnement /</span> Plans</h4>

<a href="{{ route('plans.create') }}" class="btn btn-primary mb-3">Créer un plan</a>

@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Prix</th>
          <th>Rôle</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($plans as $plan)
        <tr>
          <td>{{ $plan->name }}</td>
          <td>{{ $plan->price }} {{ $plan->currency }}</td>
          <td>{{ $plan->role->name ?? '-' }}</td>
          <td>
            <span class="badge {{ $plan->status ? 'bg-success' : 'bg-secondary' }}">
              {{ $plan->status ? 'Actif' : 'Inactif' }}
            </span>
          </td>
          <td>
            <a href="{{ route('plans.show', $plan->id) }}" class="btn btn-sm btn-info">Voir</a>
            <a href="{{ route('plans.edit', $plan->id) }}" class="btn btn-sm btn-warning">Modifier</a>
            <form action="{{ route('plans.destroy', $plan->id) }}" method="POST" class="d-inline">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-danger" onclick="return confirm('Supprimer ?')">Supprimer</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
