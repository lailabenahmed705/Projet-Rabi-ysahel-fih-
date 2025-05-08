
@extends('layouts.medical_dashboard')

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Médical</title>

    {{-- Styles personnalisés et FullCalendar --}}
    @stack('styles')

    <!-- Optionnel : Bootstrap CSS si utilisé -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f5f7fa;">

    <div class="d-flex">
        {{-- 🩺 Sidebar pour Medical Team --}}
        @include('users::medical_team.includes.sidebar')

        {{-- Contenu principal --}}
        <div class="flex-grow-1 p-4">
            @yield('content')
        </div>
    </div>

    {{-- Scripts : FullCalendar et autres --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>


