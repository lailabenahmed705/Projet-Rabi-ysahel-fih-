@extends('dashboardClientLayouts.app')

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f7f6;
        color: #333;
    }

    .container {
      margin-top: 30px;
        max-width: 1200px;
        margin: auto;
        padding: 20px;
    }

   body h1 {
        text-align: center;
        font-size: 2.5em;
        margin-bottom: 60px; /* Increased margin-bottom for more spacing */
        color: #333;

    }
.row{
  margin-top: 30px;

}
    .card {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;

    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 25px rgba(0, 0, 0, 0.15);
    }

    .card-header {
        text-align: center;
        font-weight: 700;
        color: #fff;
        font-size: 1.8em;
        padding: 20px 0;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
        position: relative;
    }

    .btn-subscribe {
        display: block;
        width: 80%;
        margin: 20px auto;
        padding: 15px 0;
        font-size: 1.2em;
        text-align: center;
        color: white;
        background: linear-gradient(135deg, #007bff, #0056b3);
        border-radius: 50px;
        transition: background 0.3s ease, transform 0.3s ease;
        text-decoration: none;
        border: none;
    }

    .btn-subscribe:hover {
        background: linear-gradient(135deg, #0056b3, #007bff);
        transform: scale(1.05);
    }

    .card-theme-basic .card-header {
        background: linear-gradient(135deg, #04BBFF, #0492FF);
    }

    .card-theme-premium .card-header {
        background: linear-gradient(135deg, #FF8C00, #FF7000);
    }

    .card-theme-advanced .card-header {
        background: linear-gradient(135deg, #d40b2f, #6e132e);
    }

    .card-header::after {
        content: '';
        display: block;
        width: 100%;
        height: 20px;
        background: inherit;
        position: absolute;
        bottom: -10px;
        left: 0;
        border-radius: 100%/0 0 20px 20px;
    }

    .price-tag {
        display: block;
        font-size: 2.5em;
        font-weight: bold;
        color: #333;
        margin: 20px 0;
        text-align: center;
    }

    .card-theme-basic .price-tag {
        color: #FF6347;
    }

    .card-theme-premium .price-tag {
        color: #FFA500;
    }

    .card-theme-advanced .price-tag {
        color: #cf0e47;
    }

    .card-body {
        padding: 30px 20px;
        text-align: center;
        color: #333;
        display: flex;
        flex-direction: column;
        justify-content: center;
        min-height: 300px; /* Adjusted to ensure uniform height */
    }

    .plan-details {
        margin-bottom: 15px;
        max-height: 270px; /* Limit the height to create a uniform box size */
        overflow: hidden;
        position: relative;
    }

    .plan-details.show-more {
        max-height: none; /* Remove the height limit when showing more */
        margin-top:10px;
    }

    .plan-details p {
        font-size: 1.1em;
        margin: 5px 0;
    }

    .plan-details li {
        list-style: none;
        margin-bottom: 8px;
        font-size: 1em;
    }

    .plan-features {
        padding: 0;
    }

    .see-more {
        cursor: pointer;
        color: #007bff;
        text-decoration: underline;
        font-size: 0.9em;
        margin-top: 50px;
        display: block;
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        background: #fff;
        padding: 5px 10px;
    }

    .see-more-hidden {
        display: none;

    }
</style>

@section('content')
    @php
        use Illuminate\Support\Facades\Auth;
        use App\Models\Plan;

        $userRoleId = Auth::user()->role_id;
        $plans = Plan::where('role_id', $userRoleId)->get();
    @endphp

    <div class="container">
        <h1>Plans Available for You:</h1>
        <div class="row">
            @forelse($plans as $plan)
                @php
                    $themeClass = 'card'; // Base class
                    $logoPath = ''; // Initialize the logo path
                    if ($plan->name == 'Basic') {
                        $themeClass .= ' card-theme-basic';
                    } elseif ($plan->name == 'Premium') {
                        $themeClass .= ' card-theme-premium';
                    } elseif ($plan->name == 'Advanced') {
                        $themeClass .= ' card-theme-advanced';
                    }
                @endphp
                <div class="col-md-4">
                    <div class="{{ $themeClass }}">
                        <div class="card-header">
                            {{ $plan->name }}
                        </div>
                        <div class="card-body">
                            <span class="price-tag">{{ $plan->price }} TND</span>
                            <div class="plan-details" id="details-{{ $plan->id }}">
                                <p>Periodicity: {{ $plan->periodicity_type }}</p>
                                <p>Grace Days: {{ $plan->grace_days }}</p>
                                <ul class="plan-features">
                                    @foreach ($plan->features as $index => $feature)
                                        <li @if($index >= 7) style="display: none;" @endif>{{ $feature->name }} ({{ $feature->pivot->charges }} charges)</li>
                                    @endforeach
                                </ul>

                                <br>
                                <div class="see-more" data-plan-id="{{ $plan->id }}">See more</div>
                            </div>
                            <form action="{{ route('checkout.show', $plan->id) }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-subscribe">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">No plans available for your role!</p>
            @endforelse
        </div>
    </div>

    <script>
        document.querySelectorAll('.see-more').forEach(item => {
            item.addEventListener('click', event => {
                const planId = event.target.getAttribute('data-plan-id');
                const details = document.getElementById('details-' + planId);
                details.classList.toggle('show-more');
                const featureItems = details.querySelectorAll('.plan-features li');
                featureItems.forEach((li, index) => {
                    if (index >= 5) {
                        li.style.display = details.classList.contains('show-more') ? 'list-item' : 'none';
                    }
                });
                event.target.textContent = details.classList.contains('show-more') ? 'See less' : 'See more';
            });
        });
    </script>

@endsection
