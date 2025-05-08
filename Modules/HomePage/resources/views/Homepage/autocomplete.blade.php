@extends('HomepageLayouts.app')
@section('content')
<style>
  /* Utilisation de Flexbox pour aligner les éléments sur la même ligne */
  .doctorslider {
    display: flex;
    flex-wrap: nowrap; /* Empêcher le retour à la ligne */
  }

  /* Ajustement de la largeur des éléments */
  .doctorslider .item {
    flex: 0 0 20%; /* Diviser la largeur en 5 colonnes */
  }
  </style>
  @php
   $medicalTeams = App\Models\MedicalTeam::all(); // Récupérer toutes les équipes médicales depuis le modèle
   $pharmacies = App\Models\Pharmacy::all();
   $laboratories = App\Models\Laboratory::all();
  @endphp
  <main id="dc-main" class="dc-main dc-haslayout">
    <div data-elementor-type="wp-post" data-elementor-id="77" class="elementor elementor-77">
			<div class="elementor-inner">
				<div class="elementor-section-wrap">
					<section class="elementor-section elementor-top-section elementor-element elementor-element-bd1b47c elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default" >
						<div class="elementor-container elementor-column-gap-no">
							<div class="elementor-row">
					      <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-680df21" >
			            <div class="elementor-column-wrap elementor-element-populated">
				      			<div class="elementor-widget-wrap">
					          	<div class="elementor-element elementor-element-0c7eb5b elementor-widget elementor-widget-dc_element_slider_v1" >
			                	<div class="elementor-widget-container">
			              			<div class="dc-sc-slider dc-homesliderholder dc-haslayout dynamic-secton">
				          					<div id="dc-homeslider" class="dc-homeslider">
		                  				<div id="carouselControls" class="carousel slide" >
		                  					<div class="carousel-inner">
																	<div class="carousel-item active" id="carousel-item-2">
				                  					<div class="d-flex justify-content-center dc-craousel-content">
				                  						<div class="mx-auto">
																				<img loading="lazy" width="" height="" class="d-block dc-bannerimg" src="http://amentotech.com/projects/doctreat/wp-content/uploads/2019/08/img-01-1.png" alt="Emergency?">
																					<div class="dc-bannercontent dc-bannercotent-craousel" >
													                  <div class="dc-content-carousel">
													                    <div class="dc-num">01.</div>
                                               <h1> <em>Experiencing </em>	an Urgent<span> Medical Issue?</span>	</h1>
																							</div>
											                      </div>
																	      	</div>
									                    </div>
									                  </div>
                                  </div>
                                  <div class="carousel-item " id="carousel-item-3">
                                    <div class="d-flex justify-content-center dc-craousel-content">
                                      <div class="mx-auto">
                                        <img loading="lazy" width="" height="" class="d-block dc-bannerimg" src="http://amentotech.com/projects/doctreat/wp-content/uploads/2019/08/img-02-3.png" alt="Emergency?">
                                        <div class="dc-bannercontent dc-bannercotent-craousel" >
                                          <div class="dc-content-carousel">
                                            <div class="dc-num">02.</div>
                                              <h1>
                                                <em>Don't Worry! </em>	We've Got You<span>Covered!</span>
                                              </h1>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="carousel-item " id="carousel-item-4">
                                    <div class="d-flex justify-content-center dc-craousel-content">
                                      <div class="mx-auto">
                                        <img loading="lazy" width="" height="" class="d-block dc-bannerimg" src="http://amentotech.com/projects/doctreat/wp-content/uploads/2019/08/img-03-2.png" alt="Emergency?">
                                        <div class="dc-bannercontent dc-bannercotent-craousel" >
                                          <div class="dc-content-carousel">
                                            <div class="dc-num">03.</div>
                                              <h1>
                                                <em>Use Our Service to Locate </em>	the Closest	<span> Medical Facility</span>
                                              </h1>
                                              <div class="dc-btnarea">
                                                <a href="" class="dc-btn dc-btnactive">View Healthcare Specialist</a>
                                                <a href="" class="dc-btn">View pharmacists</a>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <a class="dc-carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
                                      <span class="dc-carousel-control-prev-icon" aria-hidden="true"><span>PR</span><span class="d-block">EV</span></span>
                                      <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="dc-carousel-control-next" href="#carouselControls" role="button" data-slide="next">
                                      <span class="dc-carousel-control-next-icon " aria-hidden="true"><span>NE</span><span class="d-block">XT</span></span>
                                      <span class="sr-only">Next</span>
                                    </a>
                                  </div>
                                 </div>
                                </div>
						                  </div>
		                        </div>
			                    </div>
			            	    </div>
			                </div>
		                </div>
			  			    </div>
			          </div>
              </div>
            </section>
		    		<section class="elementor-section elementor-top-section elementor-element elementor-element-4d916c7 elementor-section-boxed elementor-section-height-default elementor-section-height-default  mb-9" >
					  	<div class="elementor-container elementor-column-gap-no">
							  <div class="elementor-row">
				        	<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-1f8daed" data-id="1f8daed" data-element_type="column">
			              <div class="elementor-column-wrap elementor-element-populated">
				        			<div class="elementor-widget-wrap">
				            		<div class="elementor-element elementor-element-2c02a01 elementor-widget elementor-widget-dc_element_search_form" data-id="2c02a01" data-element_type="widget" data-widget_type="dc_element_search_form.default">
			                  	<div class="elementor-widget-container">
			                			<div class="dc-haslayout dc-section-180876 ">
                              <div class="dc-searchform-holder">
                                  <div class="dc-advancedsearch">
                                      <div class="dc-title">
                                          <h2>Start Your Search</h2>
                                      </div>
                                      <form class="dc-formtheme dc-form-advancedsearch" action="" method="get">
                                          <fieldset>
                                              <div class="form-group">
                                                  <input type="text" name="search_category" class="form-control" placeholder="What are you looking for?">
                                              </div>
                                              <div class="form-group">
                                                  <input type="text" name="country_name" id="country_name" class="form-control" placeholder="Enter Country Name" />

                                              </div>
                                              <div class="dc-formbtn">
                                                  <button class="dc-serach-form"><i class="fas fa-search"></i><span>&nbsp;Search now</span></button>
                                              </div>
                                          </fieldset>
                                      </form>
                                  </div>
										        	<div class="dc-jointeamholder">
					                  		<div class="dc-jointeam">
																	<figure class="dc-jointeamimg">
									                	<img loading="lazy" width="" height="" src="http://amentotech.com/projects/doctreat/wp-content/uploads/2019/08/img-04-1.png" alt="img description">
								                	</figure>
                                      <div class="dc-jointeamcontent">
                                            <h3>
                                              <span>Are You A Healthcare </span> Specialist?</h3>
                                              <a href="" class="dc-btn dc-btnactive">Join Now</a>
																			</div>
														  	</div>
					                  	</div>
						          			</div>
		                    	</div>
  				              </div>
	              			</div>
	        					</div>
	        				</div>
	            	</div>
							</div>
					  </div>
		      </section>
          <section class="elementor-section elementor-top-section elementor-element elementor-section-boxed elementor-section-height-default elementor-section-height-default ">
            <div class="doctorslider ">
              <div class=" item dc-doctordetails-holder dc-titlecolor1">
                <span class="dc-slidercounter">
                  <img loading="lazy" width="" height="" src="" alt="">
                </span>
                <h3>
                  <span>Looking for</span> pharmacies
                </h3>
                <a href="#" class="dc-btn" data-target=".dc-hidden-section">Show All Nearest Pharmacies</a>
              </div>
              <div class=" item dc-doctordetails-holder dc-titlecolor2">
                <span class="dc-slidercounter">
                  <img loading="lazy" width="" height="" src="http://amentotech.com/projects/doctreat/wp-content/uploads/2019/10/2.png" alt="links">
                </span>
                <h3>
                  <span>Looking For </span> Heathcare specialist
                </h3>
                <a href="#" class="dc-btn" data-target=".dc-hidden-section">Show All Nearest Heathcare specialist</a>
              </div>
              <div class=" item dc-doctordetails-holder dc-titlecolor3">
                <span class="dc-slidercounter">
                  <img loading="lazy" width="" height="" src="http://amentotech.com/projects/doctreat/wp-content/uploads/2019/10/1.png" alt="links">
                </span>
                <h3>
                  <span>Need Assistance?</span> Here to Help.
                </h3>
                <a href="#" class="dc-btn" data-target=".dc-hidden-section">Discover now !</a>
              </div>
              <div class=" item dc-doctordetails-holder dc-titlecolor4">
                <span class="dc-slidercounter">
                  <img loading="lazy" width="" height="" src="http://amentotech.com/projects/doctreat/wp-content/uploads/2019/10/4.png" alt="links">
                </span>
                <h3>
                  <span>Everything </span> you need is here
                </h3>
                <a href="#" class="dc-btn" data-target=".dc-hidden-section">Show All Nearest Laboratories</a>
              </div>
              <div class=" item dc-doctordetails-holder dc-titlecolor5">
                <span class="dc-slidercounter">
                  <img loading="lazy" width="" height="" src="http://amentotech.com/projects/doctreat/wp-content/uploads/2019/10/5.png" alt="links">
                </span>
                <h3>
                  <span>Help on The Go</span> Download App
                </h3>
                <a href="#" class="dc-btn" data-target=".dc-hidden-section">click here</a>
              </div>
            </div>
          </section>
          <div class="elementor-container elementor-column-gap-no dc-hidden-section">
            <div class="elementor-row">
              <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-ed667b0" >
                <div class="elementor-column-wrap elementor-element-populated">
                  <div class="elementor-widget-wrap">
                    <div class="elementor-element elementor-element-8c20aa1 elementor-widget elementor-widget-dc_element_featured_doctors" >
                      <div class="elementor-widget-container">
                        <div class="dc-haslayout sc-top-reted">
                          <div class="container">
                            <div class="row justify-content-center align-self-center">
                              @foreach($laboratories as $laboratory)
                                <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                                  <div class="dc-docfeatured">
                                    <div class="dc-docpostholder">
                                      <a href="{{ $laboratory->url }}">
                                        <figure class="dc-docpostimg">
                                          <img loading="lazy" class="dc-image-res" src="{{ asset('assets/img/avatars/avatarhel.jpg') }}" alt="healthmed">
                                        </figure>
                                      </a>
                                      <div class="dc-docpostcontent">
                                        <div class="dc-title">
                                          <h3>{{ $laboratory->name }}</h3>
                                          @if($laboratory->is_medical_registration_verified)
                                            <i class="icon-sheild dc-awardtooltip dc-tipso fas fa-shield-alt" data-tipso="Medical Registration Verified"></i>
                                          @endif
                                        </div>
                                        <div class="dc-doclocation">
                                          <i class="fas fa-map-marker-alt"></i>&nbsp;{{ $laboratory->address_complete }}
                                          <span>
                                            <i class="far fa-calendar-check"></i>
                                            <em class="dc-available">Available Today</em>
                                          </span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              @endforeach
                            </div>
                            <div class="col-12">
                              <div class="dc-btnarea">
                                <a href="{{ route('laboratories') }}" class="dc-btn">Show All</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <section class="elementor-section elementor-top-section elementor-element elementor-section-boxed elementor-section-height-default elementor-section-height-default mb-5 ">
            <div class="elementor-container elementor-column-gap-no">
              <div class="elementor-row">
                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-f6b20a1" data-id="f6b20a1" data-element_type="column">
                  <div class="elementor-column-wrap elementor-element-populated">
                    <div class="elementor-widget-wrap">
                      <div class="elementor-element elementor-element-4fb7241 elementor-widget elementor-widget-dc_element_about_us" data-id="4fb7241" data-element_type="widget" data-widget_type="dc_element_about_us.default">
                        <div class="elementor-widget-container">
                          <div class="sc-about-us dc-haslayout dc-sectionbg dynamic-secton-632596">
                            <div class="container">
                              <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-6 align-self-center">
                                  <div class="dc-bringcarecontent">
                                    <div class="dc-sectionhead dc-sectionheadvtwo">
                                      <div class="dc-sectiontitle">
                                        <h2>Instantly Connect  from Home <span>with Healthcare</span>	in One Click:</h2>
                                      </div>
                                        <div class="dc-description">
                                          <p>Instantly schedule medical appointments online with ease! Say goodbye to long waits and phone calls!our platform simplifies the process, connecting you with healthcare professionals at your convenience. Take charge of your health today!</p>
                                        </div>
                                    </div>
                                    <div class="dc-btnarea">
                                        <a href="#" class="dc-btn">About Us</a>
                                        <a href="#" class="dc-btn dc-btnactive">Contact</a>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                  <div class="dc-bringimg-holder">
                                    <figure class="dc-doccareimg">
                                      <img loading="lazy" width="" height="" src="http://amentotech.com/projects/doctreat/wp-content/uploads/2019/08/img-01-2.png" alt="Greetings &amp; Welcome">																					<figcaption>
                                        <div class="dc-doccarecontent">
                                          <h3><em>Greetings &amp; Welcome</em>To our App!</h3>
                                        </div>
                                      </figcaption>
                                    </figure>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section class="elementor-section elementor-top-section elementor-element elementor-section-boxed elementor-section-height-default elementor-section-height-default mb-5 ">
              <div class="elementor-container elementor-column-gap-no">
                <div class="elementor-row">
                  <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-0769641" ²>
                    <div class="elementor-column-wrap elementor-element-populated">
                      <div class="elementor-widget-wrap">
                        <div class="elementor-element elementor-element-7f8ad4b elementor-widget elementor-widget-dc_element_working_process" data-id="7f8ad4b" data-element_type="widget" data-widget_type="dc_element_working_process.default">
                          <div class="elementor-widget-container">
                            <div class="dc-sc-how-it-work dc-haslayout dynamic-secton-319264">
                              <div class="dc-haslayout dc-workholder" style="">
                                <div class="container">
                                  <div class="row justify-content-center align-self-center">
                                    <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-8 push-lg-2">
                                      <div class="dc-sectionhead dc-text-center">
                                        <div class="dc-sectiontitle">
                                          <h2><span>Simplicity at its Best:</span><em>Discover How It Works?</em></h2>
                                        </div>
                                        <div class="dc-description">
                                          <p>simplicity is our priority. Discover how easy managing your healthcare can be with our intuitive platform. Join us today!"</p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="dc-haslayout dc-workdetails-holder">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                                      <div class="dc-workdetails ">
                                        <div class="dc-workdetail">
                                          <figure><img loading="lazy" width="" height="" src="http://amentotech.com/projects/doctreat/wp-content/uploads/2019/08/img-01-3.png" alt="Search Best Online"></figure>
                                        </div>
                                        <div class="dc-title">
                                          <span>Discover Top</span>
                                            <h3>Online Professional</h3>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                                      <div class="dc-workdetails dc-workdetails-border">
                                        <div class="dc-workdetail">
                                           <figure><img loading="lazy" width="" height="" src="http://amentotech.com/projects/doctreat/wp-content/uploads/2019/08/img-02-4.png" alt="Get Instant"></figure>
                                        </div>
                                        <div class="dc-title">
                                          <span>Secure Immediate</span>
                                          <h3>Appointment</h3>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                                      <div class="dc-workdetails dc-workdetails-bordertwo">
                                        <div class="dc-workdetail">
                                        <figure><img loading="lazy" width="" height="" src="http://amentotech.com/projects/doctreat/wp-content/uploads/2019/08/img-03-3.png" alt="Leave Your"></figure>
                                        </div>
                                        <div class="dc-title">
                                          <span>Leave Your</span>
                                          <h3>Feedback</h3>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <section class="elementor-section elementor-top-section elementor-element elementor-section-boxed elementor-section-height-default elementor-section-height-default mb-5 ">
              <div class="elementor-container elementor-column-gap-no">
                <div class="elementor-row">
                  <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-ed667b0" data-id="ed667b0" data-element_type="column">
                    <div class="elementor-column-wrap elementor-element-populated">
                      <div class="elementor-widget-wrap">
                       <div class="elementor-element elementor-element-8c20aa1 elementor-widget elementor-widget-dc_element_featured_doctors" data-id="8c20aa1" data-element_type="widget" data-widget_type="dc_element_featured_doctors.default">
                         <div class="elementor-widget-container">
                           <div class="dc-haslayout sc-top-reted">
                             <div class="container">
                              <div class="row justify-content-center align-self-center">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 push-lg-2">
                                 <div class="dc-sectionhead dc-text-center">
                                  <div class="dc-sectiontitle">
                                    <h2>
                                    <span>Introducing Our Professional Team</span>Highly Rated <em>Specialists</em></h2>
                                  </div>
                                  <div class="dc-description">
                                    <p>Discover our exceptional team of experts, dedicated to providing you with the highest quality care. Schedule your appointment today!</p></div>
																	</div>
							                  </div>
																<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
							                  	<div class="dc-docfeatured">
							                  		<div class="row">
                                      @php
                                        $medicalTeams = App\Models\MedicalTeam::all(); // Récupérer toutes les équipes médicales depuis le modèle
                                         $pharmacies = App\Models\Pharmacy::all();
                                         $laboratories = App\Models\Laboratory::all();
                                      @endphp
                                   @foreach($medicalTeams as $team)
                                    <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                                      <div class="dc-docpostholder">
                                        <a href="https://amentotech.com/projects/doctreat/doctors/flores-emily/">
                                          <figure class="dc-docpostimg">
                                            <img loading="lazy" class="dc-image-res" src="{{ asset('assets/img/avatars/avatarhel.jpg') }}" alt="healthmed">

                                          </figure>
                                        </a>
                                      <div class="dc-docpostcontent">
                                        <div class="dc-title">
                                          <div class="dc-doc-specilities-tag">
                                            @php
                                                    $serviceCategory =App\Models\ServiceCategory::all();
                                                @endphp
                                       </div>
                                          <h3>
                                            <a href="">{{ $team->FirstName }}&nbsp;{{ $team->LastName }}</a>
                                            @if($team->is_medical_registration_verified)
                                            <i class="icon-sheild dc-awardtooltip dc-tipso fas fa-shield-alt" data-tipso="Medical Registration Verified"></i>
                                            @endif
                                            @if($team->is_verified_user)
                                            <i class="far fa-check-circle dc-awardtooltip dc-tipso" data-tipso="Verified user"></i>
                                            @endif
                                        </h3>
                                        <ul class="dc-docinfo">
                                          <li><em>
                                            @php
                                              // Récupérer le type médical correspondant à l'ID stocké dans $team->type_medical
                                              $medicalType = App\Models\MedicalType::find($team->medical_type_id);
                                          @endphp
                                          @if($medicalType)
                                              {{ $medicalType->name }}
                                          @else
                                              Type médical non défini
                                          @endif</em></li>
                                          <li>
                                            <span class= "dc-stars"><span style="width: 92%;"></span></span><em>{{ $team->nbre_feedbacks }} Feedbacks</em>
                                          </li>
                                        </ul>

                                      </div>
                                        <em class="dc-bold">Mon</em>
                                        <div class="dc-doclocation">
                                          <i class="fas fa-map-marker-alt"></i>&nbsp;{{ $team->address_complete }}</span>
                                          <span><i class="far fa-calendar-check"></i>
                                          <em class="dc-available">Available Today</em>
                                          </span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                @endforeach
                                <div class="col-12">
                                  <div class="dc-btnarea">
                                    <a href="{{ route('laboratories') }}" class="dc-btn">Show All</a>
                                  </div>
                                </div>
                              <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="dc-docfeatured">
                                  <div class="row">
                                    @foreach($pharmacies as $pharmacy)
                            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                                <div class="dc-docpostholder">
                                    <a href="{{ $pharmacy->url }}">
                                        <figure class="dc-docpostimg">
                                            <img loading="lazy" class="dc-image-res" src="{{ asset('assets/img/avatars/avatarhel.jpg') }}" alt="healthmed">
                                        </figure>
                                    </a>
                                    <div class="dc-docpostcontent">
                                        <div class="dc-title">
                                            <h3>{{ $pharmacy->name }}</h3>
                                            @if($pharmacy->is_medical_registration_verified)
                                                <i class="icon-sheild dc-awardtooltip dc-tipso fas fa-shield-alt" data-tipso="Medical Registration Verified"></i>
                                            @endif

                                        </div>
                                        <div class="dc-doclocation">
                                            <i class="fas fa-map-marker-alt"></i>&nbsp;{{ $pharmacy->address_complete }}</span>
                                            <span><i class="far fa-calendar-check"></i>
                                            <em class="dc-available">Available Today</em>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-12">
                          <div class="dc-btnarea">
                            <a href="{{ route('pharmacies') }}" class="dc-btn">Show All</a>
                          </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                          <div class="dc-docfeatured">
                            <div class="row">
                              @foreach($laboratories as $laboratory)
                                <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                                  <div class="dc-docpostholder">
                                     <a href="{{ $pharmacy->url }}">
                                      <figure class="dc-docpostimg">
                                      <img loading="lazy" class="dc-image-res" src="{{ asset('assets/img/avatars/avatarhel.jpg') }}" alt="healthmed">
                                      </figure>
                                     </a>
                                      <div class="dc-docpostcontent">
                                       <div class="dc-title">
                                         <h3>{{ $laboratory->name }}</h3>
                                            @if($laboratory->is_medical_registration_verified)
                                            <i class="icon-sheild dc-awardtooltip dc-tipso fas fa-shield-alt" data-tipso="Medical Registration Verified"></i>
                                            @endif

                                       </div>
                                       <div class="dc-doclocation">
                                         <i class="fas fa-map-marker-alt"></i>&nbsp;{{ $laboratory->address_complete }}</span>
                                         <span><i class="far fa-calendar-check"></i>
                                         <em class="dc-available">Available Today</em>
                                         </span>
                                     </div>
                                  </div>
                                </div>
                               </div>
                              @endforeach
                               <div class="col-12">
                                <div class="dc-btnarea">
                                   <a href="{{ route('laboratories') }}" class="dc-btn">Show All</a>
                                 </div>
                                </div>
                               </div>
                              </div>
                             </div>
								      			</div>
				                  </div>
			                  </div>
		              		</div>
			            	</div>
				      		</div>
				      	</div>
	          	</div>
						</div>
					</div>
		    </section>
				<section class="elementor-section elementor-top-section elementor-element elementor-section-boxed elementor-section-height-default elementor-section-height-default mb-5 ">
					<div class="elementor-container elementor-column-gap-no">
						<div class="elementor-row">
				    	<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-408a983" data-id="408a983" data-element_type="column">
			          <div class="elementor-column-wrap elementor-element-populated">
						    	<div class="elementor-widget-wrap">
						        <div class="elementor-element elementor-element-5c93bc3 elementor-widget elementor-widget-dc_element_download_app" data-id="5c93bc3" data-element_type="widget" data-widget_type="dc_element_download_app.default">
			              	<div class="elementor-widget-container">
				            		<div class="dc-haslayout dc-bgcolor">
			                  	<div class="container">
									      		<div class="row">
															<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
								              	<div class="dc-appbgimg">
									              	<figure>
									              		<img loading="lazy" width="" height="" src="http://amentotech.com/projects/doctreat/wp-content/uploads/2019/08/img-01-4.png" alt="APP">
									              	</figure>
									              </div>
								              </div>
														<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 justify-content-center align-self-center">
									            <div class="dc-appcontent">
									            	<div class="dc-sectionhead dc-sectionheadvtwo">
																	<div class="dc-sectiontitle">
												          	<h2>Access Care Anywhere<span>Download Mobile App</span></h2>
												          </div>
																	<div class="dc-description">
												          	<p>Take control of your healthcare with our convenient mobile app. With just a few taps, you can schedule appointments from anywhere, anytime.</p>
                                  </div>
																</div>
																	<ul class="dc-appicons">
																		<li>
															      	<a target="_blank" href="#">
																				<figure><img loading="lazy" width="" height="" src="http://amentotech.com/projects/doctreat/wp-content/uploads/2019/08/img-03.png" alt="Logo"></figure>
																			</a>
														      	</li>
																		<li>
															      	<a target="_blank" href="#">
																			  <figure><img loading="lazy" width="" height="" src="http://amentotech.com/projects/doctreat/wp-content/uploads/2019/08/img-02.png" alt="Logo"></figure>
																			</a>
															      </li>
																	</ul>
															</div>
								            </div>
													</div>
									      </div>
		                	</div>
		            		</div>
			          	</div>
					    	</div>
					    </div>
		        </div>
					</div>
				</div>
		  </section>
			<section class="elementor-section elementor-top-section elementor-element elementor-section-boxed elementor-section-height-default elementor-section-height-default mb-5 ">
				<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-row">
					  <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-e779799" >
		        	<div class="elementor-column-wrap elementor-element-populated">
						  	<div class="elementor-widget-wrap">
	      					<div class="elementor-element elementor-element-7625199 elementor-widget elementor-widget-dc_element_latest_articles" >
				            <div class="elementor-widget-container">
						          <div class="dc-sc-latest-articals dc-haslayout">
			                	<div class="container">
					                <div class="row justify-content-center align-self-center">
													  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 push-lg-2">
								              <div class="dc-sectionhead dc-text-center">
																<div class="dc-sectiontitle">
											            <h2><span>Explore</span>Professional<em>Articles</em>Insights: Latest Articles</h2>
								            		</div>
																<div class="dc-description">
                                  <p>Stay informed and enlightened with our newest collection of professional articles. Delve into a world of valuable insights, tips, and trends curated by our experts. Explore now and enrich your understanding of healthcare</p>
                                </div>
															</div>
                            </div>
														<div class="dc-articlesholder">
															<div class="col-12 col-sm-12 col-md-6 col-lg-4 float-left">
									            	<div class="dc-article">
                                    <figure class="dc-articleimg">
                                      <img loading="lazy" width="" height="" src="https://amentotech.com/projects/doctreat/wp-content/uploads/2019/09/012-545x389.jpg" alt="Alcohol may be less harmful for people over 50">
                                      <figcaption>
                                        <div class="dc-articlesdocinfo">
                                        <img src="https://amentotech.com/projects/doctreat/wp-content/uploads/2019/11/11-30x30.jpg" alt="Ralph Davis">
                                          <span>Ralph Davis</span>
                                        </div>
		                          	      </figcaption>
												          	</figure>
										            	<div class="dc-articlecontent">
										              	<div class="dc-title">
												              <a href="https://amentotech.com/projects/doctreat/category/diagnostic-radiology/" rel="tag">Diagnostic radiology</a>
                                      <h3><a href="https://amentotech.com/projects/doctreat/alcohol-may-be-less-harmful-for-people-over-50/">Alcohol may be less harmful for people over 50</a></h3>
														        	<span class="dc-datetime"><i class="lnr lnr-clock"></i> September 13, 2019</span>
														        </div>
															      <ul class="dc-moreoptions">
                                      <li class="dcget-likes" data-key="642"><a href="javascript:;"><i class="ti-heart"></i>66 Likes</a></li>
                                      <li><a href="javascript:;"><i class="ti-eye"></i>4613 Views</a></li>
                                      <li><a href="javascript:;"><i class="ti-comment"></i>7 Comments</a></li>
                                    </ul>
											          	</div>
							            			</div>
								            	</div>
																<div class="col-12 col-sm-12 col-md-6 col-lg-4 float-left">
								              		<div class="dc-article">
                                      <figure class="dc-articleimg">
                                        <img loading="lazy" width="" height="" src="https://amentotech.com/projects/doctreat/wp-content/uploads/2019/09/Untitled-1_0007_Layer-1-545x389.jpg" alt="Study reveals fiber we should eat to prevent disease">
                                        <figcaption>
                                          <div class="dc-articlesdocinfo">
                                            <img src="https://amentotech.com/projects/doctreat/wp-content/uploads/2019/11/04-30x30.jpg" alt="Harriso Robinson">
                                            <span>Harriso Robinson</span>
                                          </div>
                                      </figcaption>
                                      </figure>
										            	  <div class="dc-articlecontent">
												              <div class="dc-title">
                                        <a href="https://amentotech.com/projects/doctreat/category/dermatology/" rel="tag">Dermatology</a>
                                        <h3><a href="https://amentotech.com/projects/doctreat/study-reveals-how-much-fiber-we-should-eat-to-prevent-disease/">Study reveals fiber we should eat to prevent disease</a></h3>
                                        <span class="dc-datetime"><i class="lnr lnr-clock"></i> September 13, 2019</span>
													          	</div>
													        		<ul class="dc-moreoptions">
                                        <li class="dcget-likes" data-key="630"><a href="javascript:;"><i class="ti-heart"></i>42 Likes</a></li>
                                        <li><a href="javascript:;"><i class="ti-eye"></i>1928 Views</a></li>
                                        <li><a href="javascript:;"><i class="ti-comment"></i>8 Comments</a></li>
		                                	</ul>
													          </div>
									              	</div>
								              	</div>
																<div class="col-12 col-sm-12 col-md-6 col-lg-4 float-left">
									              	<div class="dc-article">
										                	<figure class="dc-articleimg">
																				<img loading="lazy" width="" height="" src="https://amentotech.com/projects/doctreat/wp-content/uploads/2019/09/Untitled-1_0006_Layer-2-545x389.jpg" alt="These common drugs may increase dementia risk">
																				<figcaption>
				                                  <div class="dc-articlesdocinfo">
										                    	  <img src="https://amentotech.com/projects/doctreat/wp-content/uploads/2019/11/24-30x30.jpg" alt="Sarah Chapman">
									                    	    <span>Sarah Chapman</span>
                                         </div>
		                                	  </figcaption>
												            	</figure>
                                    <div class="dc-articlecontent">
                                      <div class="dc-title">
                                        <a href="https://amentotech.com/projects/doctreat/category/diagnostic-radiology/" rel="tag">Diagnostic radiology</a>
                                        <h3><a href="https://amentotech.com/projects/doctreat/these-common-drugs-may-increase-dementia-risk/">These common drugs may increase dementia risk</a></h3>
															        	<span class="dc-datetime"><i class="lnr lnr-clock"></i> September 13, 2019</span>
													          	</div>
														        	<ul class="dc-moreoptions">
                                         <li class="dcget-likes" data-key="629"><a href="javascript:;"><i class="ti-heart"></i>29 Likes</a></li>
                                         <li><a href="javascript:;"><i class="ti-eye"></i>1421 Views</a></li>
                                         <li><a href="javascript:;"><i class="ti-comment"></i>0 Comments</a></li>
                                      </ul>
													          </div>
									              	</div>
									              </div>
															</div>
											      </div>
			                  	</div>
	                  		</div>
				              </div>
				            </div>
					      	</div>
					      </div>
		          </div>
						</div>
					</div>
	    	</section>

				</div>
			</div>
		</div>
  </main>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var showAllLinks = document.querySelectorAll(".dc-btn[data-target]");
      showAllLinks.forEach(function(link) {
        link.addEventListener("click", function(event) {
          event.preventDefault();
          var targetSelector = this.getAttribute("data-target");
          var targetSection = document.querySelector(targetSelector);
          if (targetSection) {
            targetSection.classList.toggle("show");
          }
        });
      });
    });
    </script>



