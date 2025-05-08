@extends('HomepageLayout.app')
@section('content')

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.default.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></scrip>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>


<style>
.doctorslider {
    display: flex;
    flex-wrap: nowrap;
  }

  .doctorslider .item {
    flex: 0 0 20%;
  }
  .custom-menu {
    display: none;
    position: absolute;
    z-index: 1000;
    padding: 0.5rem 0;
    margin: 0;
    list-style: none;
    background-color: #dc1313;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

.custom-menu li {
    padding: 0.5rem 1rem;
    cursor: pointer;
}

.custom-menu li:hover {
    background-color: #f0f0f0;
}


.blue-background {
    background-color: #e5f6fe; /* Light blue color */
    padding: 50px 0;
    margin: 0 auto;
    width: 100%; /* Adjust the width as needed */
    border-radius: 10px; /* Optional: for rounded corners */
}
.blue-backg {
    background-color: #e5f6fe; /* Light blue color */
    padding: 0px 0;
    margin: 0 auto;
    width: 100%; /* Adjust the width as needed */
    border-radius: 10px; /* Optional: for rounded corners */
}
.dc-ratedecontent,
.dc-docpostholder {
    margin-bottom: 20px; /* Space between the cards */
    padding: 20px; /* Padding inside the cards */
    border: 1px solid #e5e5e5; /* Border around the cards */
    border-radius: 10px; /* Optional: for rounded corners */
    background-color: #ffffff; /* Background color for the cards */
}

.dc-sectionhead,
.dc-docpostcontent {
    margin-top: 20px; /* Space inside the content */
}

.dc-docpostimg {
    width: 200px; /* Adjust the width as desired */
    height: 165px; /* Set the desired fixed height */
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
}

.dc-docpostimg img {
    width: auto; /* Ensure the width adapts while maintaining the aspect ratio */
    height: 100%; /* Maintain the set height */
    display: block; /* Removes the bottom white space of the image */
}




.dc-btnarea {
    margin-top: 20px; /* Space above the button area */
    text-align: center; /* Center align the button */
}

.dc-doclocation {
    margin-top: 15px; /* Space above the location info */
}

.dc-sectiontitle h2 {
    font-size: 24px; /* Adjust as needed */
}

.dc-description p {
    font-size: 16px; /* Adjust as needed */
}

.dc-docinfo li {
    margin-bottom: 5px; /* Space between list items */
}

.dc-doclocation span {
    display: block; /* Ensure each location item is on a new line */
    margin-bottom: 5px; /* Space between location items */
}

.dc-docpostholder {
    text-align: center; /* Center align the content within the cards */
}

.dc-docstatus,
.dc-title h3 a {
    color: #2a7be4; /* Ensure link colors are prominent */
    text-decoration: none;
}

.dc-docstatus:hover,
.dc-title h3 a:hover {
    text-decoration: underline;
}


.owl-item{
  width: 35%;
  padding-left:10px;
}

</style>

  <main id="dc-main" class="dc-main dc-haslayout" style="
    max-width: 99%;padding: 0px 0; padding-top:140px;
">
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
		    		<section class="elementor-section elementor-top-section elementor-element elementor-element-4d916c7 elementor-section-boxed elementor-section-height-default elementor-section-height-default  mb-9"  style="margin-top: -87px">

					  	<div class="elementor-container elementor-column-gap-no">
							  <div class="elementor-row">
				        	<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-1f8daed" data-id="1f8daed" data-element_type="column">
			              <div class="elementor-column-wrap elementor-element-populated">
				        			<div class="elementor-widget-wrap">
				            		<div class="elementor-element elementor-element-2c02a01 elementor-widget elementor-widget-dc_element_search_form" data-id="2c02a01" data-element_type="widget" data-widget_type="dc_element_search_form.default">
			                  	<div class="elementor-widget-container">
			                			<div class="dc-haslayout dc-section-180876 ">
                              <div class="dc-searchform-holder" style="
    padding-left: 55px;
    padding-top: 10px;
        height: 209px;

">
                                  <div class="dc-advancedsearch">
                                      <div class="title" style="
    padding-top: 21px;
">
                                          <h2>Start Your Search</h2>
                                      </div>
                                      <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        fieldset {
            border: 1px solid #e0e0e0;
            padding: 30px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .chosen-select,
        .form-control {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            background-color: #fff;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: border-color 0.3s, box-shadow 0.3s;
            appearance: none;
        }

        .chosen-select:focus,
        .form-control:focus {
            border-color: #80bdff;
            box-shadow: 0 0 5px rgba(128, 189, 255, 0.5);
            outline: none;
        }

        .dc-formbtn {
            text-align: center;
        }

        .dc-serach-form {
            padding: 12px 25px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s, box-shadow 0.3s;
            display: inline-flex;
            align-items: center;
            text-decoration: none;
        }

        .dc-serach-form:hover {
            background-color: #0056b3;
            box-shadow: 0 4px 10px rgba(0, 91, 187, 0.2);
        }

        .dc-serach-form i {
            margin-right: 8px;
        }
    </style>

    <form class="dc-formtheme dc-form-advancedsearch" action="" method="get" id="search_form">
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
            <div class="dc-formbtn  ">
                <button type="submit" class="dc-serach-form  " value="Search" onclick="updateFormAction()"><i class="fas fa-search"></i><span>&nbsp;Search now</span></button>
            </div>
        </fieldset>
    </form>


    </div>
										        	<div class="dc-jointeamholder" style="
    margin-top: -11px;
">
					                  		<div class="dc-jointeam" style="
    height: 209px;
">
																	<figure class="dc-jointeamimg">
									                	<img loading="lazy" width="" height="" src="http://amentotech.com/projects/doctreat/wp-content/uploads/2019/08/img-04-1.png" alt="img description">
								                	</figure>
                                      <div class="dc-jointeamcontent">
                                            <h3>
                                              <span>Are You A Healthcare </span> Specialist?</h3>
                                              <a href="{{ route('inscription.formulaire') }}" class="dc-btn dc-btnactive">Join Now</a>
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

          <section class="elementor-section elementor-top-section elementor-element elementor-section-boxed elementor-section-height-default elementor-section-height-default">
    <div class="doctorslider">
        @php
            $doctorType = $medicalTypes->firstWhere('name', 'docteur');
            $nurseType = $medicalTypes->firstWhere('name', 'infirmier');
            $massageType = $medicalTypes->firstWhere('name', 'kinésithérapeute');
            $careGiverType = $medicalTypes->firstWhere('name', 'soignant');
            $midwifeType = $medicalTypes->firstWhere('name', 'sage femme');
        @endphp

        <div class="item dc-doctordetails-holder dc-titlecolor1">
    <span class="dc-slidercounter">
        <img loading="lazy" width="" height="" src="" alt="">
    </span>
    <h3>
        <span>Looking for</span> Doctors
    </h3>
    <a href="#" class="dc-btn dc-btn-1" id="showDoctorsBtn" data-id="m-{{ $doctorType->id ?? '' }}">Show All Nearest Doctors</a>
</div>
<div class="item dc-doctordetails-holder dc-titlecolor4">
    <span class="dc-slidercounter">
        <img loading="lazy" width="" height="" src="http://amentotech.com/projects/doctreat/wp-content/uploads/2019/10/4.png" alt="links">
    </span>
    <h3>
        <span>Looking for </span> nurses
    </h3>
    <a href="#" class="dc-btn dc-btn-1" id="showNursesBtn" data-id="m-{{ $nurseType->id ?? '' }}">Show All Nearest nurses</a>
</div>
<div class="item dc-doctordetails-holder dc-titlecolor2">
    <span class="dc-slidercounter">
        <img loading="lazy" width="" height="" src="http://amentotech.com/projects/doctreat/wp-content/uploads/2019/10/2.png" alt="links">
    </span>
    <h3>
        <span>Looking For </span> Massage specialist
    </h3>
    <a href="#" class="dc-btn dc-btn-1" id="showMassageSpecialistsBtn" data-id="m-{{ $massageType->id ?? '' }}">Show Nearest Specialists</a>
</div>
<div class="item dc-doctordetails-holder dc-titlecolor3">
    <span class="dc-slidercounter">
        <img loading="lazy" width="" height="" src="http://amentotech.com/projects/doctreat/wp-content/uploads/2019/10/2.png" alt="links">
    </span>
    <h3>
        <span>Looking For </span> Care Giver
    </h3>
    <a href="#" class="dc-btn dc-btn-1" id="showCareGiversBtn" data-id="m-{{ $careGiverType->id ?? '' }}">Show Nearest Caregivers</a>
</div>
<div class="item dc-doctordetails-holder dc-titlecolor3">
    <span class="dc-slidercounter">
        <img loading="lazy" width="" height="" src="http://amentotech.com/projects/doctreat/wp-content/uploads/2019/10/2.png" alt="links">
    </span>
    <h3>
        <span>Looking For </span> Midwife
    </h3>
    <a href="#" class="dc-btn dc-btn-1" id="showMidwivesBtn" data-id="m-{{ $midwifeType->id ?? '' }}">Show Nearest Midwives</a>
</div>
</section>

<script>
    document.querySelectorAll('.dc-btn.dc-btn-1').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const categorie = this.getAttribute('data-id');
            const location = ''; // Assuming location is not required here

            let url = '/';
            if (categorie) {
              url += `${categorie}?search_category=${categorie}`;
            }
            // If there was a location, you could add it here:
            // if (location) {
            //     url += '/' + location;
            // }

            window.location.href = url;
        });
    });
</script>



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
                              <div class="row" >
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

          <section class="elementor-section elementor-top-section elementor-element elementor-section-boxed elementor-section-height-default elementor-section-height-default mb-5 blue-background" id="hit">
    <div class="elementor-container elementor-column-gap-no">
        <div class="elementor-row">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-0769641">
                <div class="elementor-column-wrap elementor-element-populated">
                    <div class="elementor-widget-wrap">
                        <div class="elementor-element elementor-element-7f8ad4b elementor-widget elementor-widget-dc_element_working_process" data-id="7f8ad4b" data-element_type="widget" data-widget_type="dc_element_working_process.default">
                            <div class="elementor-widget-container">
                                <div class="dc-sc-how-it-work dc-haslayout dynamic-secton-319264">
                                    <div class="dc-haslayout dc-workholder">
                                        <div class="container">
                                            <div class="row justify-content-center align-self-center">
                                                <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-8 push-lg-2">
                                                    <div class="dc-sectionhead dc-text-center">
                                                        <div class="dc-sectiontitle">
                                                            <h2><span>Simplicity at its Best:</span><em>Discover How It Works?</em></h2>
                                                        </div>
                                                        <div class="dc-description">
                                                            <p>Simplicity is our priority. Discover how easy managing your healthcare can be with our intuitive platform. Join us today!</p>
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
                                                    <div class="dc-workdetails">
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
<section class="elementor-section elementor-top-section elementor-element elementor-section-boxed elementor-section-height-default elementor-section-height-default mb-5">
    <div class="container-fluid" style="    width: 99.2104%;">
        <div class="row" style="width: 98%;">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
                <div class="dc-ratedecontent " style="width: 112%;height: 98%;">
                    <figure class="dc-neurosurgeons-img">
                        <img src="{{ asset('assets/images/haut.png') }}" alt=" Icon" class="mb-2" style="width: 90px;margin-top:102px;">
                    </figure>
                    <div class="dc-sectionhead dc-sectionheadvtwo dc-text-center">
                        <div class="dc-sectiontitle">
                            <h2>Our Top Rated<span>Doctors</span></h2>
                        </div>
                        <div class="dc-description">
                            <p>We made a perfect selection of our best doctors specially for you </p>
                        </div>
                    </div>
                    <div class="dc-btnarea">
                        <a href="javascript:void(0);" class="dc-btn" id="view-all-btn">View All</a>
                        <a href="javascript:void(0);" class="dc-btn" id="view-less-btn" style="display: none;">View Less</a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
                @if($doctors->isEmpty())
                    <p>No doctors selected for the moment.</p>
                @else
                    <div id="doctor-cards-container">
                        @foreach($doctors as $doctor)
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 doctor-card" style="display: none;">
                            <div class="dc-docpostholder">
                                <figure class="dc-docpostimg">
                                    <img src="{{ asset($doctor->image_url) }}" class="dc-docpostimg" alt=" Icon" style="width: 200px; align-content: center;">
                                </figure>
                                <div class="dc-docpostcontent">
                                    <a href="javascript:void(0);" class="dc-like"><i class="fa fa-heart"></i></a>
                                    <div class="dc-title">
                                        <h3><a href="javascript:void(0);">{{ $doctor->name }}</a>
                                            <i class="fa fa-award dc-awardtooltip"><em>Medical Registration Verified</em></i>
                                            <i class="fa fa-check-circle dc-awardtooltip"><em>Medical Registration Verified</em></i>
                                        </h3>
                                        <ul class="dc-docinfo">
                                            <li>
                                                <em>{{ $doctor->gender }}</em>
                                            </li>
                                            <li>
                                                <span class="dc-stars" style="margin-left:40px;"><span></span></span>
                                                <span><em> <br><br>   {{ $doctor->feedback_count }} Feedback</em></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="dc-doclocation">
                                        <span><i class="ti-direction-alt"></i> {{ $doctor->location }}</span>
                                        <span><i class="ti-calendar"></i> <em class="dc-dayon">Mo</em>, Tu, We, Th, Fr, Sa</span>
                                        <a href="javascript:void(0);" class="dc-btn">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>



                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<style>
