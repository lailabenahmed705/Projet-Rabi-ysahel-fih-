@extends('HomepageLayouts.app')
@section('content')
<style>.dc-feedback-content .rate-and-recommendation {
  display: flex;
  align-items: center;
  justify-content: space-between; /* Ajouter de l'espace entre les éléments */
}


.dc-feedback-content .recommendation i {
  margin-right: 5px;
  color: #28a745; /* Couleur verte pour l'icône de recommandation */
}

.dc-feedback-content .star-rating {
  display: flex;
  align-items: center;
}

.dc-feedback-content .star-rating i {
  color: #ffc107; /* Couleur jaune pour les étoiles pleines */
}


.dc-feedback-content .comment p {
  margin: 0;
}
.dc-feedback-content .rate-and-recommendation {
    display: flex;
    justify-content: space-between; /* Ajouter de l'espace entre les éléments */
}

.dc-feedback-content .rate {
    margin-right: auto; /* Aligner le "rate" à droite */
}

.dc-feedback-content .recommendation {
    margin-left: auto; /* Aligner la "recommandation" à gauche */
}

</style>
  <div class="dc-innerbanner-holder dc-haslayout dc-open dc-opensearchs ">
	  <form action="" method="get" id="search_form">
			<div class="container">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12">
						<div class="dc-innerbanner">
							<div class="dc-formtheme dc-form-advancedsearch dc-innerbannerform">
								<fieldset>
									<div class="form-group">
                    <select name="search_category" class="chosen-select">
                      <option value="">What are you looking for?</option>
                      <!-- Options à partir de la table MedicalType -->
                      @foreach (\App\Models\MedicalType::all() as $medicalType)
                          <option value="{{ $medicalType->id }}">{{ $medicalType->name }}</option>
                      @endforeach
                      <!-- Ajout de l'option "pharmacie" -->
                      <option value="pharmacy">Pharmacie</option>
                      <!-- Ajout de l'option "laboratoire" -->
                      <option value="laboratory">Laboratoire</option>
                  </select>

                  </div>
									<div class="form-group">
										<div class="dc-select">
                        <select name="location" class="chosen-select">
                          <option value="">Select a country </option>
                             @foreach (\App\Models\Country::all() as $country)
                             <option value="{{ $country->id }}">{{ $country->name }}</option>
                             @endforeach</option>
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
                        <select name="states" class="chosen-select ">
                            <option value="">Select a state</option>
                            @foreach (\App\Models\State::all() as $state)
                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                            @endforeach</option>
                        </select>
                       </div>
                        <div class="dc-select">
                          <select name="dependencies" class="chosen-select ">
                            <option value="">Select a dependency</option>
                              @foreach (\App\Models\Dependency::all() as $dependency)
                              <option value="{{ $dependency->id }}">{{ $dependency->name }}</option>
                              @endforeach</option>
                          </select>
                        </div>
                        <div class="dc-select">
                          <select name="cities" class="chosen-select ">
                            <option value="">Select a city</option>
                              @foreach (\App\Models\City::all() as $city)
                              <option value="{{ $city->id }}">{{ $city->name }}</option>
                              @endforeach</option>
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
                  <a href="{{ route('accueil') }}" title="Home">Home</a></li>
                <li class="dc-item-cat dc-item-custom-post-type-doctors">
                  <a class="dc-bread-cat dc-bread-custom-post-type-doctors" href="" title="">Results</a></li>
                <li class="dc-item-current item-460"><span class="dc-bread-current bread-460" title="Profile">Profile</span></li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <main id="dc-main" class="dc-main dc-haslayout">
        <div class="dc-haslayout dc-parent-section">
          <div class="container">
            <div class="row">
              <div id="dc-twocolumns" class="dc-twocolumns dc-haslayout">
								<div class="col-12 col-lg-12 col-xl-9 float-left">
						    	<div class="dc-docsingle-header">
                        <figure class="dc-docsingleimg">
                          @if(!empty($lab->user->profile_photo_path))
                          <img width="" height="" class="dc-image-res" src="{{ asset('storage/' . $lab->user->profile_photo_path) }}"  alt="{{ $lab->establishment_name }}">
                      @else
                          <img class="dc-ava-detail" src="{{ asset('assets/img/avatars/avatarhel.jpg') }}" alt="{{ $lab->establishment_name }}">
                      @endif
                       </figure>
                    <div class="dc-docsingle-content">
                      <div class="dc-title">
							          <h2>
                          <a href="">{{ $lab->establishment_name }} </a>
                          <i class="far fa-check-circle dc-awardtooltip dc-tipso" data-tipso="Verified user"></i>
                        </h2>
                      </div>
		                  	<ul class="dc-docinfo">
                          <li><div class="dc-doc-specilities-tag">
                            <a href="">
                              Laboratory
                          </a>
                          </div></li>
                          <li>
                          <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-square-text" viewBox="0 0 16 16">
                                <path d="M0 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H6l-3 3v-3H1a1 1 0 0 1-1-1V1z"/>
                                <path d="M11 1v5h4.293l.353.354a.5.5 0 0 1 0 .707L11.707 11H11v1a1 1 0 0 1-1 1H8.414l-2 2H11a2 2 0 0 0 2-2V6.414l2-2V8a2 2 0 0 1-2 2H9v1h2.586l3-3V1h-4z"/>
                            </svg>
                            {{ $lab->nbre_feedbacks }} feedbacks
                        </span>
                      </li>
                        <li>
                        <p><i class="fas fa-calendar-alt"></i> {{ $lab->experience }} years of experience and hardwork</p></li>
                      </ul>
                    <div class="dc-btnarea">

                      <a href="#" class="dc-btn dc-add-feedback" data-bs-toggle="modal" data-bs-target="#feedbackModal">Add Feedback</a>
			          		</div>
                    </div>
                <div class="dc-docsingle-holder">
								<ul class="dc-navdocsingletab nav navbar-nav">
									<li class="nav-item dc-doctor-detail">
										<a id="userdetails-tab" class="active" data-toggle="tab" href="#userdetails">Details:</a>
									</li>
								</ul>
                </div>
                @if(Auth::check() && Auth::user()->role->id == 'patient')
                  <div class="tab-content dc-contentdoctab dc-haslayout">
                  <!-- Modal pour Feedback -->
                  <div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="feedbackModalLabel">Feedback</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <!-- Insérez votre formulaire de feedback ici -->
                          <form action="{{ route('feedback.store') }}" method="POST" style="display: flex; flex-direction: column;">
                            @csrf
                            <!-- Autres champs du formulaire de feedback -->
                            <div style="display: flex; align-items: center;">
                                <input name="staff_attendee_id" id="staffAttendeeId" value="{{ $lab->user->id }}" style="margin-right: 10px;">
                                <label for="staffAttendeeId">Staff Attendee ID</label>
                            </div>
                            <div style="display: flex; align-items: center;">
                            <input type="number" name="rate" placeholder="Rate" min="1" max="5">
                            </div>

                            <div style="display: flex; align-items: center;">
                                <input name="attendee_id" value="{{ auth()->user()->patient->id }}" style="margin-right: 10px;">
                                <label for="attendee_id">Attendee ID</label>
                            </div>
                            <div style="display: flex; align-items: center;">
                                <input type="text" name="comment" placeholder="Any comment ?" style="margin-right: 10px;">
                                <label for="comment">Comment</label>
                            </div>
                            <div style="display: flex; align-items: center;">
                                <input type="checkbox" name="i_recommand" id="i_recommand" value="1" style="margin-right: 10px;">
                                <label for="i_recommand">I recommend this service</label>
                            </div>
                            <div style="display: flex; align-items: center;">
                                <input type="datetime-local" name="appointment_time" id="appointment_time" style="margin-right: 10px;">
                                <label for="appointment_time">Appointment Time</label>
                            </div>

                        <div class="modal-footer">
                          <button type="submit" style="margin-top: 10px;">Submit Feedback</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                      </div>
                    </div>
                  </div>
                  @endif
	<div class="dc-searchresult-holder">
    <div class="dc-userdetails-holder active tab-pane" id="userdetails">
        <div class="dc-infotitle">
          <h3>personal Details:</h3>
        </div>
        <div class="dc-description">
          <p><span>responsible: {{ $lab->responsible_name }}</span></p>
          <p><span><i class="fas fa-map-marker-alt"></i>{{ $lab->address_complete }}</span></p>
          <p><i class="fas fa-phone"></i>{{ $lab->phoneNumber }}</p>
          <p><i class="fas fa-envelope"></i>{{ $lab->email }}</p>
          <p>{{ $lab->professional_bio }}</p>
        </div>
    </div>
  </div>
