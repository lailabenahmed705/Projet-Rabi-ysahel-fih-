
@extends('layouts/contentNavbarLayout')

@section('title', 'Ajouter un Medical Type')

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Add Medical Type</span></h4>

    <!-- Formulaire d'ajout -->
    <form action="{{ route('medical-type.store') }}" method="post">
        @csrf
        @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
        @endif

        <!-- Ajoutez les champs du formulaire ici -->
        <div class="mb-3">
            <label for="name" class="form-label">Medical Type Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <!-- Ajoutez d'autres champs du formulaire si nécessaire -->

        <button type="submit" class="btn btn-primary">Add</button>
    </form>
@endsection
