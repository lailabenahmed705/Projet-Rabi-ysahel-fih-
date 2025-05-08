@extends('dashboardClientLayouts.app')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <!-- Custom header color -->
                <div class="card-header" style="background-color: #00BFFF; color: white;">
                    <h1 class="mb-0">Payment Successful ✅</h1>
                </div>
                <div class="card-body py-5">
                    <h2 class="card-title">Congratulations!</h2>
                    <p class="card-text">Your payment has been processed successfully. Thank you for your transaction!</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
