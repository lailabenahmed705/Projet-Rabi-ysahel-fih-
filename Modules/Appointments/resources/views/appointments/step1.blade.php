@extends('layouts/contentNavbarLayout')

@section('page-script')
<script>
$(document).ready(function() {

    $('#medical_team_id').change(function() {
        var medicalTeamId = $(this).val();
        console.log("Medical Team ID:", medicalTeamId);
        if (medicalTeamId) {
            $.ajax({
                url: '{{ route("appointments.getServiceCategoriesByMedicalType") }}',
                type: 'GET',
                data: { medical_team_id: medicalTeamId },
                success: function(data) {
                    console.log("Service Categories Data:", data);
                    $('#service_category_id').empty().append('<option value="">Select Service Category</option>');
                    $.each(data, function(key, value) {
                        $('#service_category_id').append('<option value="'+ key +'">'+ value +'</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", error);
                }
            });
        } else {
            $('#service_category_id').empty().append('<option value="">Select Service Category</option>');
            $('#service_id').empty().append('<option value="">Select Service</option>');
        }
    });

    $('#service_category_id').change(function() {
        var serviceCategoryId = $(this).val();
        console.log("Service Category ID:", serviceCategoryId);
        if (serviceCategoryId) {
            $.ajax({
                url: '{{ route("appointments.getServicesByServiceCategory") }}',
                type: 'GET',
                data: { service_category_id: serviceCategoryId },
                success: function(data) {
                    console.log("Services Data:", data);
                    $('#service_id').empty().append('<option value="">Select Service</option>');
                    $.each(data, function(key, value) {
                        $('#service_id').append('<option value="'+ key +'">'+ value +'</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", error);
                }
            });
        } else {
            $('#service_id').empty().append('<option value="">Select Service</option>');
        }
    });

    $('#availability_date').change(function() {
        var medicalTeamId = $('#medical_team_id').val();
        var availabilityDate = $(this).val();
        
        if (medicalTeamId && availabilityDate) {
            $.ajax({
                url: '{{ route("appointments.getAvailability") }}',
                type: 'GET',
                data: { 
                    medical_team_id: medicalTeamId, 
                    availability_date: availabilityDate 
                },
                success: function(data) {
                    console.log("Availability Slots:", data);

                    $('#availability_time').empty().append('<option value="">Select Availability Time</option>');

                    $.each(data, function(index, slot) {
                        $('#availability_time').append('<option value="'+ slot.id +'">'+ slot.start_time +'</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", error);
                }
            });
        }
    });

    $('#availability_time').change(function() {
        var availabilityId = $(this).val();
        $('#availability_id').val(availabilityId);
    });

});
</script>

@endsection

@section('content')
<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">Appointment Details /</span> Step 1
</h4>

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <h4 class="card-header">Appointment Details</h4>
            <div class="card-body">
                <form method="post" action="{{ route('appointments.store') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Display Validation Errors -->
                    <input type="hidden" id="availability_id" name="availability_id">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- Medical Team -->
                    <div class="row mt-2 gy-4">
                        <div class="col-md-6">
                            <div class="form-floating form-floating-outline">
                                <select id="medical_team_id" class="select2 form-select" name="medical_team_id">
                                    <option value="">Select Medical Team</option>
                                    @foreach($medicalTeams as $medicalTeam)
                                        <option value="{{ $medicalTeam->id }}">{{ $medicalTeam->user->name  }}</option>
                                    @endforeach
                                </select>
                                <label for="medical_team_id">Medical Team</label>
                            </div>
                        </div>
                        <!-- Service Category -->
                        <div class="col-md-6">
                            <div class="form-floating form-floating-outline">
                                <select id="service_category_id" class="select2 form-select" name="service_category_id">
                                    <option value="">Select Service Category</option>
                                    <!-- Options will be populated dynamically based on the selected medical team -->
                                </select>
                                <label for="service_category_id">Service Category</label>
                            </div>
                        </div>


                        <!-- Service Subcategory -->
                 <div class="col-md-6">
             <div class="form-floating form-floating-outline">
             <select id="service_subcategory_id" class="select2 form-select" name="service_subcategory_id">
             <option value="">Select Service Subcategory</option>
            @foreach($serviceSubCategories as $subcategory)
                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
            @endforeach
        </select>
        <label for="service_subcategory_id">Service Subcategory</label>
    </div>
    </div>



                    
                        <!-- Service -->
                        <div class="col-md-6">
                            <div class="form-floating form-floating-outline">
                                <select id="service_id" class="select2 form-select" name="service_id">
                                    <option value="">Select Service</option>
                                    <!-- Options will be populated dynamically based on the selected service category -->
                                </select>
                                <label for="service_id">Service</label>
                            </div>
                        </div>
                        <!-- Care Type -->
                        <div class="col-md-6">
                            <div class="form-floating form-floating-outline">
                                <select id="care_type" class="select2 form-select" name="care_type">
                                    <option value="one-time">One-time</option>
                                    <option value="recurring">Recurring</option>
                                </select>
                                <label for="care_type">Care Type</label>
                            </div>
                        </div>
                        <!-- Appointment Location -->
                        <div class="col-md-6">
                            <div class="form-floating form-floating-outline">
                                <select id="appointment_location" class="select2 form-select" name="appointment_location">
                                    <option value="at_home">At Home</option>
                                     <option value="in_office">In Office</option> 
                                </select>
                                <label for="appointment_location">Appointment Location</label>
                            </div>
                        </div>
                        <!-- Ordonnance -->
                        <div class="col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input type="file" accept='image/*' id="ordonnance" name="ordonnance" class="form-control" />
                                <label for="ordonnance">Ordonnance (Optional)</label>
                            </div>
                        </div>
                        <!-- Availability Date -->
                        <div class="col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input type="date" id="availability_date" name="availability_date" class="form-control" />
                                <label for="availability_date">Availability Date</label>
                            </div>
                        </div>
                        <!-- Availability Time -->
                        <div class="col-md-6">
                            <div class="form-floating form-floating-outline">
                                <select id="availability_time" name="availability_time" class="select2 form-select">
                                    <option value="">Select Availability Time</option>
                                    <!-- Options will be populated dynamically based on the selected date and medical team -->
                                </select>
                                <label for="availability_time">Availability Time</label>
                            </div>
                        </div>
                        <!-- Description -->
                        <div class="col-md-12">
                            <div class="form-floating form-floating-outline">
                                <textarea id="description" name="description" class="form-control" rows="3"></textarea>
                                <label for="description">Description</label>
                            </div>
                        </div>
                        <h4 class="card-header">Patient Details</h4>
                        <div class="col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input type="text" class="form-control" id="name" name="name" required>
                                
                                <label for="availability_date">First Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input type="text" class="form-control" id="lastname" name="lastname" required>
                                
                                <label for="availability_date">Last Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input type="text" class="form-control" id="phone" name="phone" required>
                                
                                <label for="availability_date">Phone</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input type="text" class="form-control" id="confirm_phone" name="confirm_phone" required>
                                
                                <label for="availability_date">Confirm Phone</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating form-floating-outline">
                                <input type="text" class="form-control" id="address" name="address" required>
                                <label for="description">Address</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating form-floating-outline">
                                <input type="email" class="form-control" id="email" name="email">
                                <label for="description">Email</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating form-floating-outline">
                            
                            <select class="select2 form-select" id="gender" name="gender" required>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                            <label for="gender">Gender:</label>
                            </div>
                    </div>
                    <div class="text-right p-2">
                        <button type="submit" class="btn btn-primary">Next</button>
                    </div>

                    </div>
                    <!-- Step 2 Fields -->
            
                

       
     
        
        
      
     
      
                 
                </form>
            </div>
        </div>
    </div>
</div>
@endsection