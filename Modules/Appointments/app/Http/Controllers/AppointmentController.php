<?php

namespace Modules\Appointments\App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Modules\Service\App\Models\Service;
use Modules\Service\App\Models\ServiceCategory;
use Modules\Service\App\Models\ServiceSubCategory;
use Modules\Users\App\Models\MedicalTeam;
use Modules\Appointments\App\Services\AppointmentService;

use Modules\Appointments\App\Events\AppointmentCreated;



class AppointmentController extends Controller
{
    protected $appointmentService;

    public function __construct(AppointmentService $appointmentService)
    {
        $this->appointmentService = $appointmentService;
    }

    public function index()
    {
        $appointments = $this->appointmentService->listAppointments();
        return view('appointments::appointments.index', compact('appointments'));
    }

    public function step1()
    {
        $medicalTeams = MedicalTeam::with('user')->get();
        $serviceSubCategories = ServiceSubCategory::all();
        return view('appointments::appointments.step1', compact('medicalTeams', 'serviceSubCategories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'medical_team_id' => 'required|exists:medical_team,id',
            'service_category_id' => 'required|exists:service_categories,id',
            'service_id' => 'required|exists:services,id',
            'care_type' => 'required|in:recurring,one-time',
            'appointment_location' => 'required|in:at_home,in_office',
            'availability_date' => 'required|date',
            'availability_time' => 'required',
            'description' => 'nullable|string',
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'confirm_phone' => 'required|string|max:20|same:phone',
            'address' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'gender' => 'required|in:male,female,other',
            'ordonnance' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

        ]);

        $appointment = $this->appointmentService->createAppointment($validated + ['ordonnance' => $request->file('ordonnance')]);

        

      

        // 🔥 Déclenchement de l’événement pour notification
          event(new AppointmentCreated($appointment));

    return redirect()->route('appointments.confirmation')
                     ->with('success', 'Appointment created successfully. Medical team notified.');

    }

    //return redirect()->route('appointments.confirmation')->with('success', 'Appointment created successfully.');

    public function confirmation()
    {
        return view('appointments::appointments.confirmation');
    }

    public function destroy($id)
    {
        $this->appointmentService->deleteAppointment($id);
        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully.');
    }

    public function edit($id)
    {
        $appointment = $this->appointmentService->findAppointment($id);
        $medicalTeams = MedicalTeam::with('user')->get();
        $serviceCategories = ServiceCategory::all();
        $services = Service::all();

        return view('appointments::appointments.edit', compact('appointment', 'medicalTeams', 'serviceCategories', 'services'));
    }

    public function getServiceCategoriesByMedicalType(Request $request)
    {
        $medicalTeam = MedicalTeam::findOrFail($request->medical_team_id);
        $serviceCategories = ServiceCategory::where('medical_type_id', $medicalTeam->medical_type_id)->pluck('name', 'id');
        return response()->json($serviceCategories);
    }

    public function getServicesByServiceCategory(Request $request)
    {
        $services = Service::where('service_category_id', $request->service_category_id)->pluck('name', 'id');
        return response()->json($services);
    }

    
        // Ici tu peux aussi utiliser un AvailabilityService (que je peux générer aussi si tu veux)
        public function getAvailability(Request $request)
{
    $medicalTeamId = $request->input('medical_team_id');
    $availabilityDate = $request->input('availability_date');

    $availabilitySetting = \Modules\Appointments\App\Models\AvailabilitySetting::where('medical_team_id', $medicalTeamId)->first();

    if (!$availabilitySetting) {
        return response()->json([]);
    }

    $start = new \DateTime($availabilitySetting->start_shift);
    $end = new \DateTime($availabilitySetting->end_shift);
    $breakStart = $availabilitySetting->break_start ? new \DateTime($availabilitySetting->break_start) : null;
    $breakEnd = $availabilitySetting->break_end ? new \DateTime($availabilitySetting->break_end) : null;

    $slots = [];

    while ($start < $end) {
        if ($breakStart && $start >= $breakStart && $start < $breakEnd) {
            $start->add(new \DateInterval("PT{$availabilitySetting->consultation_duration}M"));
            continue;
        }

        $slots[] = [
            'id' => $start->format('H:i'),           // pour <option value="">
            'start_time' => $start->format('H:i'),    // pour afficher
        ];

        $start->add(new \DateInterval("PT{$availabilitySetting->consultation_duration}M"));
        $start->add(new \DateInterval("PT{$availabilitySetting->transport_time}M"));
    }

    return response()->json($slots);
}





}
