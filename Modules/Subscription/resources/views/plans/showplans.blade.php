@extends('layouts/contentNavbarLayout')

@section('title', 'Plans d’abonnement')

@section('content')
<section class="pricing section" style="padding: 70px 0; background-color: #f9f9f9;">
  <div class="container">
    <div class="section-title text-center mb-5">
      <h2>Plans d’abonnement</h2>
      <p>Choisissez un plan adapté à vos besoins médicaux professionnels</p>
    </div>

    <div class="row">
      @foreach($plans as $plan)
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card shadow-sm border-0 h-100">
            <div class="card-body text-center p-4">
              <h4 class="card-title">{{ $plan->name }}</h4>
              <h2 class="text-success my-3">{{ $plan->price }} {{ $plan->currency }}</h2>
              <p class="text-muted mb-2">Périodicité : <strong>{{ strtolower($plan->periodicity_type) }}</strong></p>

              <ul class="list-unstyled mt-4 mb-4">
                @forelse($plan->features as $feature)
                  <li class="mb-2"><i class="fa fa-check text-success"></i> {{ $feature->name }} : <strong>{{ $feature->pivot->charges }}</strong></li>
                @empty
                  <li><i class="fa fa-times text-danger"></i> Aucune fonctionnalité définie</li>
                @endforelse
              </ul>

              <a href="{{ route('plans.checkout', $plan->id) }}" class="btn btn-primary btn-block">Obtenir ce plan</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endsection
