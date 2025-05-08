<?php

namespace Modules\Users\app\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use  Modules\Users\App\Models\MedicalTeam;
use  Modules\Users\App\Models\Company;
use Modules\Users\App\Models\User;
use Modules\Users\App\Models\Role;
use Modules\International\App\Models\Currency;
use Modules\Users\App\Models\Country;
use Modules\Users\App\Models\State;
use Modules\International\App\Models\Dependency;
use Modules\Users\App\Models\City;
use  Modules\Service\App\Models\MedicalType;
use  Modules\Users\App\Models\MedicalService;
use  Modules\International\App\Models\Address;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\DatabaseNotification;
use Carbon\Carbon;


class MedicalTeamController extends Controller
{
    public function index(Request $request)
    {
        $countryId = $request->input('country_id');

        $medicalTeams = MedicalTeam::all();
        $medicalTypes = MedicalType::pluck('name', 'id');
        $countries = Country::pluck('name', 'id');
        $states = State::where('country_id', $countryId)->pluck('name', 'id');
       $cities = City::pluck('name', 'id');
       $currencies = Currency::pluck('name', 'id');
       

     
        return view('users::medical_team.create-medical-team', compact('medicalTypes', 'currencies' ,'medicalTeams', 'countries', 'states', 'cities'));
    }

    public function createForm(Request $request)
    {
        $countryId = $request->input('country_id');

        $medicalTeams = MedicalTeam::all();
        $medicalTypes = MedicalType::pluck('name', 'id');
       $countries = Country::pluck('name', 'id');
       $states = State::where('country_id', $countryId)->pluck('name', 'id');
        $cities = City::pluck('name', 'id');
        $currencies = Currency::pluck('name', 'id');
        //$dependencies = Dependency::pluck('name', 'id');

    
    return view('users::medical_team.create-medical-team', compact('medicalTypes', 'currencies', 'medicalTeams', 'countries', 'states', 'cities'));
    
    }

    public function getStatesByCountry($countryId)
    {
        $states = State::where('country_id', $countryId)->pluck('name', 'id');

        return response()->json($states);
    }

    public function getDependenciesByState($stateId)
    {
        $dependencies = Dependency::where('state_id', $stateId)->pluck('name', 'id');
        return response()->json($dependencies);
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'medical_type_id' => 'required|exists:medical_types,id',
            'phoneNumber' => 'required|string|max:20|unique:users,phone',
            'gender' => 'required|string|in:male,female,other',
            'dob' => 'required|date',
            'country_id' => 'required|exists:countries,id',
            'state_id' => 'required|exists:states,id',
            'city_id' => 'required|exists:cities,id',
           // 'dependency_id' => 'required|exists:dependencies,id',
            'language' => 'required|string|in:en,fr',
            'currency_id' => 'required|exists:currencies,id',
            'password' => 'required|min:8|confirmed',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:800',
            //'address' => 'required|string|max:255',
        ]);
        $medicalTypeName = MedicalType::find($request->medical_type_id)->name;

        $role = Role::firstOrCreate(
        ['name' => $medicalTypeName],
        ['guard_name' => 'web']
);
  

        // Create a new User record
        $user = new User();
        $user->name = $request->firstName . ' ' . $request->lastName;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phoneNumber;
        $user->gender = $request->gender;
        $user->dob = $request->dob;
        $user->role_id = $role->id;

        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            $photoPath = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo_path = $photoPath;
        }

        $user->save();

        // Create the related MedicalAddress record
    
        $address = new Address();
        $address->address = $request->address;
        $address->country_id = $request->country_id;
        $address->state_id = $request->state_id;
        $address->city_id = $request->city_id;
        $address->addressable_type = User::class;
        $address->addressable_id = $user->id;
        $address->save();
        
        // Create the related MedicalService record
        $medicalService = new MedicalService();
        $medicalService->language = $request->language;
        $medicalService->experience = $request->experience;
        $medicalService->appointment_fees = $request->appointment_fees;
        $medicalService->start_time = $request->start_time;
        $medicalService->end_time = $request->end_time;
        $medicalService->education = $request->education;
        $medicalService->certificates = $request->certificates;
        $medicalService->professional_bio = $request->professional_bio;
        $medicalService->nbre_feedbacks = 0;
        $medicalService->save();

        // Create a new MedicalTeam record with validated data
        $medicalTeam = new MedicalTeam();
        $medicalTeam->user_id = $user->id;
        $medicalTeam->medical_type_id = $request->medical_type_id;
        $medicalTeam->medical_address_id = $address->id;
        $medicalTeam->medical_service_id = $medicalService->id;
        $medicalTeam->save();

        // Redirect the user to an appropriate view or route
 
       
        //return redirect()->route('create-medical-team')->with('success', 'Le formulaire a été enregistré avec succès !');
        $medicalType = MedicalType::find($request->medical_type_id);

        // Redirige vers la vue filtrée du type concerné
        return redirect()->route('medical_team.showFiltered', ['medicalTypeSlug' => $medicalType->slug])
                         ->with('success', 'Le formulaire a été enregistré avec succès !');
        

    }

    public function showFilteredTeam($medicalTypeSlug)
    {
        // Find the medical type by slug
        $medicalType = MedicalType::where('slug', $medicalTypeSlug)->firstOrFail();

        // Retrieve the medical teams filtered by medical type
        $medicalTeam = MedicalTeam::where('medical_type_id', $medicalType->id)->get();

        // Return the view with the data
        return view('users::medical_team.medical-team', compact('medicalType', 'medicalTeam'));
    }

    public function showTeamDetails($id)
    {
        $medicalTeam = MedicalTeam::with([
            'medicalAddress.country',
            'medicalAddress.state',
            //'medicalAddress.dependency',
            'medicalAddress.city'
        ])->findOrFail($id);
     // Decode JSON certificates s’ils sont encodés en base
      $certificates = json_decode($medicalTeam->medicalService->certificates, true);

    // Ensuite retourne la vue avec la variable :
      return view('users::medical_team.team-details', compact('medicalTeam', 'certificates')); 
    }


    public function editForm($id)
    {
        $team = MedicalTeam::findOrFail($id);
        return view('users::medical_team.edit-form', compact('team'));
    }

    public function updateTeamData(Request $request, $id)
{
    // Retrieve the medical team to be updated
    $medicalTeam = MedicalTeam::findOrFail($id);

    // Update the related User record
    $user = User::findOrFail($medicalTeam->user_id);

    // ✅ Validation avec le bon nom de champ
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        'phoneNumber' => 'required|string|max:20|unique:users,phone,' . $user->id,
    ]);

    // ✅ Mise à jour avec la bonne clé `phoneNumber`
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phoneNumber;
    $user->save();

    // ✅ Rediriger vers la page de détails après mise à jour
    return redirect()->route('medical-team.showDetails', ['id' => $medicalTeam->id])
                     ->with('success', 'User information has been updated successfully.');
}