@endsection











































<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<link rel='stylesheet' id='doctreat-style-css'  href='https://amentotech.com/projects/doctreat/wp-content/themes/doctreat/style.css?ver=1.5.9' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-icons-css'  href='https://amentotech.com/projects/doctreat/wp-content/plugins/elementor/assets/lib/eicons/css/elementor-icons.min.css?ver=5.18.0' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-frontend-legacy-css'  href='https://amentotech.com/projects/doctreat/wp-content/plugins/elementor/assets/css/frontend-legacy.min.css?ver=3.12.1' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-frontend-css'  href='https://amentotech.com/projects/doctreat/wp-content/plugins/elementor/assets/css/frontend.min.css?ver=3.12.1' type='text/css' media='all' />
<link rel='stylesheet' id='swiper-css'  href='https://amentotech.com/projects/doctreat/wp-content/plugins/elementor/assets/lib/swiper/css/swiper.min.css?ver=5.3.6' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-global-css'  href='https://amentotech.com/projects/doctreat/wp-content/uploads/elementor/css/global.css?ver=1579266764' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-post-77-css'  href='https://amentotech.com/projects/doctreat/wp-content/uploads/elementor/css/post-77.css?ver=1597315431' type='text/css' media='all' />
<link rel='stylesheet' id='linearicons-css'  href='https://amentotech.com/projects/doctreat/wp-content/themes/doctreat/css/linearicons.css?ver=1.5.9' type='text/css' media='all' />
<link rel='stylesheet' id='e-animations-css'  href='https://amentotech.com/projects/doctreat/wp-content/plugins/elementor/assets/lib/animations/animations.min.css?ver=3.12.1' type='text/css' media='all' />
<style>
/* Utilisation de Flexbox pour aligner les éléments sur la même ligne */
.doctorslider {
  display: flex;
  flex-wrap: nowrap; /* Empêcher le retour à la ligne */
}

