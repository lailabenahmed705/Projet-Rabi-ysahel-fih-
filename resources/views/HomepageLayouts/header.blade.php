<!doctype html>
<html lang="en-US">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bechifa</title>
    <link rel='stylesheet' id='elementor-icons-css' href='https://amentotech.com/projects/doctreat/wp-content/plugins/elementor/assets/lib/eicons/css/elementor-icons.min.css?ver=5.18.0' type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-frontend-legacy-css' href='https://amentotech.com/projects/doctreat/wp-content/plugins/elementor/assets/css/frontend-legacy.min.css?ver=3.12.1' type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-frontend-css' href='https://amentotech.com/projects/doctreat/wp-content/plugins/elementor/assets/css/frontend.min.css?ver=3.12.1' type='text/css' media='all' />
    <link rel='stylesheet' id='swiper-css' href='https://amentotech.com/projects/doctreat/wp-content/plugins/elementor/assets/lib/swiper/css/swiper.min.css?ver=5.3.6' type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-global-css' href='https://amentotech.com/projects/doctreat/wp-content/uploads/elementor/css/global.css?ver=1579266764' type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-post-77-css' href='https://amentotech.com/projects/doctreat/wp-content/uploads/elementor/css/post-77.css?ver=1597315431' type='text/css' media='all' />
    <link rel='stylesheet' id='linearicons-css' href='https://amentotech.com/projects/doctreat/wp-content/themes/doctreat/css/linearicons.css?ver=1.5.9' type='text/css' media='all' />
    <link rel='stylesheet' id='doctreat-style-css' href='https://amentotech.com/projects/doctreat/wp-content/themes/doctreat/style.css?ver=1.5.9' type='text/css' media='all' />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <style>
        .dc-navigationarea {
            position: absolute;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
            background-color: #fff; /* Ensure it has a background color */
        }
        main {
            padding-top: 200px; /* Adjust based on the height of the header */
            margin-top: -24px;
        }
        /* Utilisation de Flexbox pour aligner les éléments sur la même ligne */
        .doctorslider {
            display: flex;
            flex-wrap: nowrap; /* Empêcher le retour à la ligne */
        }
        body{
          max-height: 100px;
        }

        /* Ajustement de la largeur des éléments */
        .doctorslider .item {
            flex: 0 0 20%; /* Diviser la largeur en 5 colonnes */
        }
        .custom-menu {
            display: none;
            position: absolute;
            z-index: 1000;
            padding: 0.5rem 0;
            margin: 0;
            list-style: none;
            background-color: #fff;
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

        .navbar-nav .sub-menu {
            display: none;
            position: absolute;
            background-color: #fff;
            padding: 10px 0;
            list-style: none;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            border: 1px solid #ccc;
        }

        .navbar-nav .menu-item:hover > .sub-menu {
            display: block;
        }

        .navbar-nav .menu-item {
            position: relative;
        }

        .navbar-nav .sub-menu .sub-menu {
            left: 100%;
            top: 0;
            margin-left: 1px;
        }
    </style>
</head>
<body class="home page-template page-template-elementor_header_footer page page-id-77 wp-embed-responsive theme-doctreat woocommerce-no-js elementor-default elementor-template-full-width elementor-kit-1451 elementor-page elementor-page-77 dokan-theme-doctreat">
    <header id="dc-header" class="dc-header dc-haslayout">
        <div class="dc-navigationarea">
            <div class="container">
                <div class="row">
                    <div class="col-12">

                        <div class="hidpi-logowrap">
                        <strong class="dc-logo">
                  <a href="/">
                  <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width:95px; margin-left:100px">
                  </a>
              </strong>

                            <div class="dc-rightarea">
                                <nav id="dc-nav" class="dc-nav navbar-expand-lg">
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                        <i class="lnr lnr-menu"></i>
                                    </button>
                                    <div class="collapse navbar-collapse dc-navigation" id="navbarNav">
                                        <ul id="menu-header-menu" class="navbar-nav">
                                            <li class="menu-item"><a href="{{ route('accueil') }}">Homepage</a></li>
                                            @if(auth()->check())
                                                <li class="menu-item">
                                                <a href="{{ route(optional(auth()->user()->role)->name === 'patient' ? 'Patientdashboard' : 'dashboard') }}">

                                                </li>
                                            @endif

                                            <li class="menu-item"><a href="#">Discover Also</a>
                                                <ul class="sub-menu">
                                                    <li class="menu-item"><a href="{{ route('staff') }}">Healthcare Professionals</a>
                                                        <ul class="sub-menu">
                                                            <?php
                                                            use Modules\Users\App\Models\MedicalType;
                                                            $medicalTypes = MedicalType::all();
                                                            ?>
                                                            @foreach($medicalTypes as $medicalType)
                                                                <li class="menu-item"><a href="{{ route('medical_type', ['type' => $medicalType->id]) }}">{{ $medicalType->name }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                    <li class="menu-item"><a href="{{ route('companies') }}">Companies</a>
                                                        <ul class="sub-menu">
                                                            <?php
                                                            use Modules\Users\App\Models\Company;
                                                            $companyTypes = Company::select('company_type')->distinct()->get();
                                                            ?>
                                                            @foreach($companyTypes as $companyType)
                                                                <li class="menu-item"><a href="{{ route('company_type', ['type' => $companyType->company_type]) }}">{{ $companyType->company_type }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="menu-item"><a href="/#hit">How It Work</a></li>
                                        </ul>
                                    </div>
                                </nav>
                                <div class="dc-loginarea">
                                    @if(auth()->check())
                                        <a href="{{ route('logout') }}" class="dc-btn">Logout</a>
                                    @else
                                        <div class="dc-loginoption">
                                            <a href="{{ route('connexion') }}" class="dc-loginbtn">Login</a>
                                        </div>
                                        <a href="{{ route('inscription.formulaire') }}" class="dc-btn">Join us Now</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Add your custom scripts here -->
</body>
</html>
