@extends('layouts.medical_dashboard.app')

@section('content')
    

@section('content')


 

  <div class="col-md-12">
    <div class="card p-3">
        <div class="card-header"><strong>🗓 Vue Calendrier</strong></div>
        <div class="card-body">
            <div id="calendar"></div>
        </div>
    </div>
</div>



@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
        initialView: 'timeGridWeek',
        locale: 'fr',
        
        eventColor: '#2196f3',
        height: "auto",
        events: {!! json_encode($calendarAppointments) !!} // ✅ ici
      });
      calendar.render();
    });
  </script>
@endpush




@push('styles')
<style>
  /* 🟦 Hauteur verticale des créneaux */
  .fc-timegrid-slot {
    height: 6em !important;
  }

  /* 🟦 Agrandir les colonnes */
  .fc-col-header-cell, .fc-timegrid-col {
    min-width: 140px !important;
  }

  /* 🟦 Événement lisible */
  .fc-event .fc-event-main {
    white-space: normal !important;
    font-size: 1.1rem;
    padding: 8px;
  }

  .fc .fc-toolbar-title {
    font-size: 1.6rem;
  }
</style>
@endpush
