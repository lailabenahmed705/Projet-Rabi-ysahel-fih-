@extends('dashboardClientLayouts.app')
@section('content')
@php
     $user = auth()->user();
    $appointments = \App\models\Appointment::where('staff_attendee_id', $user->medicalTeam->id)->get();

@endphp

<main id="dc-main" class="dc-main dc-haslayout">
  <div class="row">
    <div class="col-12">
          <div class="dc-user-profile">
              <div class="dc-dashboardbox dc-dashboardtabsholder">
                  <div class="dc-dashboardboxtitle">
                      <h2>Appointments</h2>
                  </div>
                  <div class="dc-personalskillshold tab-pane " >
                    <table class="table table-hover align-middle mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bold opacity-7">Patient</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bold opacity-7">Location</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bold opacity-7">Treatment</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bold opacity-7">Date</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bold opacity-7">Type</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bold opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bold opacity-7">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($appointments as $appointment)
                    @php
                      $city_name = \App\Models\City::find($appointment->city_id)->name;
                      $servicecategories = \App\Models\ServiceCategory::find($appointment->service_category_id)->name;
                    @endphp
                    <tr>
                      <td class="text-center">{{ $appointment->attendee_name }}</td>
                      <td class="text-center">{{ $city_name }}</td>
                      <td class="text-center">{{ $servicecategories }}</td>
                      <td class="text-center">
                        <span class="d-block">{{ $appointment->starts_at }}</span>
                        <span class="d-block">{{ $appointment->ends_at }}</span>
                      </td>
                      <td class="text-center">{{ $appointment->type->name }}</td>
                      <td class="text-center" style="color:
                        @if ($appointment->status->name == 'notconfirmed')
                            #6c757d /* Gris */
                        @elseif ($appointment->status->name == 'missed' || $appointment->status->name == 'canceled')
                            #dc3545 /* Rouge */
                        @else
                            #28a745 /* Vert */
                        @endif
                    ">{{ $appointment->status->name }}</td>
                      <td class="text-center">
                        <div class="btn-group" role="group" aria-label="Actions">
                            <form action="{{ route('appointments.cancel', $appointment->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-danger mr-2" style="background-color: #F8D7DA; border-color: #F8D7DA;">
                                    <i class="fas fa-times"></i> Canceled <!-- Icône de croix -->
                                </button>
                            </form>

                            <form action="{{ route('appointments.markmissed', $appointment->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-danger mr-2" style="background-color: #FFE3E3; border-color: #FFE3E3;">
                                    <i class="fas fa-clock"></i> Missed<!-- Icône d'horloge -->
                                </button>
                            </form>
                        </div>
                        <div class="btn-group" role="group" aria-label="Actions">

                            <form action="{{ route('appointments.attended', $appointment->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-success mr-2" style="background-color: #CFF4D2; border-color: #CFF4D2;">
                                    <i class="far fa-check-square"></i> Attended<!-- Icône de coche vide -->
                                </button>
                            </form>

                            <form action="{{ route('appointments.accept', $appointment->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-success" style="background-color: #B2F7C4; border-color: #B2F7C4;">
                                    <i class="fas fa-check"></i> Accept <!-- Icône de coche -->
                                </button>
                            </form>
                        </div>
                    </td>




                    </tr>
                    @endforeach
                  </tbody>
                </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection
