<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Add your custom styles here */
        .dc-sidebarwrapper {
            width: 250px;
            transition: all 0.3s ease;
        }
        .dc-sidebarwrapper.collapsed {
            width: 50px;
        }
        .dc-btnmenutoggle {
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            background-color: #007bff;
        }
        .dc-btnmenutoggle img {
            transition: transform 0.3s ease;
        }
        .dc-btnmenutoggle.collapsed img {
            transform: rotate(180deg);
        }
        .dashboard-menu-left {
            list-style-type: none;
            padding: 0;
        }
        .dashboard-menu-left li {
            padding: 10px;
            height:59px;
        }
        .dashboard-menu-left li a {
            text-decoration: none;
            color: #000;
        }
    </style>
</head>
<body>

<div id="dc-sidebarwrapper" class="dc-sidebarwrapper" >
  <div id="dc-btnmenutoggle" class="dc-btnmenutoggle">
    <img id="toggle-arrow" src="{{ asset('images/droite.png') }}" style="width:15px" class="flèche droite">
  </div>
  <div id="dc-verticalscrollbar" class="dc-verticalscrollbar">
    <div class="dc-companysdetails dc-usersidebar">

      @php
         $user = auth()->user();
      @endphp

    <figure class="dc-userimg">
    @if(Auth::user()->profile_photo_path)
      <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="user">
  @else
      <img src="{{ asset('images/avatars/1.png') }}" alt="user">
  @endif      </figure>
      <div class="dc-username">
          <h4>{{ Auth::user()->name }}</h4>
          <h3><span>{{ Auth::user()->role->name }}</span></h3>
      </div>
    </div>
    <nav id="dc-navdashboard" class="dc-navdashboard">
      <ul class="dashboard-menu-left">
        <li class="dc-active">
          <a href="{{ route('dashboard') }}">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a  href="{{ route('showmyprofile') }}">
            <i class="fas fa-user"></i>
            <span>View My Profile</span>
          </a>
        </li>
        <li>
          <a href="{{ route('availability-settings.create') }}">
            <i class="fas fa-user-cog"></i>
            <span>Availability Settings</span>
          </a>
        </li>
        <li>
          <a href="{{ route('specandserv') }}">
            <i class="fas fa-sticky-note"></i>
            <span>Specialities &amp; Services</span>
          </a>
        </li>

        <li>
          <a href="{{ route('feedbacks') }}">
            <i class="fas fa-comment"></i>
            <span>Your feedbacks</span>
          </a>
        </li>
        <li>
          <a href="{{ route('appointments') }}">
            <i class="fas fa-calendar-alt"></i>
            <span>Appointments</span>
          </a>
        </li>
        <li>
          <a href="{{ route('invoices.index', ['user_id' => auth()->id()]) }}">
            <i class="fas fa-money-check-alt"></i>
            <span>Invoices</span>
          </a>
        </li>
        <li>
          <a href="{{ route('packages') }}">
            <i class="fas fa-box-open"></i>
            <span>Packages</span>
          </a>
        </li>
        <li>
          <a href="{{ route('logout') }}">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</div>

<script>
    document.getElementById('dc-btnmenutoggle').addEventListener('click', function() {
        var sidebar = document.getElementById('dc-sidebarwrapper');
        var arrow = document.getElementById('toggle-arrow');
        sidebar.classList.toggle('collapsed');
        this.classList.toggle('collapsed');

    });
</script>

</body>
</html>