<div class="dc-education-holder dc-aboutinfo">
  <div class="dc-infotitle">
    <h3>working Hours </h3>
  </div>
  <ul class="dc-expandedu">
    <li class=""> <div class="dc-subpaneltitle"><span><em></em>	Starting at : 			</span><em>{{ $lab->start_time }}</em>							</div></li>
    <li class=""><div class="dc-subpaneltitle"><span><em></em> ending at : 	</span><em>	{{ $lab->end_time }}</em>						</div></li>
    <li class=""><div class="dc-subpaneltitle"><span>working days :  <em></em>	</span><em>{{ $lab->workdays }}</em></div></li>
  </ul>
</div>
@if($lab->pathologyteam)
<div class="dc-education-holder dc-aboutinfo">
  <div class="dc-infotitle">
    <h3>working Hours </h3>
  </div>
  <ul class="dc-expandedu">
    <li class=""> <div class="dc-subpaneltitle"><span><em></em>	 First name :			</span><em>{{ $lab->pathologyteam->firstName }}</em>							</div></li>
    <li class=""><div class="dc-subpaneltitle"><span><em></em> Last name : 	</span><em>{{ $lab->pathologyteam->lastName }}</em>						</div></li>
    <li class=""><div class="dc-subpaneltitle"><span>Phone number days :  <em></em>	</span><em>{{ $lab->pathologyteam->phoneNumber }}</em></div></li>
  </ul>
