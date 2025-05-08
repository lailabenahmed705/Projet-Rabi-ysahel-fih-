@extends('HomepageLayouts.app')
@section('content')

  <div class="dc-innerbanner-holder dc-haslayout dc-open dc-opensearchs ">
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
                          <option value="">Select a country</option>
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
			<div class="dc-breadcrumbarea" style="background:#ffffff"><div class="container"><div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><ol class="dc-breadcrumb"><li class="dc-item-home">
        <a href="{{ route('accueil') }}" title="Home">Home</a></li><li class="dc-item-current dc-item-16"><span class="dc-bread-current bread-16"> Results</span></li></ol></div></div></div></div>		<main id="dc-main" class="dc-main dc-haslayout"><div class="dc-haslayout dc-parent-section">
	    <div class="container">
		    <div class="row">
			    <div id="dc-twocolumns" class="dc-twocolumns dc-haslayout d-flex dc-enabled">
				    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 col-xl-9 order-first">
					    <div class="dc-searchresult-holder">
						    <div class="dc-searchresult-head">

						    	<div class="dc-title"><h4><strong>Our laboratories</strong></h4></div>
										<div class="dc-rightarea">
								    	<div class="dc-select">
									    	<select name="orderby" class="orderby">
											    <option value="">Sort By</option>
														<option  value="ID"></option>
														<option  value="title">Laboratories</option>
														<option  value="date">Medical Specialists</option>
												</select>
									    </div>
									    <div class="dc-select">
                        <select name="order" class="order">
                          <option value="ASC">Ascending</option>
                          <option value="DESC" >Descending</option>
                        </select>
								    	</div>
							    	</div>
									</div>
					      	<div class="dc-searchresult-grid dc-searchresult-list dc-searchvlistvtwo">




                    @php
                    $laboratories = App\Models\Laboratory::all(); // Récupérer toutes les équipes médicales depuis le modèle
                    @endphp
                    @foreach($laboratories as $lab)
						      	<div class="dc-docpostholder dc-search-hospitals">
	                    <div class="dc-docpostcontent">
		                    <div class="dc-searchvtwo">
                            <figure class="dc-docpostimg">
                              <img width="" height="" class="dc-image-res" src="{{ asset($lab->profile_photo_path) }}" alt="{{ $lab-> establishment_name}}">
                            </figure>
						      		  	<div class="dc-title">
							            	<h3>
                              <a href="*">{{ $lab->establishment_name  }}</a>
                                <ul class="dc-docinfo">
                                    <li><em>responsible:{{ $lab->responsible_name }}</em></li>
                                </ul>
                            </div>
                              @if($lab->is_medical_registration_verified)
                              <i class="icon-sheild dc-awardtooltip dc-tipso" data-tipso="Medical Registration Verified"></i>
                              @endif
                              @if($lab->is_verified_user)
                              <i class="far fa-check-circle dc-awardtooltip dc-tipso" data-tipso="Verified user"></i>
                              @endif
                            </h3>
                              <li><em>laboratory</em></li>
                            </ul>
                           </div>
									        <div class="dc-tags">

				                  </div>

					              <div class="dc-doclocation dc-doclocationvtwo">
								        	@if($lab->state_id)
                              @php
                                  $state = \App\Models\State::find($lab->state_id);
                              @endphp
                              @if($state)
                                  <span><i class="fas fa-map-marker-alt"></i>{{ $state->name }}</span>
                              @endif
                          @endif
													<span><i class="fas fa-calendar-day"></i>Tue, Wed, Thu, Fri, Sun					</span>
													<span><i class="fas fa-clock"></i>24/7 available</span>

							        	<div class="dc-btnarea">
                          <a href="{{ route('laboratories', ['id' => $lab->id]) }}" class="dc-btn">View Full profile</a>
						          	</div>
                        </div>
                        @endforeach
		              	</div>
                  </div>


        
              </div>
				  	</div>
			  	</div>
					<div class="col-12 col-md-5 col-lg-4 col-xl-3 order-last">
						<aside id="dc-sidebar" class="dc-sidebar dc-sidebar-grid float-left mt-md-0 mt-lg-0 mt-xl-0">
							<div id="doctreat_query_online-3" class="dc-widget dc-sidebarquery dc-widget dc-onlineoptions widget_categories">

							</div>
              <div id="doctreat_apps-5" class="dc-widget dc-sidebarapps dc-widget dc-mobileappoptions widget_categories">

								<div class="dc-mobileapp-content">

			        	</div>
			        </div>

            </aside>
					</div>
				</div>
		  </div>
	  </div>
  </div>
</main>
@endsection
