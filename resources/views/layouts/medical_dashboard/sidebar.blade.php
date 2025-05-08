<ul class="menu-inner py-1">
  <li><<a href="{{ route('medical.dashboard.byId', ['id' => $medicalUser->id]) }}">Dashboard</a>
</li>
  <li><a href="{{ route('medical.notifications', ['id' => $medicalUser->id]) }}">Notifications</a>  <!-- ✅ corrige -->
  </li>
  <li><a href="{{ route('medical.appointments', ['id' => $medicalUser->id]) }}">
  Mes Rendez-vous</li>
</ul>
