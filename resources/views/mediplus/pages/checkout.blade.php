@include('mediplus.header')

<section class="contact-form section">
  <div class="container">
    <h2>Paiement du plan : {{ $plan->name }}</h2>

    <form action="{{ route('plans.pay') }}" method="POST" id="payment-form">
        @csrf
        <input type="hidden" name="plan_id" value="{{ $plan->id }}">

        <div class="form-group">
            <label>Nom sur la carte</label>
            <input type="text" name="card_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Numéro de carte</label>
            <input type="text" name="card_number" class="form-control" placeholder="4242 4242 4242 4242" required>
        </div>

        <div class="form-group">
            <label>Date d’expiration</label>
            <input type="text" name="exp_date" class="form-control" placeholder="MM/YY" required>
        </div>

        <div class="form-group">
            <label>CVV</label>
            <input type="text" name="cvc" class="form-control" placeholder="123" required>
        </div>

        <button class="btn btn-success mt-3" type="submit">Payer</button>
    </form>
  </div>
</section>
