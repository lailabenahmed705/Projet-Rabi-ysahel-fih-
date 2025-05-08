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

        /* Utilisation de Flexbox pour aligner les éléments sur la même ligne */
        .doctorslider {
            display: flex;
            flex-wrap: nowrap; /* Empêcher le retour à la ligne */
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
main{
  height:1000px;
}
footer{

  max-height:500px;
}

    </style>
</head>
<body class="home page-template page-template-elementor_header_footer page page-id-77 wp-embed-responsive theme-doctreat woocommerce-no-js elementor-default elementor-template-full-width elementor-kit-1451 elementor-page elementor-page-77 dokan-theme-doctreat">
    <header id="dc-header" class="dc-header dc-haslayout ">
        @include('HomepageLayouts.header')
    </header>
    <main id="dc-main" class="dc-main dc-haslayout">
            @yield('content')
   </main>



    <footer id="dc-footer" class="dc-footer dc-haslayout">
        @include('HomepageLayouts.footer')
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Add your custom scripts here -->
</body>
</html>
