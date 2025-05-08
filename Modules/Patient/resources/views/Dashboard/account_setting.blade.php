@extends('layouts/contentNavbarLayout')

@section('title', 'Paramètres du compte')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card shadow-sm rounded-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <div>
          <h5 class="mb-1"><i class="mdi mdi-account-cog-outline text-primary me-2"></i> Paramètres du compte</h5>
          <small class="text-muted">Gérez vos informations personnelles et de sécurité</small>
        </div>
        <a href="{{ route('patient.profile.setting') }}" class="btn btn-sm btn-outline-primary">
          <i class="mdi mdi-pencil-outline me-1"></i> Modifier
        </a>
      </div>

      <div class="card-body">
        <div class="row align-items-center mb-4">
          <div class="col-md-2 text-center">
          @if ($patient->profile_photo_path)
        <img src="{{ asset('storage/' . $patient->profile_photo_path) }}" 
         alt="{{ $patient->name }}" 
         class="rounded-circle" 
         width="80" height="80">
        @else
         <span class="avatar-initial rounded-circle bg-label-primary">J</span>
        @endif

          </div>
          <div class="col-md-10">
            <h6 class="mb-1">{{ $patient->name ?? 'Non défini' }} {{ $patient->lastname ?? '' }}</h6>
            <p class="mb-0 text-muted">Patient inscrit</p>
          </div>
        </div>

        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Email</label>
            <div class="form-control-plaintext">{{ $patient->email ?? 'Non défini' }}</div>
          </div>

          <div class="col-md-6">
            <label class="form-label">Téléphone</label>
            <div class="form-control-plaintext">{{ $patient->phone ?? 'Non défini' }}</div>
          </div>

          <div class="col-md-6">
            <label class="form-label">Adresse</label>
            <div class="form-control-plaintext">{{ $patient->address ?? 'Non défini' }}</div>
          </div>

          <div class="col-md-6">
            <label class="form-label">Genre</label>
            <div class="form-control-plaintext text-capitalize">{{ $patient->gender ?? 'Non défini' }}</div>
          </div>
        </div>

        <hr class="my-4">

        <div class="alert alert-info">
          <strong>🔒 Sécurité :</strong> Pour modifier votre mot de passe ou vos préférences de connexion, veuillez accéder aux <a href="#">paramètres utilisateur globaux</a>.
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