</div>
@else
<p>No pathology team information available.</p>
@endif
<div class="dc-education-holder dc-aboutinfo">
  <div class="dc-infotitle">
    <h3>Education </h3>
  </div>
  <ul class="dc-expandedu">
    <li class=""> <div class="dc-subpaneltitle"><span><em></em>			</span><em>{{ $lab->education }}</em>							</div></li>
    <li class=""><div class="dc-subpaneltitle"><span><em></em> 	</span><em>	{{ $lab->education }}</em>						</div></li>
  </ul>
</div>
<div class="dc-education-holder dc-aboutinfo">
  <div class="dc-infotitle">
    <h3>Certificates </h3>
  </div>
  <ul class="dc-expandedu">
    <li class=""> <div class="dc-subpaneltitle"><span><em></em>	 			</span><em>{{ $lab->certificates }}</em>							</div></li>
    <li class=""><div class="dc-subpaneltitle"><span><em></em>  	</span><em>	{{ $lab->education }}</em>						</div></li>
  </ul>
</div>
  @php
  $feedbacks = \App\Models\Feedback::where('staff_attendee_id', $lab->user->id)->get();
  @endphp
<div class="dc-feedback-holder">
  <div class="dc-feedback">
      <div class="dc-searchresult-head">
          <div class="dc-title"><h4>Patient Feedback</h4></div>
      </div>
      @if($feedbacks->isEmpty())
<p>No feedbacks written.</p>
@else
      @isset($feedbacks)
      @foreach($feedbacks as $feedback)
      @php
      // Trouver l'ID du patient à partir de l'ID de l'assistant dans le feedback
      $patientId = \App\Models\Patient::where('id', $feedback->attendee_id)->value('id');
      // Trouver les détails du patient
      $patient = \App\Models\Patient::find($patientId);
      @endphp

      <div class="dc-consultation-content dc-feedback-content">
          <div class="dc-consultation-details">
              <figure class="dc-consultation-img">
                  <img src="https://amentotech.com/projects/doctreat/wp-content/themes/doctreat/images/user.png" alt="Anonymous">
              </figure>
              <div class="dc-consultation-title">
                  <h5>{{ $patient->name }}</h5>
                  <span>date of appointment:{{ $feedback->appointment_time}}</span>
              </div>
              <div class="dc-description">
                  <div class="rate-and-recommendation">
                      <div class="star-rating rate">
                          <p>Rate:</p>
                          @for ($i = 1; $i <= 5; $i++)
                          @if ($i <= $feedback->rate)
                          <i class="fas fa-star"></i>
                          @endif
                          @endfor
                      </div>
                      @if($feedback->i_recommand)
                      <p class="text-success">I Recommend This Doctor</p>
                      @endif
                  </div>
                  <p>{{ $feedback->comment }}</p>
              </div>
          </div>
      </div>

      @endforeach
      @endisset
      @endif
  </div>
</div>
        </div>
      </div>
    </div>
  </div>
<div class="col-12 col-md-6 col-lg-6 col-xl-3 float-left">
<aside id="dc-sidebar" class="dc-sidebar dc-sidebar-grid float-left mt-xl-0">
<div class="dc-contactinfobox dc-locationbox">
  <div class="dc-mapbox">
    <div id="location-pickr-map" class="dc-locationmap location-pickr-map" data-latitude="-24.004758" data-longitude="133.368101"></div>
      <ul class="dc-contactinfo">
       	<li class="dcuser-location"><span><i class="fas fa-map-marker-alt"></i>{{ $lab->address_complete }}</span></li>
        <li class="dcuser-clock"><i class="fas fa-calendar-alt"></i><span><em class="dc-bold">Mon</em>, Tue, Wed, Thu, Fri, Sat, Sun				</span></li>
        <li class="dcuser-availability"><i class="far fa-calendar-check"></i><span><em class="dc-available">Available Today</em></span></li>
      </ul>
      <a href="{{ route('bookAppointment', ['staff_id' => $lab->id]) }}" class="dc-btn dc-btn-lg">
        Book Now with {{ $lab->FullName }}
    </a>
    </div>
  </main>

@endsection









