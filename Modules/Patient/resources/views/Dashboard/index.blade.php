@extends('layouts/contentNavbarLayout')

@section('title', 'Tableau de bord Patient')

@section('content')
<div class="row">
  <div class="col-12 mb-4">
    <div class="card shadow-sm rounded-4">
      <div class="card-body py-4">
        <h4 class="mb-3">👋 Bienvenue {{ $patient->name ?? 'Cher Patient' }}</h4>
        <p class="mb-0 text-muted">
          Accédez à vos <strong>paramètres de compte</strong>, <strong>informations personnelles</strong> et <strong>rendez-vous</strong> en un clic.
        </p>
      </div>
    </div>
  </div>

  <!-- Bloc: Paramètres du compte -->
  <div class="col-md-4">
    <a href="{{ route('patient.account.setting') }}" class="text-decoration-none">
      <div class="card border shadow-sm hover-shadow-sm text-center rounded-4">
        <div class="card-body py-4">
          <i class="mdi mdi-cog-outline mdi-36px text-primary mb-3"></i>
          <h5 class="mb-1">Paramètres du compte</h5>
          <p class="text-muted small">Mot de passe, email, sécurité...</p>
        </div>
      </div>
    </a>
  </div>

  <!-- Bloc: Profil personnel -->
  <div class="col-md-4">
    <a href="{{ route('patient.profile.setting') }}" class="text-decoration-none">
      <div class="card border shadow-sm hover-shadow-sm text-center rounded-4">
        <div class="card-body py-4">
          <i class="mdi mdi-account-outline mdi-36px text-info mb-3"></i>
          <h5 class="mb-1">Profil personnel</h5>
          <p class="text-muted small">Nom, téléphone, genre, etc.</p>
        </div>
      </div>
    </a>
  </div>

  <!-- Bloc: Rendez-vous -->
  <div class="col-md-4">
    <a href="{{ route('patient.appointments') }}" class="text-decoration-none">
      <div class="card border shadow-sm hover-shadow-sm text-center rounded-4">
        <div class="card-body py-4">
          <i class="mdi mdi-calendar-check-outline mdi-36px text-success mb-3"></i>
          <h5 class="mb-1">Mes Rendez-vous</h5>
          <p class="text-muted small">Voir / gérer vos consultations</p>
        </div>
      </div>
    </a>
  </div>
</div>
@endsection