/* Ajustement de la largeur des éléments */
.doctorslider .item {
  flex: 0 0 20%; /* Diviser la largeur en 5 colonnes */
}
.dc-hidden-section {
  display: none;
}

.dc-hidden-section.show {
  display: block;
}

</style>
</head>
<body>
@php
$laboratories = App\Models\Laboratory::all();
@endphp
<section class="elementor-section elementor-top-section elementor-element elementor-section-boxed elementor-section-height-default elementor-section-height-default ">
  <div class="doctorslider ">
    <div class=" item dc-doctordetails-holder dc-titlecolor1">
      <span class="dc-slidercounter">
        <img loading="lazy" width="" height="" src="" alt="">
      </span>
      <h3>
        <span>Looking for</span> pharmacies
      </h3>
      <a href="#" class="dc-btn" data-target=".dc-hidden-section">Show All Nearest Pharmacies</a>
    </div>
    <div class=" item dc-doctordetails-holder dc-titlecolor2">
      <span class="dc-slidercounter">
        <img loading="lazy" width="" height="" src="http://amentotech.com/projects/doctreat/wp-content/uploads/2019/10/2.png" alt="links">
      </span>
      <h3>
        <span>Looking For </span> Heathcare specialist
      </h3>
      <a href="#" class="dc-btn" data-target=".dc-hidden-section">Show All Nearest Heathcare specialist</a>
    </div>
    <div class=" item dc-doctordetails-holder dc-titlecolor3">
      <span class="dc-slidercounter">
        <img loading="lazy" width="" height="" src="http://amentotech.com/projects/doctreat/wp-content/uploads/2019/10/1.png" alt="links">
      </span>
      <h3>
        <span>Need Assistance?</span> Here to Help.
      </h3>
      <a href="#" class="dc-btn" data-target=".dc-hidden-section">Discover now !</a>
    </div>
    <div class=" item dc-doctordetails-holder dc-titlecolor4">
      <span class="dc-slidercounter">
        <img loading="lazy" width="" height="" src="http://amentotech.com/projects/doctreat/wp-content/uploads/2019/10/4.png" alt="links">
      </span>
      <h3>
        <span>Everything </span> you need is here
      </h3>
      <a href="#" class="dc-btn" data-target=".dc-hidden-section">Show All Nearest Laboratories</a>
    </div>
    <div class=" item dc-doctordetails-holder dc-titlecolor5">
      <span class="dc-slidercounter">
        <img loading="lazy" width="" height="" src="http://amentotech.com/projects/doctreat/wp-content/uploads/2019/10/5.png" alt="links">
      </span>
      <h3>
        <span>Help on The Go</span> Download App
      </h3>
      <a href="#" class="dc-btn" data-target=".dc-hidden-section">click here</a>
    </div>
  </div>
