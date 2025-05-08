@extends('layouts/contentNavbarLayout')

@section('title', 'Modifier le profil')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card shadow-sm rounded-4">
      <div class="card-header">
        <h5 class="mb-0">✏️ Informations personnelles</h5>
        <small class="text-muted">Modifiez vos informations ici</small>
      </div>

      <div class="card-body">
        {{-- ✅ Message de succès --}}
        @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- ✅ Erreurs de validation --}}
        @if($errors->any())
          <div class="alert alert-danger">
            <ul class="mb-0">
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        {{-- ✅ Formulaire --}}
        <form action="{{ route('patient.profile.update') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="row">
            {{-- 📸 Colonne de la photo --}}
            <div class="col-md-3 text-center">
              <label class="form-label d-block">Photo de profil</label>
              <img 
                src="{{ $patient->profile_photo_path ? asset('storage/' . $patient->profile_photo_path) : asset('assets/img/avatars/1.png') }}" 
                alt="Photo de profil"
                class="rounded-circle mb-2"
                width="120" height="120"
              >
              <input type="file" name="profile_photo" class="form-control mt-2">
              <div class="fw-bold mt-2">{{ old('name', $patient->name ?? '') }}</div>
            </div>

            {{-- 📝 Colonne des champs --}}
            <div class="col-md-9">
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label for="name" class="form-label">Nom</label>
                  <input type="text" name="name" class="form-control"
                         value="{{ old('name', $patient->name ?? '') }}">
                </div>

                <div class="mb-3 col-md-6">
                  <label for="lastname" class="form-label">Prénom</label>
                  <input type="text" name="lastname" class="form-control"
                         value="{{ old('lastname', $patient->lastname ?? '') }}">
                </div>

                <div class="mb-3 col-md-6">
                  <label for="phone" class="form-label">Téléphone</label>
                  <input type="text" name="phone" class="form-control"
                         value="{{ old('phone', $patient->phone ?? '') }}">
                </div>

                <div class="mb-3 col-md-6">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control"
                         value="{{ old('email', $patient->email ?? '') }}">
                </div>

                <div class="mb-3 col-md-12">
                  <label for="address" class="form-label">Adresse</label>
                  <input type="text" name="address" class="form-control"
                         value="{{ old('address', $patient->address ?? '') }}">
                </div>

                <div class="mb-3 col-md-6">
                  <label for="gender" class="form-label">Genre</label>
                  <select name="gender" class="form-select">
                    <option value="">-- Sélectionner --</option>
                    <option value="male" {{ old('gender', $patient->gender ?? '') == 'male' ? 'selected' : '' }}>Homme</option>
                    <option value="female" {{ old('gender', $patient->gender ?? '') == 'female' ? 'selected' : '' }}>Femme</option>
                    <option value="other" {{ old('gender', $patient->gender ?? '') == 'other' ? 'selected' : '' }}>Autre</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          {{-- ✅ Bouton Enregistrer --}}
          <div class="mt-3">
            <button type="submit" class="btn btn-primary">
              <i class="mdi mdi-content-save-outline me-1"></i> Enregistrer les modifications
            </button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection
