@extends('layouts/contentNavbarLayout')

@section('title', 'Mes rendez-vous')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card rounded-4 shadow-sm">
      <div class="card-header">
        <h5 class="mb-0">📅 Mes rendez-vous</h5>
        <small class="text-muted">Liste de vos consultations prévues</small>
      </div>
      <div class="card-body">
        @if(isset($appointments) && count($appointments) > 0)
          <ul class="list-group list-group-flush">
            @foreach($appointments as $appointment)
              <li class="list-group-item">
                <strong>Date :</strong> {{ $appointment->date }} <br>
                <strong>Heure :</strong> {{ $appointment->time }} <br>
                <strong>Service :</strong> {{ $appointment->service_name ?? 'N/A' }}
              </li>
            @endforeach
          </ul>
        @else
          <p class="text-muted">Aucun rendez-vous trouvé.</p>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection
