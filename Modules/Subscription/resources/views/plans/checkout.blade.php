@extends('layouts/contentNavbarLayout')

@section('content')
<h4 class="py-3">Paiement du plan: {{ $plan->name }}</h4>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('plans.pay') }}">
            @csrf
            <input type="hidden" name="plan_id" value="{{ $plan->id }}">

            <div class="mb-3">
                <label class="form-label">Nom sur la carte</label>
                <input type="text" class="form-control" name="card_name" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Numéro de carte</label>
                <input type="text" class="form-control" name="card_number" required>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Expiration (MM/AA)</label>
                    <input type="text" class="form-control" name="card_expiry" required>
                </div>
                <div class="col">
                    <label class="form-label">CVV</label>
                    <input type="text" class="form-control" name="card_cvv" required>
                </div>
            </div>

            <button class="btn btn-primary w-100">Payer {{ $plan->price }} TND</button>
        </form>
    </div>
</div>
@endsection