public function showAllTeams()
{
    $medicalTeams = MedicalTeam::with(['user', 'medicalType'])->get();

    return view('users::medical_team.all-teams', compact('medicalTeams'));
}


public function destroy($id)
{
    // Variable to hold the slug for redirection
    $medicalTypeSlug = '';

    DB::transaction(function () use ($id, &$medicalTypeSlug) {
        // Find the medical team to delete
        $team = MedicalTeam::findOrFail($id);

        // Retrieve related IDs
        $userId = $team->user_id;
        $medicalAddressId = $team->medical_address_id;
        $medicalServiceId = $team->medical_service_id;

        // Retrieve the medical type slug for redirection
        $medicalTypeSlug = $team->medicalType->slug;

        // Delete the medical team
        $team->delete();

        // Delete the related User, MedicalAddress, and MedicalService records
        User::destroy($userId);
        MedicalAddress::destroy($medicalAddressId);
        MedicalService::destroy($medicalServiceId);
    });

    // Redirect back to the same view with a success message
    return redirect()->route('medical_team.showFiltered', ['medicalTypeSlug' => $medicalTypeSlug])
                     ->with('success', 'L\'équipe médicale a été supprimée avec succès.');


}




public function appointments($id)
{
    $user = User::with('medicalTeam')->findOrFail($id);

    if (!$user->medicalTeam) {
        abort(404, 'Aucune équipe médicale associée à cet utilisateur.');
    }

    $appointments = $user->medicalTeam
        ->appointments()
        ->with('patient', 'service')
        ->latest()
        ->paginate(10);

    return view('appointments::appointments.index', compact('appointments'));
}




public function notifications($id)
{
    $user = User::findOrFail($id);
    $notifications = $user->notifications()->latest()->get();

    return view('users::medical_team.notifications.index', compact('notifications'));
}


public function markNotificationAsRead($id)
{
    $notification = auth()->user()->notifications()->findOrFail($id);
    $notification->markAsRead();

    return back()->with('success', 'Notification marquée comme lue.');
}

public function dashboardById($id)
{
    return $this->dashboard($id);
}

public function dashboard($id)
{
    $user = User::with('medicalTeam')->find($id);

    if (!$user) {
        abort(404, 'Utilisateur introuvable');
    }

    $medicalUser = $user;

    // 🔔 Notifications récentes
    $notifications = $user->notifications()->latest()->take(5)->get();

    // 📅 Appointments normaux
    $appointments = $user->medicalTeam
        ? $user->medicalTeam->appointments()
            ->with('patient', 'service')
            ->latest()
            ->take(5)
            ->get()
        : collect();

    // 🔄 Events des appointments pour calendrier
    $calendarAppointments = $user->medicalTeam
        ? $user->medicalTeam->appointments()
            ->with('patient', 'service')
            ->take(100)
            ->get()
            ->map(function ($appointment) {
                return [
                    'title' => optional($appointment->patient)->name . ' | ' . optional($appointment->service)->name,
                    'start' => $appointment->availability_date . 'T' . $appointment->availability_time,
                    'id'    => $appointment->id,
                    'color' => $appointment->status === 'approved' ? '#4caf50' : '#ff9800',
                ];
            })
        : collect();

    // 🔔 Récupérer les notifications de type "NewAppointmentNotification"
    $appointmentNotifications = $user->notifications()
        ->where('type', 'Modules\Appointments\App\Notifications\NewAppointmentNotification')
        ->get();

    // 🔄 Events à partir des notifications
    $notifEvents = $appointmentNotifications->map(function ($notif) {
        return [
            'title' => '📢 ' . ($notif->data['patient_name'] ?? 'Patient inconnu') . ' (notif)',
            'start' => $notif->data['date'] . 'T' . $notif->data['time'],
            'id'    => 'notif_' . $notif->id,
            'color' => '#2196f3',
        ];
    });

    // ✅ Fusionner les rendez-vous avec les événements de notification
    $calendarAppointments = $calendarAppointments->concat($notifEvents);

    // 🔁 Vue avec les données
    return view('users::medical_team.dashboard', compact(
        'appointments',
        'calendarAppointments',
        'notifications',
        'medicalUser'
    ));
}

}