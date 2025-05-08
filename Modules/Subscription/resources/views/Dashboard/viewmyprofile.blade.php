@extends('dashboardClientLayouts.app')
@section('content')
@php
    use Illuminate\Support\Facades\DB;

    $user = auth()->user();

    $medicalTeam = DB::table('medical_team')->where('user_id', $user->id)->first();
    $company = DB::table('companies')->where('user_id', $user->id)->first();

    $address = null;

    if ($company) {
        // Récupère l'adresse liée à la company
        $address = DB::table('addresses')
            ->where('addressable_type', 'Modules\\Users\\App\\Models\\Company')
            ->where('addressable_id', $company->id)
            ->first();
    } elseif ($medicalTeam) {
        // Récupère l'adresse liée au medical team
        $address = DB::table('addresses')
            ->where('addressable_type', 'Modules\\Users\\App\\Models\\MedicalTeam')
            ->where('addressable_id', $medicalTeam->id)
            ->first();
    }
@endphp


        <div id="dc-twocolumns" class="dc-twocolumns dc-haslayout">
          <div class="col-12 col-lg-12 col-xl-9 float-left" style="
    margin-left: 14%;
">
            <div class="dc-docsingle-header">
                  <figure class="dc-docsingleimg">
                     @if(Auth::user()->profile_photo_path)
      <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="user">
  @else
      <img src="{{ asset('images/avatars/1.png') }}" alt="user">
  @endif

                  </figure>
                  <div class="col-md-8">
            <div class="profile-details">
            @if($company)
                <h2>{{ $company->company_name }} <span class="badge badge-info">{{ $user->role->name }}</span></h2>
                <p>{{ $user->email }}</p>
                </div>
                @else
                <span class="badge badge-info">
               {{ optional($user->role)->name ?? 'No Role' }}
                 </span>
                <p>{{ $user->email }}</p>


            </div>
@endif

                <div class="dc-description">
                <p></p>
              </div>

              </div>


          <div class="dc-docsingle-holder">
          <ul class="dc-navdocsingletab nav navbar-nav">
            <li class="nav-item dc-doctor-detail">
              <a id="userdetails-tab" class="active" data-toggle="tab" href="#userdetails">Details:</a>
            </li>

          </ul>
          </div>
          <div class="tab-content dc-contentdoctab dc-haslayout">

<div class="dc-searchresult-holder">
        <div class="dc-userdetails-holder active tab-pane" id="userdetails">

<div class="dc-infotitle">
<h3>personal Details:</h3>
</div>
@if($company)

                <p>
                    @if ($user)
                        <strong>Phone:</strong> {{ $user->Phone }}<br>
                        <strong>Bio:</strong> {{ $company->professional_bio }}<br>
                        <strong>Manager:</strong>  {{ $company->manager }}<br>
                        <strong>Address:</strong> {{  $address->address_complete }}
                    @else
                        No additional details available.
                    @endif
                </p>

            @else

                <p>
                    @if ($user)
                        <strong>Phone:</strong> {{ $user->Phone }}<br>
                        <strong>Service médical:</strong> {{ $company?->medicalservice ?? 'Aucun service' }}<br>
                        <strong>Address:</strong> {{ $address?->address_complete ?? 'Adresse non disponible' }}

                    @else
                        No additional details available.
                    @endif
                </p>

@endif
</div>

</class>
<div class="dc-education-holder dc-aboutinfo">

<div class="dc-section">
    <div class="dc-infotitle">
        <h3>Education</h3>
    </div>
    <ul class="dc-expandedu" id="education-list">
        @if($company && isset($company->education) && is_array(json_decode($company->education)))
            @foreach(json_decode($company->education) as $education)
                <li class="dc-list-item">
                    <div class="dc-subpaneltitle">
                        <span>{{ $education->diplomas }}</span>
                        <em>{{ $education->years }}</em>
                    </div>
                    <div class="dc-subpaneldetails">
                        <em class="dc-institute"style="
    margin-left: 2.1%;
