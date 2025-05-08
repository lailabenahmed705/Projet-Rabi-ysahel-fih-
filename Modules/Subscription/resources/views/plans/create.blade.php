@extends('layouts/contentNavbarLayout')

@section('title', 'Créer un Plan')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Plans /</span> Créer un plan</h4>

<form method="POST" action="{{ route('plans.store') }}">
  @csrf
  <div class="row">
    <div class="col-md-6 mb-3">
      <label class="form-label">Nom du plan</label>
      <input type="text" name="name" class="form-control" required>
    </div>

    <div class="col-md-6 mb-3">
      <label class="form-label">Devise</label>
      <input type="text" name="currency" class="form-control" maxlength="3" value="TND" required>
    </div>

    <div class="col-md-4 mb-3">
      <label class="form-label">Prix HT</label>
      <input type="number" step="0.01" name="price_HT" class="form-control" required>
    </div>

    <div class="col-md-4 mb-3">
      <label class="form-label">Prix TTC</label>
      <input type="number" step="0.01" name="price" class="form-control" required>
    </div>

    <div class="col-md-4 mb-3">
      <label class="form-label">Jours de grâce</label>
      <input type="number" name="grace_days" class="form-control" required>
    </div>

    <div class="col-md-6 mb-3">
      <label class="form-label">Périodicité</label>
      <select name="periodicity" class="form-select" required>
        <option value="1">Mensuelle</option>
        <option value="3">Trimestrielle</option>
        <option value="12">Annuelle</option>
      </select>
    </div>

    <div class="col-md-6 mb-3">
      <label class="form-label">Rôle attribué</label>
      <select name="assigned_role" class="form-select" required>
        @foreach($roles as $role)
          <option value="{{ $role->id }}">{{ $role->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="col-12 mb-3">
      <label class="form-label">Fonctionnalités</label>

      @foreach($features as $feature)
        <div class="mb-3 border rounded p-2">
          <div class="form-check mb-2">
            <input class="form-check-input feature-checkbox" type="checkbox" id="feature_{{ $feature->id }}" name="features[]" value="{{ $feature->id }}">
            <label class="form-check-label" for="feature_{{ $feature->id }}">
              <strong>{{ $feature->name }}</strong>
            </label>
          </div>

          <input type="text"
                 name="feature_values[{{ $feature->id }}]"
                 id="feature_value_{{ $feature->id }}"
                 class="form-control"
                 placeholder="Valeur... (ex : 1, 10, oui, non)"
                 style="display: none;">
        </div>
      @endforeach
    </div>

    <div class="col-md-6 mb-3">
      <label class="form-label">Activer le plan</label><br>
      <input type="checkbox" name="status" value="1">
    </div>
  </div>

  <button type="submit" class="btn btn-success">Créer</button>
</form>
@endsection

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('.feature-checkbox');

    checkboxes.forEach(function (checkbox) {
      checkbox.addEventListener('change', function () {
        const input = document.getElementById('feature_value_' + this.value);
        if (this.checked) {
          input.style.display = 'block';
        } else {
          input.style.display = 'none';
          input.value = '';
        }
      });
    });
  });
</script>
@endpush
