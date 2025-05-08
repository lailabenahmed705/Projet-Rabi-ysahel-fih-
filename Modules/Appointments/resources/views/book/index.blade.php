@extends('layouts.contentNavbarLayout')

@section('title', 'Book an Appointment')

@section('content')
<div class="container">
  <h4 class="mb-4">Book an Appointment</h4>

  <p>To book a new appointment, please choose a medical staff from the list or search by specialty.</p>

  {{-- EXEMPLE avec un lien vers le controller create --}}
  <a href="{{ route('book_appointment', ['medicalTeamId' => 1, 'start' => now()->format('Y-m-d H:i:s'), 'end' => now()->addMinutes(30)->format('Y-m-d H:i:s')]) }}" class="btn btn-primary">
    Start Booking
  </a>
</div>
@endsection