">{{ $education->institutes }}</em>
                    </div>
                </li>
            @endforeach
        @elseif($medicalTeam && isset($medicalTeam->medicalservice->education) && is_array(json_decode($medicalTeam->medicalservice->education)))
            @foreach(json_decode($medicalTeam->medicalservice->education) as $education)
                <li class="dc-list-item">
                    <div class="dc-subpaneltitle">
                        <span>{{ $education->diplomas }}</span>
                        <em>{{ $education->years }}</em>
                    </div>
                    <div class="dc-subpaneldetails">
                        <em class="dc-institute"style="
    margin-left: 2.1%;
">{{ $education->institutes }}</em>
                    </div>
                </li>
            @endforeach
        @else
            <li class="dc-list-item">No education details available.</li>
        @endif
    </ul>

    <div class="dc-infotitle">
        <h3>Certificates</h3>
    </div>
    <ul class="dc-expandedu" id="certificates-list">
        @if($company && isset($company->certificates) && is_array(json_decode($company->certificates)))
            @foreach(json_decode($company->certificates) as $certificate)
                <li class="dc-list-item">
                    <div class="dc-subpaneltitle">
                        <span>{{ $certificate->names }}</span>
                        <em>{{ $certificate->years }}</em>
                    </div>
                    <div class="dc-subpaneldetails">
                        <em class="dc-institute" style="
    margin-left: 2.1%;
">{{ $certificate->organizations }}</em>
                    </div>
                </li>
            @endforeach
        @elseif($medicalTeam && isset($medicalTeam->medicalservice->certificates) && is_array(json_decode($medicalTeam->medicalservice->certificates)))
            @foreach(json_decode($medicalTeam->medicalservice->certificates) as $certificate)
                <li class="dc-list-item">
                    <div class="dc-subpaneltitle">
                        <span>{{ $certificate->names }}</span>
                        <em>{{ $certificate->years }}</em>
                    </div>
                    <div class="dc-subpaneldetails">
                        <em class="dc-institute" style="
    margin-left: 2.1%;
">{{ $certificate->organizations }}</em>
                    </div>
                </li>
            @endforeach
        @else
            <li class="dc-list-item">No certificate details available.</li>
        @endif
    </ul>
</div>

<style>
.dc-infotitle h3 {
    color: #007BFF;
    font-size: 1.5em;
    border-bottom: 2px solid #007BFF;
    padding-bottom: 10px;
    margin-bottom: 20px;
    cursor: pointer;
}

.dc-expandedu {
    list-style: none;
    padding: 0;
}

.dc-list-item {
    background-color: #e6f2ff;
    padding: 15px;
    margin-bottom: 10px;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.dc-list-item:hover {
    background-color: #cce0ff;
}

.dc-subpaneltitle {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 1.1em;
    color: #0056b3;
}

.dc-subpaneltitle em {
    font-style: normal;
    color: #333;
}

.dc-subpaneltitle span {
    font-weight: bold;
    color: #0056b3;
}

.dc-subpaneldetails {
    font-size: 0.9em;
    color: #666;
    margin-top: 5px;
}

.dc-institute {
    font-family: 'Arial', sans-serif;
    font-size: 1.2em;
    color: #0056b3;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.dc-infotitle h3').forEach(title => {
        const nextElement = title.nextElementSibling;
        nextElement.style.display = 'none';
        title.addEventListener('click', () => {
            if (nextElement.style.display === 'none') {
                nextElement.style.display = 'block';
            } else {
                nextElement.style.display = 'none';
            }
        });
    });
});
</script>


<div class="dc-feedback-holder tab-pane" id="feedback">
<div class="dc-feedback">
<div class="dc-searchresult-head">
<div class="dc-title"><h4>Patient Feedback</h4></div>
</div>
<div class="dc-consultation-content dc-feedback-content">
        <div class="dc-consultation-details">
                                  <figure class="dc-consultation-img">
            <img src="https://amentotech.com/projects/doctreat/wp-content/themes/doctreat/images/user.png" alt="Anonymous">
          </figure>
          <div class="dc-consultation-title">
            <h5>Who</h5>
            <span>when</span>
          </div>
                      <div class="dc-description">
          <p>Feedback of patient here</p>
        </div>

            </div>
      </div>
</div>
</div>
          </div>
          </div>

            </div>
          </div>

          <div class="col-12 col-md-6 col-lg-6 col-xl-3 float-left">
          <aside id="dc-sidebar" class="dc-sidebar dc-sidebar-grid float-left mt-xl-0">


</main>







@endsection
