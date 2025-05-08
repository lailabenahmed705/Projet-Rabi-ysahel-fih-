@extends('dashboardClientLayouts.app')
@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@php
   $user = auth()->user();
   $addressComplete = null;
   $profile_photo_path = $user->profile_photo_path;

   $medicalTeam = DB::table('medical_team')->where('user_id', $user->id)->first();
   if ($medicalTeam) {
       $medicalAddress = DB::table('medical_Address')->where('id', $medicalTeam->medical_address_id)->first();
       if ($medicalAddress) {
           $addressComplete = $medicalAddress->address_complete;
       }
       $medicalService = DB::table('medical_service')->where('id', $medicalTeam->medical_service_id)->first();
       if ($medicalService) {
           $appointment_fees = $medicalService->appointment_fees;
           $professional_bio = $medicalService->professional_bio;
       }
   }

   if (!$addressComplete) {
       $company = DB::table('companies')->where('user_id', $user->id)->first();
       if ($company) {
           $companyAddress = DB::table('companies_Address')->where('id', $company->address_id)->first();
           $professional_bio = $company->professional_bio;
           if ($companyAddress) {
               $addressComplete = $companyAddress->address_complete;
           }
       }
   }
@endphp

<main id="dc-main" class="dc-main dc-haslayout">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">
            <div class="dc-user-profile">
                <div class="dc-dashboardbox dc-dashboardtabsholder">
                    <div class="dc-dashboardboxtitle">
                        <h2>Profile Settings</h2>
                    </div>
                    <div class="dc-dashboardtabs">
                    <ul class="dc-tabstitle nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" href="#perDetails" role="tab" data-toggle="tab">Personal Details</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#expEdu" role="tab" data-toggle="tab">Experience &amp; Education</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#location" role="tab" data-toggle="tab">Default location</a>
    </li>
</ul>

                    </div>
                    <!-- Include jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

                    <script>

    $(document).ready(function(){
        $('a[data-toggle="tab"]').on('click', function (e) {
            e.preventDefault();
            $(this).tab('show');
        });

        // Activate the first tab and content on page load
        $('ul.nav-tabs li:first-child a').tab('show');
    });
