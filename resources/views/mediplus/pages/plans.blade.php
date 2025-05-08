@include('mediplus.header')

<section class="pricing section" style="padding: 80px 0;">
  <div class="container">
    <div class="section-title text-center">
      <h2>Plans d’abonnement</h2>
      <p>Choisissez un plan adapté à vos besoins médicaux professionnels</p>
    </div>

    <div class="row">
      @foreach($plans as $plan)
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="single-pricing text-center border rounded p-4 shadow">
            <h4>{{ $plan->name }}</h4>
            <h2 class="text-success mt-3">{{ $plan->price }} {{ $plan->currency }}</h2>
            <p class="text-muted">/ {{ strtolower($plan->periodicity_type) }}</p>
            <ul class="list-unstyled my-3">
              @forelse($plan->features as $feature)
                <li>{{ $feature->name }} : {{ $feature->pivot->charges }}</li>
              @empty
                <li>Aucune fonctionnalité</li>
              @endforelse
            </ul>
            <a href="{{ route('mediplus.checkout', ['planId' => $plan->id]) }}" class="btn btn-primary">Obtenir Ce Plan</a>

          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