</section>
<div class="elementor-container elementor-column-gap-no dc-hidden-section">
  <div class="elementor-row">
    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-ed667b0" >
      <div class="elementor-column-wrap elementor-element-populated">
        <div class="elementor-widget-wrap">
          <div class="elementor-element elementor-element-8c20aa1 elementor-widget elementor-widget-dc_element_featured_doctors" >
            <div class="elementor-widget-container">
              <div class="dc-haslayout sc-top-reted">
                <div class="container">
                  <div class="row justify-content-center align-self-center">
                    @foreach($laboratories as $laboratory)
                      <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                        <div class="dc-docfeatured">
                          <div class="dc-docpostholder">
                            <a href="{{ $laboratory->url }}">
                              <figure class="dc-docpostimg">
                                <img loading="lazy" class="dc-image-res" src="{{ asset('assets/img/avatars/avatarhel.jpg') }}" alt="healthmed">
                              </figure>
                            </a>
                            <div class="dc-docpostcontent">
                              <div class="dc-title">
                                <h3>{{ $laboratory->name }}</h3>
                                @if($laboratory->is_medical_registration_verified)
                                  <i class="icon-sheild dc-awardtooltip dc-tipso fas fa-shield-alt" data-tipso="Medical Registration Verified"></i>
                                @endif
                              </div>
                              <div class="dc-doclocation">
                                <i class="fas fa-map-marker-alt"></i>&nbsp;{{ $laboratory->address_complete }}
                                <span>
                                  <i class="far fa-calendar-check"></i>
                                  <em class="dc-available">Available Today</em>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  </div>
                  <div class="col-12">
                    <div class="dc-btnarea">
                      <a href="{{ route('laboratories') }}" class="dc-btn">Show All</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
  var showAllLinks = document.querySelectorAll(".dc-btn[data-target]");
  showAllLinks.forEach(function(link) {
    link.addEventListener("click", function(event) {
      event.preventDefault();
      var targetSelector = this.getAttribute("data-target");
      var targetSection = document.querySelector(targetSelector);
      if (targetSection) {
        targetSection.classList.toggle("show");
      }
    });
  });
});
</script>
</body>
</html>







































 