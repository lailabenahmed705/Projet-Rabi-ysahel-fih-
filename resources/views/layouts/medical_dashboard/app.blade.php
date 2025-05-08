<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <title>Dashboard Médical</title>
    <link href="{{ asset('assets/vendor/css/core.css') }}" rel="stylesheet">

    @stack('styles')
  </head>
  <body>
    <div class="layout-wrapper">
      @include('layouts.medical_dashboard.sidebar')
      <div class="layout-container">
      {{-- @include('layouts.medical_dashboard.header') --}}
        <main class="content">
          @yield('content')
        </main>
       {{-- @include('layouts.medical_dashboard.footer') --}}
      </div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
    @stack('scripts')
  </body>
</html>
