<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Site keywords here">
    <meta name="description" content="">
    <meta name='copyright' content=''>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>@yield('title', 'Mediplus - Medical Template')</title>
	

    <link rel="icon" href="{{ asset('assets/img/mediplus/favicon.png') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icofont.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl-carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
		
    </head>
    <body>
	
		
		<!-- Get Pro Button -->
		<ul class="pro-features">
			<a class="get-pro" href="#">Get Pro</a>
			<li class="big-title">Pro Version Available on Themeforest</li>
			<li class="title">Pro Version Features</li>
			<li>2+ premade home pages</li>
			<li>20+ html pages</li>
			<li>Color Plate With 12+ Colors</li>
			<li>Sticky Header / Sticky Filters</li>
			<li>Working Contact Form With Google Map</li>
			<div class="button">
				<a href="http://preview.themeforest.net/item/mediplus-medical-and-doctor-html-template/full_screen_preview/26665910?_ga=2.145092285.888558928.1591971968-344530658.1588061879" target="_blank" class="btn">Pro Version Demo</a>
				<a href="https://themeforest.net/item/mediplus-medical-and-doctor-html-template/26665910" target="_blank" class="btn">Buy Pro Version</a>
			</div>
		</ul>
	
		<!-- Header Area -->
		<header class="header" >
			<!-- Topbar -->
			<div class="topbar">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-5 col-12">
							<!-- Contact -->
							<ul class="top-link">
								<li><a href="#">About</a></li>
								<li><a href="#">Doctors</a></li>
								<li><a href="#">Contact</a></li>
								<li><a href="#">FAQ</a></li>
							</ul>
							<!-- End Contact -->
						</div>
						<div class="col-lg-6 col-md-7 col-12">
							<!-- Top Contact -->
							<ul class="top-contact">
								<li><i class="fa fa-phone"></i>+880 1234 56789</li>
								<li><i class="fa fa-envelope"></i><a href="mailto:support@yourmail.com">support@yourmail.com</a></li>
							</ul>
							<!-- End Top Contact -->
						</div>
					</div>
				</div>
			</div>
			<!-- End Topbar -->
			<!-- Header Inner -->
			<div class="header-inner">
				<div class="container">
					<div class="inner">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-12">
								<!-- Start Logo -->
								<div class="logo">
                                <a href="{{ url('/mediplus') }}">
                               <img src="{{ asset('assets/img/mediplus/logo.png') }}" alt="Mediplus Logo">
                                 </a>

								</div>
								<!-- End Logo -->
								<!-- Mobile Nav -->
								<div class="mobile-nav"></div>
								<!-- End Mobile Nav -->
							</div>
							<div class="col-lg-7 col-md-9 col-12">
								<!-- Main Menu -->
								<div class="main-menu">
									<nav class="navigation">
										<ul class="nav menu">
											<li class="active"><a href="#">Home <i class="icofont-rounded-down"></i></a>
												<ul class="dropdown">
													<li><a href="{{ url('/mediplus') }}">Home Page 1</a>													</li>
												</ul>
											</li>
											<li><a href="#">Doctos </a></li>
											<li><a href="#">Services </a></li>
											<li><a href="#">Pages <i class="icofont-rounded-down"></i></a>
												<ul class="dropdown">
													<li><a href="404.html">404 Error</a></li>
												</ul>
											</li>
											<li><a href="#">Blogs <i class="icofont-rounded-down"></i></a>
												<ul class="dropdown">
													<li><a href="blog-single.html">Blog Details</a></li>
												</ul>
											</li>
											<li><a href="contact.html">Contact Us</a></li>
										</ul>
									</nav>
								</div>
								<!--/ End Main Menu -->
							</div>
							<div class="col-lg-2 col-12">
								<div class="get-quote">
								<a href="{{ route('appointments.step1') }}" class="btn">Book Appointment</a>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Header Inner -->
		</header>
		<!-- End Header Area -->
		
		
		
<!-- jquery Min JS -->
<script src="{{ asset('assets/js/mediplus/jquery.min.js') }}"></script>
<!-- jquery Migrate JS -->
<script src="{{ asset('assets/js/mediplus/jquery-migrate-3.0.0.js') }}"></script>
<!-- jquery Ui JS -->
<script src="{{ asset('assets/js/mediplus/jquery-ui.min.js') }}"></script>
<!-- Easing JS -->
<script src="{{ asset('assets/js/mediplus/easing.js') }}"></script>
<!-- Color JS -->
<script src="{{ asset('assets/js/mediplus/colors.js') }}"></script>
<!-- Popper JS -->
<script src="{{ asset('assets/js/mediplus/popper.min.js') }}"></script>
<!-- Bootstrap Datepicker JS -->
<script src="{{ asset('assets/js/mediplus/bootstrap-datepicker.js') }}"></script>
<!-- Jquery Nav JS -->
<script src="{{ asset('assets/js/mediplus/jquery.nav.js') }}"></script>
<!-- Slicknav JS -->
<script src="{{ asset('assets/js/mediplus/slicknav.min.js') }}"></script>
<!-- ScrollUp JS -->
<script src="{{ asset('assets/js/mediplus/jquery.scrollUp.min.js') }}"></script>
<!-- Niceselect JS -->
<script src="{{ asset('assets/js/mediplus/niceselect.js') }}"></script>
<!-- Tilt Jquery JS -->
<script src="{{ asset('assets/js/mediplus/tilt.jquery.min.js') }}"></script>
<!-- Owl Carousel JS -->
<script src="{{ asset('assets/js/mediplus/owl-carousel.js') }}"></script>
<!-- counterup JS -->
<script src="{{ asset('assets/js/mediplus/jquery.counterup.min.js') }}"></script>
<!-- Steller JS -->
<script src="{{ asset('assets/js/mediplus/steller.js') }}"></script>
<!-- Wow JS -->
<script src="{{ asset('assets/js/mediplus/wow.min.js') }}"></script>
<!-- Magnific Popup JS -->
<script src="{{ asset('assets/js/mediplus/jquery.magnific-popup.min.js') }}"></script>
<!-- Counter Up CDN JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('assets/js/mediplus/bootstrap.min.js') }}"></script>
<!-- Main JS -->
<script src="{{ asset('assets/js/mediplus/main.js') }}"></script>

</html>