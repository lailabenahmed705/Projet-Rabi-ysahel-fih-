@extends('HomepageLayouts.search')
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

<div class="dc-innerbanner-holder dc-haslayout dc-open dc-opensearchs">
    <form action="{{ route('search') }}" method="get" id="search_form">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="dc-innerbanner">
                        <div class="dc-formtheme dc-form-advancedsearch dc-innerbannerform">
                            <fieldset>
                                <div class="form-group">
                                    <select name="search_category" class="chosen-select">
                                        <option value="">What are you looking for?</option>
                                        @foreach (\App\Models\MedicalType::all() as $medicalType)
                                            <option value="{{ $medicalType->id }}">{{ $medicalType->name }}</option>
                                        @endforeach
                                        @php
                                            $companyTypes = \DB::table('companies')->distinct()->pluck('company_type');
                                        @endphp
                                        @foreach ($companyTypes as $companyType)
                                            <option value="{{ $companyType }}">{{ $companyType }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="dc-select">
                                        <select name="location" class="chosen-select">
                                            <option value="">Select a country</option>
                                            @foreach (\App\Models\Country::all() as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="dc-btnarea">
                                    <input type="submit" class="dc-btn" value="Search">
                                </div>
                            </fieldset>
                        </div>
                        <a href="javascript:;" class="dc-docsearch"><span class="dc-advanceicon"><i></i> <i></i> <i></i></span><span>Advanced <br> Search</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="dc-advancedsearch-holder" style="display: none;">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="dc-advancedsearchs">
                            <div class="dc-formtheme dc-form-advancedsearchs">
                                <fieldset>
                                    <div class="form-group" style="display:flex;">
                                        <div class="dc-select">
                                            <select name="states" class="chosen-select">
                                                <option value="">Select a state</option>
                                                @foreach (\App\Models\State::all() as $state)
                                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="dc-select">
                                            <select name="dependencies" class="chosen-select">
                                                <option value="">Select a dependency</option>
                                                @foreach (\App\Models\Dependency::all() as $dependency)
                                                    <option value="{{ $dependency->id }}">{{ $dependency->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="dc-select">
                                            <select name="cities" class="chosen-select">
                                                <option value="">Select a city</option>
                                                @foreach (\App\Models\City::all() as $city)
                                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="dc-btnarea">
                                            <a href="" class="dc-btn dc-resetbtn">Reset Filters</a>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="dc-breadcrumbarea" style="background:#ffffff">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ol class="dc-breadcrumb">
                    <li class="dc-item-home">
                        <a href="{{ route('accueil') }}" title="Home">Home</a>
                    </li>
                    <li class="dc-item-current dc-item-16">
                        <span class="dc-bread-current bread-16">Results</span>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<main id="dc-main" class="dc-main dc-haslayout">
    <div class="dc-haslayout dc-parent-section">
        <div class="container">
            <div class="row">
                <div id="dc-twocolumns" class="dc-twocolumns dc-haslayout d-flex dc-enabled">
                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 col-xl-9 order-first">
                        <div class="dc-searchresult-holder">
                            <div class="dc-searchresult-head">
                                @php
                                    $totalResults = count($medicalTeams);
                                @endphp
                                <div class="dc-title">
                                    <h4><strong>{{ $totalResults }}</strong>&nbsp;matches found </h4>
                                </div>
                                <div class="dc-rightarea">
                                    <div class="dc-select">
                                        <select name="orderby" class="orderby">
                                            <option value="">Sort By</option>
                                            <option value="date">Medical Specialists</option>
                                        </select>
                                    </div>
                                    <div class="dc-select">
                                        <select name="order" class="order">
                                            <option value="ASC">Ascending</option>
                                            <option value="DESC">Descending</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="dc-searchresult-grid dc-searchresult-list dc-searchvlistvtwo">
                                @foreach($medicalTeams as $medicalteam)
                                <div class="dc-docpostholder dc-search-hospitals">
                                    <div class="dc-docpostcontent">
                                        <div class="dc-searchvtwo">
                                            <div style="display: flex; align-items: center;">
                                                <figure style="margin-right: 10px;">
                                                    <img width="100px" height="100px" src="{{ asset('storage/' . $medicalteam->user->profile_photo_path) }}" alt="{{ $medicalteam->FirstName }}">
                                                </figure>
                                                <div>
                                                    <div class="dc-title">
                                                        <h3>
                                                            <a href="{{ route('profile', ['id' => $medicalteam->id]) }}">{{ $medicalteam->FirstName }}&nbsp;{{ $medicalteam->LastName }}</a>
                                                        </h3>
                                                        <em>
                                                            @php
                                                                $medicalType = App\Models\MedicalType::find($medicalteam->medical_type_id);
                                                            @endphp
                                                            @if($medicalType)
                                                                {{ $medicalType->name }}
                                                            @endif
                                                        </em>
                                                        @if($medicalteam->is_medical_registration_verified)
                                                            <i class="icon-sheild dc-awardtooltip dc-tipso" data-tipso="Medical Registration Verified"></i>
                                                        @endif
                                                        @if($medicalteam->is_verified_user)
                                                            <i class="far fa-check-circle dc-awardtooltip dc-tipso" data-tipso="Verified user"></i>
                                                        @endif
                                                        <ul class="dc-docinfo">
                                                            <li>
                                                                <span><em>{{ $medicalteam->nbre_feedbacks }}&nbsp; feedbacks</em></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dc-tags">
                                                <ul>
                                                    <strong>Services:</strong>
                                                    <!-- Add services here -->
                                                </ul>
                                            </div>
                                            <div class="dc-doclocation dc-doclocationvtwo">
                                                <span><i class="fas fa-map-marker-alt"></i>{{ $medicalteam->address_complete }}</span>
                                                <span><i class="fas fa-calendar-day"></i>Tue, Wed, Thu, Fri, Sun</span>
                                                <span><i class="fas fa-clock"></i>24/7 available</span>
                                                @php
                                                    $medicalTeamId = $medicalteam->id;
                                                    $medicalTeam = \App\Models\MedicalTeam::findOrFail($medicalTeamId);
                                                    $timeslots = $medicalTeam->generateTimeSlots();
                                                @endphp
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
