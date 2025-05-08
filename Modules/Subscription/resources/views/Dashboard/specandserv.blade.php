@extends('dashboardClientLayouts.app')
@section('content')

<form method="post" action="{{ route('specandserv') }}">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 col-xl-8">
        <div class="dc-dashboardbox dc-offered-holder">
            <div class="dc-dashboardboxtitle">
                <h2>Manage Services</h2>
            </div>

            @php
                $user = auth()->user();
                $medicalTypeId = $user->medicalteam->medical_type_id;
                $pecialities = Modules\Service\App\Models\ServiceCategory::where('medical_type_id', $medicalTypeId)->get();
                $servicesubCategories = App\Models\ServiceSubCategory::all();
            @endphp

            <!-- Button to show the add new service form -->
            <div class="dc-tabscontenttitle dc-addnew">
                <h3>Offered Services</h3>
                <a href="javascript:void(0);" class="dc-add_service" id="show-form">Add New</a>
            </div>

            <!-- Add New Service Form -->
            <div class="repeater-wrap-inner specialities_parents dc-specility-58" id="add-new-form-container" style="display: none;">
                @csrf
                <div class="form-group form-group-half">
                    <select name="service_category_id" class="form-control">
                        <option value="" disabled selected>Choose A Specialty</option>
                        @foreach ($pecialities as $peciality)
                            <option value="{{ $peciality->id }}">{{ $peciality->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group form-group-half">
                    @if(session('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif
                    <select name="subservice_id" class="form-control">
                        <option value="" disabled selected>Choose Service</option>
                        @foreach($servicesubCategories as $subCategory)
                            <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group form-group-half">
                    <input type="text" name="tarifs" class="form-control" placeholder="Price">
                </div>

                <div class="form-group form-group-half">
                    <input type="text" name="duration" class="form-control" placeholder="Choose the duration">
                </div>

                <div class="text-center">
                    <button class="btn btn-danger" type="submit"><i class="fas fa-paper-plane"></i> Submit</button>
                    <button class="btn btn-danger" type="button" id="cancel-new"><i class="fas fa-times-circle"></i> Cancel</button>
                </div>
            </div>

            <!-- List Existing Chosen Services and Subservices -->
            @php
                $chosenServiceIds = App\Models\ChosenService::where('medical_team_id', $user->medicalteam->id)->pluck('service_category_id');
                $serviceCategories = App\Models\ServiceCategory::whereIn('id', $chosenServiceIds)->get();
                $serviceSubCategories = $user->medicalteam->serviceSubCategories;
            @endphp

            @foreach ($serviceCategories as $category)
                <div class="repeater-wrap-inner specialities_parents dc-specility-58">
                    <div class="am_field">
                        <div class="d-flex align-items-center">
                            <p>{{ $category->name }}</p>
                            <form method="POST" action="{{ route('deleteServiceAndSubServices') }}" class="delete-form">
                                @csrf
                                <input type="hidden" name="category_id" value="{{ $category->id }}">
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </div>

                        @foreach($serviceSubCategories as $subCategory)
                            @if ($subCategory->service_category_id == $category->id)
                                <div class="dc-accordioninnertitle dc-subpaneltitle dc-subpaneltitlevtwo">
                                    <span>{{ $subCategory->name }}</span>
                                    <div class="dc-rightarea">
                                        <em>{{ isset($subCategory->pivot->tarifs) ? $subCategory->pivot->tarifs . 'dt' : 'N/A' }}</em>
                                        <em>for {{ isset($subCategory->pivot->duration) ? $subCategory->pivot->duration : 'N/A' }} hours</em>
                                        <div class="dc-btnaction">
                                            <a href="javascript:;" class="dc-addinfo dc-skillsaddinfo mr-2" id="accordioninnertitle{{ $subCategory->id }}" data-toggle="collapse" data-target="#innertitle{{ $subCategory->id }}" aria-expanded="true"><i class="fas fa-edit"></i></a>
                                            <form method="POST" action="{{ route('deleteSubService') }}" class="delete-sub-service-form">
                                                @csrf
                                                <input type="hidden" name="sub_category_id" value="{{ $subCategory->id }}">
                                                <button type="submit" class="btn btn-danger" style="height: 40px; width: 40px;"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</form>

<script>
    document.getElementById('show-form').addEventListener('click', function() {
        var formContainer = document.getElementById('add-new-form-container');
        formContainer.style.display = formContainer.style.display === 'none' ? 'block' : 'none';
    });
</script>

@endsection
