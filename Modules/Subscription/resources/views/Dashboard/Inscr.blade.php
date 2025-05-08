<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">{{ __('Inscription') }}</div>

              <div class="card-body">
                  <form method="POST" action="{{ route('inscription') }}">
                      @csrf

                      <div class="form-group row">
                          <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                          <div class="col-md-6">
                              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                              @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse E-mail') }}</label>

                          <div class="col-md-6">
                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                          <div class="col-md-6">
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmation du mot de passe') }}</label>

                          <div class="col-md-6">
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                          </div>
                      </div>
                      <div class="form-group row">
                        <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Rôle') }}</label>

                        <div class="form-group row">
                          <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Rôle') }}</label>

                          <div class="col-md-6">
                              <select id="role" class="form-control @error('role') is-invalid @enderror" name="role" required autofocus>
                                  <option value="" disabled selected>Choisissez un rôle</option>
                                  <!-- Ajouter les options "Pharmacie" et "Laboratoire" -->
                                  <option value="Pharmacy">Pharmacy</option>
                                  <option value="Laboratory">Laboratory</option>
                                  @php
                                  $medicalTypes = App\Models\MedicalType::all();
                                  @endphp
                                  <!-- Boucle foreach pour ajouter les options dynamiquement à partir de la table medical_type -->
                                  @foreach($medicalTypes as $medicalType)
                                      <option value="{{ $medicalType->name }}">{{ $medicalType->name }}</option>
                                  @endforeach
                              </select>

                              @error('role')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  {{ __('S\'inscrire') }}
                              </button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
