@extends('layouts/contentNavbarLayout')

@section('title', 'Availability Time Slots')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <h4 class="mb-3">All Availability Slots (Generated from Settings)</h4>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @forelse($availabilities as $item)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item['medical_team_name'] }}</h5>
                        <p><strong>Shift:</strong> {{ $item['start_shift'] }} - {{ $item['end_shift'] }}</p>
                        <p><strong>Break:</strong> 
                            {{ $item['break_start'] ?? '—' }} - {{ $item['break_end'] ?? '—' }}
                        </p>
                        <p><strong>Consultation Duration:</strong> {{ $item['consultation_duration'] }} min</p>
                        <p><strong>Transport Time:</strong> {{ $item['transport_time'] }} min</p>

                        <div>
                            <strong>Time Slots:</strong>
                            <ul class="list-unstyled mt-2">
                                @forelse($item['slots'] as $slot)
                                    <li><span class="badge bg-primary me-1">{{ $slot }}</span></li>
                                @empty
                                    <li><em>No slots available</em></li>
                                @endforelse
                            </ul>
                        </div>

                        {{-- 🔗 Bouton vers les créneaux dynamiques --}}
                        <a href="{{ route('availability.index', $item['medical_team_id']) }}" class="btn btn-sm btn-outline-primary mt-2">
                            Voir les créneaux
                        </a>

                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">No availability settings found.</div>
            </div>
        @endforelse
    </div>
</div>
@endsection
