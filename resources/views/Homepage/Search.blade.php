@extends('HomepageLayouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Search Results for "{{ $term }}"</h2>

    @if($medicalTeams->isEmpty())
        <p class="text-muted">No medical personnel found matching your search.</p>
    @else
        <div class="row">
            @foreach($medicalTeams as $medicalteam)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $medicalteam->name }}
                            </h5>
                            <p class="card-text">
                                Specialty:
                                {{ optional($medicalteam->medicalType)->name ?? 'N/A' }}
                            </p>
                            <a href="{{ url('/medical-team/{id}' . $medicalteam->id) }}" class="btn btn-sm btn-primary">
    View Profile
</a>




                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
