@extends('layouts/contentNavbarLayout')

@section('title', 'Modifier un Plan')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Plans /</span> Modifier le plan</h4>

<form method="POST" action="{{ route('plans.update', $plan->id) }}">
  @csrf
  @method('PUT')
  <div class="row">
    <div class="col-md-6 mb-3">
      <label class="form-label">Nom du plan</label>
      <input type="text" name="name" class="form-control" value="{{ $plan->name }}" required>
    </div>

    <div class="col-md-6 mb-3">
      <label class="form-label">Devise</label>
      <input type="text" name="currency" class="form-control" maxlength="3" value="{{ $plan->currency }}" required>
    </div>

    <div class="col-md-4 mb-3">
      <label class="form-label">Prix HT</label>
      <input type="number" step="0.01" name="price_HT" class="form-control" value="{{ $plan->price_HT }}" required>
    </div>

    <div class="col-md-4 mb-3">
      <label class="form-label">Prix TTC</label>
      <input type="number" step="0.01" name="price" class="form-control" value="{{ $plan->price }}" required>
    </div>

    <div class="col-md-4 mb-3">
      <label class="form-label">Jours de grâce</label>
      <input type="number" name="grace_days" class="form-control" value="{{ $plan->grace_days }}" required>
    </div>

    <div class="col-md-6 mb-3">
      <label class="form-label">Périodicité</label>
      <select name="periodicity" class="form-select" required>
        <option value="1" {{ $plan->periodicity_type === 'Monthly' ? 'selected' : '' }}>Mensuelle</option>
        <option value="3" {{ $plan->periodicity_type === 'Quarterly' ? 'selected' : '' }}>Trimestrielle</option>
        <option value="12" {{ $plan->periodicity_type === 'Annually' ? 'selected' : '' }}>Annuelle</option>
      </select>
    </div>

    <div class="col-md-6 mb-3">
      <label class="form-label">Rôle attribué</label>
      <select name="assigned_role" class="form-select" required>
        @foreach($roles as $role)
          <option value="{{ $role->id }}" {{ $plan->role_id == $role->id ? 'selected' : '' }}>
            {{ $role->name }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="col-12 mb-3">
      <label class="form-label">Fonctionnalités</label>
      @foreach($features as $feature)
        <div class="mb-2">
          <strong>{{ $feature->name }}</strong>
          <input type="hidden" name="features[]" value="{{ $feature->id }}">
          <input type="text" name="feature_values[{{ $feature->id }}]" class="form-control mt-1"
                 value="{{ $featureValues[$feature->id] ?? '' }}" placeholder="Valeur...">
        </div>
      @endforeach
    </div>

    <div class="col-md-6 mb-3">
      <label class="form-label">Activer le plan</label><br>
      <input type="checkbox" name="status" value="1" {{ $plan->status ? 'checked' : '' }}>
    </div>
  </div>

  <button type="submit" class="btn btn-success">Mettre à jour</button>
</form>
@endsection
