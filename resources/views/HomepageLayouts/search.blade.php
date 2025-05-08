<!doctype html>
<html lang="en-US">
<meta name="csrf-token" content="{{ csrf_token() }}">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Bechifa</title>

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
.hidden {
  display: none;
}


    </style>
<link rel='stylesheet' id='elementor-icons-css'  href='https://amentotech.com/projects/doctreat/wp-content/plugins/elementor/assets/lib/eicons/css/elementor-icons.min.css?ver=5.18.0' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-frontend-legacy-css'  href='https://amentotech.com/projects/doctreat/wp-content/plugins/elementor/assets/css/frontend-legacy.min.css?ver=3.12.1' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-frontend-css'  href='https://amentotech.com/projects/doctreat/wp-content/plugins/elementor/assets/css/frontend.min.css?ver=3.12.1' type='text/css' media='all' />
<link rel='stylesheet' id='swiper-css'  href='https://amentotech.com/projects/doctreat/wp-content/plugins/elementor/assets/lib/swiper/css/swiper.min.css?ver=5.3.6' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-global-css'  href='https://amentotech.com/projects/doctreat/wp-content/uploads/elementor/css/global.css?ver=1579266764' type='text/css' media='all' />
<link rel='stylesheet' id='elementor-post-77-css'  href='https://amentotech.com/projects/doctreat/wp-content/uploads/elementor/css/post-77.css?ver=1597315431' type='text/css' media='all' />
<link rel='stylesheet' id='linearicons-css'  href='https://amentotech.com/projects/doctreat/wp-content/themes/doctreat/css/linearicons.css?ver=1.5.9' type='text/css' media='all' />


<link rel='stylesheet' id='doctreat-style-css'  href='https://amentotech.com/projects/doctreat/wp-content/themes/doctreat/style.css?ver=1.5.9' type='text/css' media='all' />
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('assets/css/calendar.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style-css.css') }}">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">



</head>

<body class="home page-template page-template-elementor_header_footer page page-id-77 wp-embed-responsive theme-doctreat woocommerce-no-js elementor-default elementor-template-full-width elementor-kit-1451 elementor-page elementor-page-77 dokan-theme-doctreat">
    <header id="dc-header" class="dc-header dc-haslayout ">
      @include('HomepageLayouts.header')
    </header>
    <main>
      @yield('content')
    </main>
    <footer id="dc-footer" class="dc-footer dc-haslayout">
      @include('HomepageLayouts.footer')
    </footer>


<script type='text/javascript' src='https://amentotech.com/projects/doctreat/wp-content/plugins/contact-form-7/includes/swv/js/index.js?ver=5.7.5.1' id='swv-js'></script>
<script type='text/javascript' src='https://amentotech.com/projects/doctreat/wp-content/plugins/contact-form-7/includes/js/index.js?ver=5.7.5.1' id='contact-form-7-js'></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/js/calendar.js') }}"></script>
<script src="{{ asset('assets/js/ins-related.js') }}"></script>
<script>
  // Fonction pour afficher ou masquer la section lorsque le bouton est cliqué
  function toggleSection() {
    var section = document.querySelector('.elementor-section');
    section.classList.toggle('hidden'); // Ajoute ou supprime la classe 'hidden' pour afficher ou masquer la section
  }

  // Ajoute un écouteur d'événements pour le clic sur le bouton
  document.querySelector('.dc-btn').addEventListener('click', function() {
    toggleSection(); // Appelle la fonction pour afficher ou masquer la section
  });
</script>
<script>
  $(document).ready(function() {
    // Variables to keep track of current carousel item
    var currentSlide = 0;
    var totalSlides = $('.carousel-item').length;

    // Functionality for Next button
    $('.dc-carousel-control-next').click(function(event) {
      event.preventDefault(); // Prevent default link behavior
      moveToNextSlide();
    });

    // Functionality for Previous button
    $('.dc-carousel-control-prev').click(function(event) {
      event.preventDefault(); // Prevent default link behavior
      moveToPrevSlide();
    });

    // Function to move to the next slide
    function moveToNextSlide() {
      $('.carousel-item').removeClass('active'); // Remove active class from all items
      currentSlide = (currentSlide + 1) % totalSlides; // Calculate the next slide index
      $('#carousel-item-' + (currentSlide + 1)).addClass('active'); // Add active class to the next slide
    }

    // Function to move to the previous slide
    function moveToPrevSlide() {
      $('.carousel-item').removeClass('active'); // Remove active class from all items
      currentSlide = (currentSlide - 1 + totalSlides) % totalSlides; // Calculate the previous slide index
      $('#carousel-item-' + (currentSlide + 1)).addClass('active'); // Add active class to the previous slide
    }
  });