#doctor-cards-container {
    display: flex;
    flex-wrap: wrap;
}

.doctor-card {
    display: none; /* Hide all cards by default */
}

.dc-btnarea {
    text-align: center;
    margin-top: 20px;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const viewAllBtn = document.getElementById('view-all-btn');
    const viewLessBtn = document.getElementById('view-less-btn');
    const doctorCards = document.querySelectorAll('.doctor-card');
    let currentlyVisible = 0;
    const visibleIncrement = 4;

    function showNextSetOfCards() {
        for (let i = currentlyVisible; i < currentlyVisible + visibleIncrement && i < doctorCards.length; i++) {
            doctorCards[i].style.display = 'block';
        }
        currentlyVisible += visibleIncrement;

        // Hide the "View All" button if all cards are visible
        if (currentlyVisible >= doctorCards.length && currentlyVisible>4 ) {
            viewAllBtn.style.display = 'none';


        // Show the "View Less" button
        viewLessBtn.style.display = 'inline-block';}
    }

    function showInitialSetOfCards() {
        for (let i = 0; i < currentlyVisible; i++) {
            doctorCards[i].style.display = 'none';
        }
        currentlyVisible = 4;
        for (let i = 0; i < currentlyVisible; i++) {
            doctorCards[i].style.display = 'block';
        }

        // Show the "View All" button
        viewAllBtn.style.display = 'inline-block';

        // Hide the "View Less" button
        viewLessBtn.style.display = 'none';
    }

    // Initially show the first set of cards
    showNextSetOfCards();

    // Add event listeners to the buttons
    viewAllBtn.addEventListener('click', showNextSetOfCards);
    viewLessBtn.addEventListener('click', showInitialSetOfCards);
});


</script>




				<section class="elementor-section elementor-top-section elementor-element elementor-section-boxed elementor-section-height-default elementor-section-height-default mb-5 blue-backg">
					<div class="elementor-container elementor-column-gap-no blue-backg">
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
		</div>
	</div>
</div>
</main>
<script>






</script>
@endsection
