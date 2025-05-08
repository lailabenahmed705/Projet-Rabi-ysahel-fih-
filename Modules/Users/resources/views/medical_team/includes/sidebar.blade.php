<div class="sidebar bg-white shadow-sm p-3" style="width: 250px; min-height: 100vh;">
  <div class="text-center mb-4">
    <img src="{{ asset('images/doctor-avatar.png') }}" class="rounded-circle" width="80" alt="Avatar">
    <h5 class="mt-2 mb-0">{{ $medicalUser->name ?? 'Invité' }}</h5>



    <small class="text-muted">Professionnel de santé</small>
  </div>

  <ul class="nav flex-column">
    <li class="nav-item mb-2">
      <a href="{{ route('medical.dashboard') }}" class="nav-link {{ request()->routeIs('medical.dashboard') ? 'active fw-bold' : '' }}">
        <i class="bx bx-home me-2"></i> Dashboard
      </a>
    </li>

    <li class="nav-item mb-2">
      <a href="{{ route('medical.calendar') }}" class="nav-link {{ request()->routeIs('medical.calendar') ? 'active fw-bold' : '' }}">
        <i class="bx bx-calendar me-2"></i> Calendrier
      </a>
    </li>

    <li class="nav-item mb-2">
      <a href="{{ route('medical.notifications') }}" class="nav-link {{ request()->routeIs('medical.notifications') ? 'active fw-bold' : '' }}">
        <i class="bx bx-bell me-2"></i> Notifications
      </a>
    </li>

    <li class="nav-item mb-2">
      <a href="{{ route('medical.appointments') }}" class="nav-link {{ request()->routeIs('medical.appointments') ? 'active fw-bold' : '' }}">
        <i class="bx bx-notepad me-2"></i> Mes Rendez-vous
      </a>
    </li>

    <li class="nav-item">
      <a href="{{ route('logout') }}" class="nav-link text-danger"
         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="bx bx-log-out me-2"></i> Déconnexion
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </li>
  </ul>
</div>
