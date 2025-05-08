<header id="dc-header" class="dc-header dc-haslayout dc-header-dashboard">
  <div class="dc-navigationarea">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
          <div class="hidpi-logowrap">
           <strong class="dc-logo">
                  <a href="/" >
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
        <li id="menu-item-1444" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children  menu-item-1444">          <a href="{{ route('dashboard') }}">Dashboard</a>
       </li>
        @if(auth()->check())
        <li id="menu-item-199" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown menu-item-199"> <a href="{{ route('accueil') }}">Homepage</a>
        </li>
        @endif
        <li id="menu-item-1423" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children  menu-item-1423"><a href="{{ route('companies') }}">Companies</a></li>
          <ul class="sub-menu">
            <li id="menu-item-993" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-993"><a href="">companies</a></li>
            <li id="menu-item-156" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-156"><a href="">About Us</a></li>
            <li id="menu-item-1417" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children  menu-item-1417"><a href="#">Contact Us</a></li>
            <li id="menu-item-243" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-243"><a href="">How it works ?</a></li>

          </ul>

        </li>
     </ul>
  </div>
</nav>
<ul class="add-nav shop-nav">
  <li class="cart-area">
     <div class="dc-cart dropdown">
       <a href="javascript:;" class="cart-contents" id="dc-cart">
         <i class="fas fa-shopping-cart"></i>
       <span class="dc-badge">0</span>
       </a>
     </div>
   </li>
</ul>
@php
  $user = auth()->user();
@endphp
<div class="dc-userlogin dc-userlogedin sp-top-menu">
    <figure class="dc-userimg">
      @if(Auth::user()->profile_photo_path)
      <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="user">
  @else
      <img src="{{ asset('images/avatars/1.png') }}" alt="user">
  @endif

    </figure>
    <div class="dc-username">
        <h4>{{ Auth::user()->name }}</h4>															  <span>{{ Auth::user()->role->name }}</span>
    </div>
    <nav class="dc-usernav">
      <ul class="dashboard-menu-top">
        <li class="dc-active">
            <a href="{{ route('dashboard') }}">
              <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
        </li>
        <li>
            <a target="_blank" href="{{ route('showmyprofile') }}">
              <i class="fas fa-user"></i>
            <span>View My Profile</span>
            </a>
        </li>
        <li class="">
              <a href="{{ route('availability-settings.create') }}">
                <i class="fas fa-user-cog"></i>
              <span>Availability Settings</span>
              </a>
        </li>

        <li class="">
            <a href="{{ route('specandserv') }}">
              <i class="fas fa-sticky-note"></i>
            <span>Specialities &amp; Services</span>
            </a>
        </li>
        

        <li class="">
            <a href="{{ route('feedbacks') }}">
              <i class="fas fa-comment"></i>
            <span>Your feedbacks</span>
            </a>
        </li>

        <li class="">
            <a href="{{ route('appointments') }}">
              <i class="fas fa-calendar-alt"></i>
            <span>Appointments</span>
            </a>
        </li>

        <li class="">
            <a href="{{ route('invoices.index', ['user_id' => auth()->id()]) }}">
              <i class="fas fa-money-check-alt"></i>
              <span>Invoices</span>
            </a>
        </li>

          <li class="">
              <a href="{{ route('packages') }}">
                <i class="fas fa-box-open"></i>
                <span>Packages</span>
              </a>
          </li>
          <li>
             <li><a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>
        </li>
          </ul>
              </nav>
          </div>
                  </div>
</div>
</div>
</div>
</div>
</div>
</header>
