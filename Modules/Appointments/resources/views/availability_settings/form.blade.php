@extends('layouts/contentNavbarLayout')

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Availability Settings /</span> {{ isset($availabilitySetting) ? 'Edit' : 'Create' }}
    </h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4 shadow-sm">
                <h4 class="card-header bg-primary text-white">{{ isset($availabilitySetting) ? 'Edit' : 'Create' }} Availability Setting</h4>
                <div class="card-body">
                    <form method="post" action="{{ isset($availabilitySetting) ? route('availability-settings.update', $availabilitySetting->medical_team_id) : route('availability-settings.store') }}" novalidate>
                        @csrf
                        @if(isset($availabilitySetting))
                            @method('PUT')
                        @endif
                        <!-- Medical Team -->
                        <div class="row mt-2 gy-4">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <label for="medical_team_id">Medical Team</label>
                                    <select id="medical_team_id" class="form-select" name="medical_team_id" {{ isset($availabilitySetting) ? 'disabled' : '' }} required>
                                        <option value="">Select Medical Team</option>
                                        @foreach($medicalTeams as $medicalTeam)
                                            <option value="{{ $medicalTeam->id }}" {{ isset($availabilitySetting) && $availabilitySetting->medical_team_id == $medicalTeam->id ? 'selected' : '' }}>{{  $medicalTeam->user->name }}</option>
                                        @endforeach
                                    </select>
                                    
                                    @if(isset($availabilitySetting))
                                        <input type="hidden" name="medical_team_id" value="{{ $availabilitySetting->medical_team_id }}">
                                    @endif
                                </div>
                            </div>
                            <!-- Start Shift -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <label for="start_shift">Start Shift</label>
                                    <input type="time" id="start_shift" name="start_shift" class="form-control" value="{{ isset($availabilitySetting) ? $availabilitySetting->start_shift : old('start_shift') }}" required>
                                    
                                </div>
                            </div>
                            <!-- End Shift -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <label for="end_shift">End Shift</label>
                                    <input type="time" id="end_shift" name="end_shift" class="form-control" value="{{ isset($availabilitySetting) ? $availabilitySetting->end_shift : old('end_shift') }}" required>
                                   
                                </div>
                            </div>
                            <!-- Break Start -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <label for="break_start">Break Start</label>
                                    <input type="time" id="break_start" name="break_start" class="form-control" value="{{ isset($availabilitySetting) ? $availabilitySetting->break_start : old('break_start') }}">
                                    
                                </div>
                            </div>
                            <!-- Break End -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <label for="break_end">Break End</label>
                                    <input type="time" id="break_end" name="break_end" class="form-control" value="{{ isset($availabilitySetting) ? $availabilitySetting->break_end : old('break_end') }}">
                                    
                                </div>
                            </div>
                            <!-- Consultation Duration -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <label for="consultation_duration">Consultation Duration (minutes)</label>

                                    <input type="number" id="consultation_duration" name="consultation_duration" class="form-control" value="{{ isset($availabilitySetting) ? $availabilitySetting->consultation_duration : old('consultation_duration') }}" required>
                                </div>
                            </div>
                            <!-- Transport Time -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <label for="transport_time">Transport Time (minutes)</label>

                                    <input type="number" id="transport_time" name="transport_time" class="form-control" value="{{ isset($availabilitySetting) ? $availabilitySetting->transport_time : old('transport_time') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-primary">{{ isset($availabilitySetting) ? 'Update' : 'Save' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Select2 for Medical Team selection
        $('#medical_team_id').select2({
            placeholder: 'Select Medical Team',
            allowClear: true
        });

        // Add client-side validation (optional)
        const form = document.querySelector('form');
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
                form.classList.add('was-validated');
            }
        }, false);
    });
</script>
@endsection
