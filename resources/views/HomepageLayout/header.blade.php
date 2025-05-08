<div class="dc-navigationarea" >
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <div class="hidpi-logowrap">
            <strong class="dc-logo">
              <a href="">
                <img class="amsvglogo" src="{{ asset('assets/img/logo.png')}}" alt="Bechifa" >
              </a>
            </strong>
          <div class="dc-rightarea">
            <nav id="dc-nav" class="dc-nav navbar-expand-lg">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <i class="lnr lnr-menu"></i>
                </button>
              <div class="collapse navbar-collapse dc-navigation" id="navbarNav">
                <ul id="menu-header-menu" class="navbar-nav">
                    <li id="menu-item-1444" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children dropdown menu-item-1444"><a href="{{ route('accueil') }}">Homepage</a></li>
                    @if(auth()->check())

                        <li id="menu-item-199" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown menu-item-199">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                    @endif

                    <li id="menu-item-155" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown menu-item-155"><a href="#">Discover Also</a>
                      <ul class="sub-menu">
                        <li id="menu-item-243" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-243"><a href="{{ route('staff') }}">healthcare professionals</a></li>
                        <li id="menu-item-992" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-992"><a href="{{ route('laboratories') }}">Laboratories</a></li>
                        <li id="menu-item-993" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-993"><a href="{{ route('pharmacies') }}">Pharmacies</a></li>
                      </ul>
                    </li>
                    <li id="menu-item-1423" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown menu-item-1423"><a href="/#hit">Contact Us</a></li>

                 </ul>
              </div>
            </nav>
            @if(auth()->check()) <!-- Check if the user is authenticated -->
            <ul class="add-nav shop-nav">
                <li class="cart-area">
                    <div class="dc-cart dropdown">
                        <a href="javascript:;" class="cart-contents" id="dc-cart">
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                    </div>
                </li>
            </ul>
        @endif
              <div class="dc-loginarea">
                 <figure class="dc-userimg">
                   <img src="{{ asset('assets/img/avatars/iconeuser.jpg')}}" alt="user">
                 </figure>
                 @if(auth()->check())
    <!-- Si l'utilisateur est authentifié, affichez le lien de déconnexion -->
    <a href="{{ route('logout') }}" class="dc-btn">Logout</a>
@else
    <!-- Si l'utilisateur n'est pas authentifié, affichez les liens de connexion et d'inscription -->
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
