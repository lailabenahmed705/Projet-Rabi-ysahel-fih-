@extends('layouts/contentNavbarLayout')

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Step 2: Patient Details</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('appointments.step2.post') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="medical_team_id" value="{{ $medicalTeamId }}">
        <input type="hidden" name="service_category_id" value="{{ $serviceCategoryId }}">
        <input type="hidden" name="service_id" value="{{ $serviceId }}">
        <input type="hidden" name="care_type" value="{{ $careType }}">
        <input type="hidden" name="appointment_location" value="{{ $appointmentLocation }}">
        <input type="hidden" name="availability_date" value="{{ $availabilityDate }}">
        <input type="hidden" name="availability_time" value="{{ $availabilityTime }}">
        <input type="hidden" name="description" value="{{ $description }}">

        <div class="form-group">
            <label for="name">First Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" class="form-control" id="last_name" name="last_name" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="confirm_phone">Confirm Phone:</label>
            <input type="text" class="form-control" id="confirm_phone" name="confirm_phone" required>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select class="form-control" id="gender" name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Next</button>
    </form>
</div>
@endsection
