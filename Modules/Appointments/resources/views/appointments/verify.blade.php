@extends('layouts/contentNavbarLayout')

@section('content')
<div class="container">
    <h2>Verification</h2>
    <form action="{{ route('appointments.confirmVerification') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="verification_code">Verification Code:</label>
            <input type="text" class="form-control" id="verification_code" name="verification_code" required>
        </div>
        <button type="submit" class="btn btn-primary">Verify</button>
    </form>
    @if (session('error'))
        <div class="alert alert-danger mt-2">
            {{ session('error') }}
        </div>
    @endif
</div>
@endsection