</script>

                    <div class="tab-content dc-tabscontent">
                        <div class="tab-pane active fade show" id="perDetails" role="tabpanel">
                            <div class="dc-yourdetails dc-tabsinfo">
                                <div class="dc-tabscontenttitle">
                                    <h3>Your Details</h3>
                                </div>
                                <div class="dc-formtheme dc-userform">
                                    <form method="POST" action="{{ route('update.profile') }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <fieldset>
                                            <div class="form-group toolip-wrapo">
                                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" placeholder="UserName">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group toolip-wrapo">
                                                @if (isset($user->Phone))
                                                    <input type="text" name="phoneNumber" class="form-control @error('phoneNumber') is-invalid @enderror" value="{{ $user->Phone }}" placeholder="Numéro de téléphone" disabled>
                                                @else
                                                    <input type="text" name="phoneNumber" class="form-control @error('phoneNumber') is-invalid @enderror" placeholder="Numéro de téléphone">
                                                @endif
                                            </div>
                                            <div class="form-group toolip-wrapo">
                                                <input type="text" name="address_complete" class="form-control @error('address_complete') is-invalid @enderror" value="{{ old('address_complete', $addressComplete) }}" placeholder="Adresse complète">
                                                @error('address_complete')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            @if($medicalTeam)
                                            <div class="form-group">
                                                @if (isset($appointment_fees))
                                                <input type="text" name="appointment_fees" class="form-control @error('appointment_fees') is-invalid @enderror" value="{{ old('appointment_fees', $appointment_fees) }}" placeholder="Appointment fees">
                                                    @error('appointment_fees')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                @else
                                                    <input type="text" name="appointment_fees" class="form-control @error('appointment_fees') is-invalid @enderror" placeholder="Appointment Fees">
                                                @endif
                                            </div>
                                            @endif

                                            <div class="form-group">
                                                <select name="language" id="language" class="form-control">
                                                    <option value="en">English</option>
                                                    <option value="fr">French</option>
                                                    <!-- Add more languages if needed -->
                                                </select>
                                            </div>
                                            @error('language')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <div class="form-group">
                                                @if (isset($professional_bio))
                                                    <textarea name="professional_bio" class="form-control @error('professional_bio') is-invalid @enderror" placeholder="Professional Bio">{{ old('professional_bio', $professional_bio) }}</textarea>
                                                    @error('professional_bio')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                @else
                                                    <textarea name="professional_bio" class="form-control @error('professional_bio') is-invalid @enderror" placeholder="Professional Bio"></textarea>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <div class="dc-profilephoto dc-tabsinfo">
                                                    <div class="dc-tabscontenttitle">
                                                        <h3>Profile Photo</h3>
                                                    </div>
                                                    <div class="dc-profilephotocontent">
                                                        <div class="dc-formtheme dc-formprojectinfo dc-formcategory" id="dc-img-4606">
                                                            <h3>Your current profile picture:</h3>
                                                            <img id="image-preview" src="storage/{{$user->profile_photo_path }}" alt="Current Profile Photo" style="width: 169px; margin-left: 30%; margin-bottom: 19px;">
                                                            <fieldset>
                                                                <div class="form-group form-group-label" id="dc-image-container-4606">
                                                                    <div class="dc-labelgroup" id="image-drag-4606">
                                                                        <label for="profile_photo_path" class="dc-image-file">
                                                                            <span class="dc-btn" id="image-btn-4606">Select File</span>
                                                                        </label>
                                                                        <span>Drop files here to upload</span>
                                                                        <em class="dc-fileuploading">Uploading<i class="fa fa-spinner fa-spin"></i></em>
                                                                        <input type="file" name="profile_photo" id="profile_photo_path" style="display:none">
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group text-center">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="expEdu" role="tabpanel">
                            <div class="edu-container">
                                @if (!empty($educationData))
                                    <div class="education-container">
                                        <h2>Educational Data</h2>
                                        <ul>
                                            @foreach($educationData as $key => $value)
                                                <li>{{ $key }}: {{ $value }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif


                                @if (!empty($certificateData))
                                    <div class="certificate-container">
                                        <h2>Certificate Data</h2>
                                        <ul>
                                            @foreach($certificateData as $key => $value)
                                                <li>{{ $key }}: {{ $value }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>

                            <form action="{{ route('storeData') }}" method="POST" id="dataForm">
                                @csrf
                                <div class="dc-usereducation dc-tabsinfo">

                                    <ul class="dc-educationaccordion accordion dc-educations">


                                        <li>
                                        <div class="dc-tabscontenttitle dc-addnew">
                                        <h3>Add Your Education</h3>
                                    </div>
                                            <div class="form-group form-group-label" id="educationEntries">
                                                <div class="educationEntry">
                                                    <input class="form-control" placeholder="Institute's Name" type="text" name="education_institute" required><br><br>
                                                    <input class="form-control" placeholder="Year" type="text" name="education_year" required><br><br>
                                                    <input class="form-control" placeholder="Diploma's Name" type="text" name="education_diploma" required><br><br>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="dc-tabscontenttitle dc-addnew">
                                                <h3>Add Your Certificates</h3>
                                            </div>
                                            <div id="certificateEntries">
                                                <div class="certificateEntry">
                                                    <input class="form-control" placeholder="Name of the organization" type="text" name="certificate_organization" required><br><br>
                                                    <input class="form-control" placeholder="Year" type="text" name="certificate_year" required><br><br>
                                                    <input class="form-control" placeholder="Certificate's name" type="text" name="certificate_name" required><br><br>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="form-group text-center">
                                        <button class="btn btn-primary" type="submit">Submit All</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="location" role="tabpanel">
                            <form method="POST" action="{{ route('update.location') }}">
                                @csrf
                                <div class="dc-location dc-tabsinfo">
                                    <div class="dc-tabscontenttitle">
                                        <h3>Your Country</h3>
                                    </div>
                                    <div class="dc-formtheme dc-userform">
                                        <fieldset>
                                            <div class="form-group toolip-wrapo">
                                                <label for="country_id">Select Country:</label>
                                                <select name="country_id" id="country_id" class="form-control" style="
    height: 51px;
">
                                                    <option value="" selected disabled>Select your country</option>
                                                    @php
                                                    $countries = Modules\International\App\Models\Country::where('status', 'active')->get();

                                                    @endphp
                                                    @foreach($countries as $country)
                                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="dc-location dc-tabsinfo">
                                    <div class="dc-tabscontenttitle">
                                        <h3>Your State</h3>
                                    </div>
                                    <div class="dc-formtheme dc-userform">
                                        <fieldset>
                                            <div class="form-group toolip-wrapo">
                                                <label for="state_id">Select State:</label>
                                                <select name="state_id" id="state_id" class="form-control" style="
    height: 51px;
">
                                                    <option value="" selected disabled>Select your state</option>
                                                    @php
                                                    $states = Modules\International\App\Models\State::where('status', 'active')->get();

                                                    @endphp
                                                    @foreach($states as $state)
                                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                

                                <div class="dc-location dc-tabsinfo">
                                    <div class="dc-tabscontenttitle">
                                        <h3>Your City</h3>
                                    </div>
                                    <div class="dc-formtheme dc-userform">
                                        <fieldset>
                                            <div class="form-group toolip-wrapo">
                                                <label for="city_id">Select City:</label>
                                                <select name="city_id" id="city_id" class="form-control" style="height: 51px;">
                                                    <option value="" selected disabled>Select your city</option>
                                                    @php
                                                    $cities = Modules\International\App\Models\City::where('status', 'active')->get();

                                                    @endphp
                                                    @foreach($cities as $city)
                                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