</script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const feedbackLink = document.querySelector(".dc-add-feedback");
    const feedbackForm = document.getElementById("feedbackForm");

    feedbackLink.addEventListener("click", function(event) {
      event.preventDefault(); // Empêche le comportement par défaut du lien

      // Affiche le formulaire de feedback
      feedbackForm.style.display = "block";
    });
  });
</script>
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

<link rel='stylesheet' id='e-animations-css'  href='https://amentotech.com/projects/doctreat/wp-content/plugins/elementor/assets/lib/animations/animations.min.css?ver=3.12.1' type='text/css' media='all' />


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
    <script>
      $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    </script>
    <script>
      $(document).ready(function(){
          setupAutocomplete('city_name', "{{ route('autocomplete.fetchCities') }}", 'cityList');
          setupAutocomplete('search_category', "{{ route('autocomplete.fetchCategories') }}", 'categoryList');

          function setupAutocomplete(inputName, url, listId) {
              var inputSelector = 'input[name="' + inputName + '"]';
              var listSelector = '#' + listId;

              $(inputSelector).keyup(function(){
                  var query = $(this).val();
                  if(query != '') {
                      var _token = $('meta[name="csrf-token"]').attr('content');
                      $.ajax({
                          url: url,
                          method: "POST",
                          data: {query: query, _token: _token},
                          success: function(data) {
                              var items = '';
                              data.forEach(function(item) {
                                  items += '<li><a href="#">' + item + '</a></li>';
                              });
                              $(listSelector).html('<ul class="dropdown-enu" style="display:block; position:relative">' + items + '</ul>').fadeIn();
                          },
                          error: function() {
                              $(listSelector).fadeOut();
                          }
                      });
                  } else {
                      $(listSelector).fadeOut();
                  }
              });

              // Bind the click event specifically within the list related to this input
              $(document).on('click', listSelector + ' li a', function(){
                  $(inputSelector).val($(this).text());
                  $(listSelector).fadeOut();
              });
          }

          // Ajout de la fonctionnalité pour les suggestions statiques "Laboratory" et "Pharmacy"
          $('#search_category').on('input', function() {
              var inputVal = $(this).val().trim().toUpperCase();
              var suggestions = [];
              if (inputVal === 'L') {
                  suggestions.push('Laboratory');
              } else if (inputVal === 'P') {
                  suggestions.push('Pharmacy');
              }

              // Afficher les suggestions statiques
              if (suggestions.length > 0) {
                  var items = '';
                  suggestions.forEach(function(item) {
                      items += '<li><a href="#">' + item + '</a></li>';
                  });
                  $('#categoryList').html('<ul class="custom-menu" style="display:block; position:relative">' + items + '</ul>').fadeIn();
               } else {
                  $('#categoryList').fadeOut();
              }
          });
      });

        </script>
        <script>
          $(document).ready(function(){
              setupAutocomplete('city_name', "{{ route('autocomplete.fetchCities') }}", 'cityList');

              function setupAutocomplete(inputId, url, listId) {
                  var inputSelector = '#' + inputId;
                  var listSelector = '#' + listId;

                  $(inputSelector).keyup(function(){
                      var query = $(this).val();
                      if(query != '') {
                          var _token = $('meta[name="csrf-token"]').attr('content');
                          $.ajax({
                              url: url,
                              method: "POST",
                              data: {query: query, _token: _token},
                              success: function(data) {
                                  console.log(data); // Afficher les données dans la console
                                  var items = '';
                                  data.forEach(function(item) {
                                      // Construct the item string with country, state, dependency
                                      var country = item.dependency && item.dependency.state && item.dependency.state.country ? item.dependency.state.country.name : 'No country';
                                      var state = item.dependency && item.dependency.state ? item.dependency.state.name : 'No state';
                                      var dependency = item.dependency ? item.dependency.name : 'No dependency';
                                      items += '<li><a href="#">' + item.name + ' (' + country + ' - ' + state + ' - ' + dependency + ')</a></li>';
                                  });
                                  $(listSelector).html('<ul class="dropdwn-menu" style="display:block; position:relative">' + items + '</ul>').fadeIn();
                              },
                              error: function() {
                                  $(listSelector).fadeOut();
                              }
                          });
                      } else {
                          $(listSelector).fadeOut();
                      }
                  });

                  // Bind the click event specifically within the list related to this input
                  $(document).on('click', listSelector + ' li a', function(){
                      $(inputSelector).val($(this).text());
                      $(listSelector).fadeOut();
                  });
              }
          });
          </script>

</body>
</html>




