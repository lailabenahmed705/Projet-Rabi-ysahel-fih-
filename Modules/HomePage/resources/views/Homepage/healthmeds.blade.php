@extends('HomepageLayout.app')
@section('content')

<div class="dc-innerbanner-holder dc-haslayout dc-open dc-opensearchs">
    <form action="" method="get" id="search_form">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="dc-innerbanner">
                        <div class="dc-formtheme dc-form-advancedsearch dc-innerbannerform">
                            <fieldset>
                                <div class="form-group">
                                    <select name="search_category" id="search_category" class="chosen-select">
                                        <option value="">What are you looking for?</option>
                                        @foreach (\App\Models\MedicalType::all() as $medicalType)
                                        <option value="m-{{ $medicalType->id }}">{{ $medicalType->name }}</option>
                                        @endforeach
                                        @php
                                        $companyTypes = \DB::table('companies')->distinct()->pluck('company_type');
                                        @endphp
                                        @foreach ($companyTypes as $companyType)
                                        <option value="c-{{ $companyType }}">{{ $companyType }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="location" id="location" class="form-control" placeholder="Enter city or postal code">
                                </div>
                                <div class="dc-btnarea">
                                    <input type="submit" class="dc-btn" value="Search" onclick="updateFormAction()">
                                </div>
                            </fieldset>
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
                    <li class="dc-item-home"><a href="{{ route('accueil') }}" title="Home">Home</a></li>
                    <li class="dc-item-current dc-item-16"><span class="dc-bread-current bread-16"> Results</span></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<main id="dc-main" class="dc-main dc-haslayout">
    <div class="dc-haslayout dc-parent-section">
        <div class="container">
            <div class="row">
                <div id="dc-twocolumns" class="dc-twocolumns dc-haslayout d-flex dc-enabled" style="margin-left: 13%;">
                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 col-xl-9 order-first">
                        <div class="dc-searchresult-holder">
                           
                            @if (isset($medicalTeams) && $medicalTeams->count() > 0)
                            <div class="dc-searchresult-head">
                                <div class="dc-title">
                                    <h4><strong>{{ $medicalTeams->count() }}</strong>&nbsp;matches found</h4>
                                </div>
                                <div class="dc-rightarea">
                                    <div class="dc-select">
                                        <select name="orderby" class="orderby">
                                            <option value="">Sort By</option>
                                            <option value="ID">Availability</option>
                                            <option value="title">Feedbacks</option>
                                            <option value="date">Locations</option>
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
                                @php
                                $image = isset($medicalteam->user->profile_photo_path) ? $medicalteam->user->profile_photo_path : 'assets/images/uu.png';
                                @endphp
                                <div class="dc-docpostholder dc-search-hospitals">
                                    <div class="dc-docpostcontent">
                                        <div class="dc-searchvtwo">
                                            <figure class="dc-docpostimg">
                                                <img src="{{ asset($image) }}" class="dc-docpostimg" alt=" Icon" style="width: 199px;margin-right: 0px;align-content: center;">
                                            </figure>
                                            <div class="dc-title">
                                                <h3>
                                                    <a href="*">{{ $medicalteam->user->name }}&nbsp;</a>
                                                    <i class="icon-sheild dc-awardtooltip dc-tipso" data-tipso="Medical Registration Verified"></i>
                                                    <i class="far fa-check-circle dc-awardtooltip dc-tipso" data-tipso="Verified user"></i>
                                                </h3>
                                                <li><em>{{ $medicalteam->MedicalType->name }}</em></li>
                                                <div class="dc-tags">
                                                    <ul>
                                                        <ul class="dc-docinfo">
                                                        </ul>
                                                    </ul>
                                                </div>
                                                <div class="dc-doclocation dc-doclocationvtwo">
                                                    @if($medicalteam->medicaladdress->state_id)
                                                    @php
                                                    $state = \App\Models\State::find($medicalteam->medicaladdress->state_id);
                                                    $dependency = \App\Models\Dependency::find($medicalteam->medicaladdress->dependency_id);
                                                    @endphp
                                                    <span><i class="fas fa-map-marker-alt"></i>{{ $dependency->name }}, {{ $state->name }}</span>
                                                    @endif
                                                    <span><i class="fas fa-calendar-day"></i>Tue, Wed, Thu, Fri, Sun</span>
                                                    <span><i class="fas fa-clock"></i>24/7 available</span>
                                                    <div class="dc-btnarea">
                                                        <a href="" class="dc-btn">Book Now </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            @if($medicalTeams->count() >= 4)
                            <div class='dc-paginationvtwo'>
                                <nav class="dc-pagination" style="margin-top: 45px;">
                                    <ul>
                                        <li class="dc-active"><a href='javascript:;'>1</a></li>
                                        <li><a href=''>2</a></li>
                                        <li><a href=''>3</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div id="doctreat_apps-5" class="dc-widget dc-sidebarapps dc-widget dc-mobileappoptions widget_categories">
                                <div class="dc-mobileapp-content">
                                </div>
                            </div>
                            @endif
                            @else
                            <div class="dc-title">
                                <h4>No matches found</h4>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

            </aside>
        </div>
    </div>
</div>
</main>
@endsection

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- Include Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#location').select2({
            placeholder: 'Enter city or postal code',
            allowClear: true,
            tags: true,
            createTag: function(params) {
                var term = $.trim(params.term);
                if (term === '') {
                    return null;
                }
                return {
                    id: term,
                    text: term,
                    newOption: true
                };
            },
            templateResult: function(data) {
                var $result = $("<span></span>");
                $result.text(data.text);
                if (data.newOption) {
                    $result.append(" <em>(new)</em>");
                }
                return $result;
            },
            matcher: function(params, data) {
                if ($.trim(params.term) === '') {
                    return data;
                }

                var isNumber = !isNaN(params.term);

                if (isNumber) {
                    if (data.text.toUpperCase().indexOf(params.term.toUpperCase()) === 0) {
                        return data;
                    }
                } else {
                    if (data.text.length > 5 && data.text.toUpperCase().indexOf(params.term.toUpperCase(), 5) > -1) {
                        return data;
                    }
                }

                return null;
            }
        });
    });

    function updateFormAction() {
        const form = document.getElementById('search_form');
        const category = document.getElementById('search_category').value;
        const location = document.getElementById('location').value;

        if (category && location) {
            form.action = '/' + category + '/' + location;
        } else if (category) {
            form.action = '/' + category;
        } else if (location) {
            form.action = '/' + location;
        } else {
            form.action = '{{ route('search') }}';
        }
    }
</script>
