<?php

namespace Modules\Dashboard\app\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\ChosenService;
use App\Models\ChosenSubService;
use Modules\Service\app\Models\ServiceCategory;
use Modules\Users\app\Models\User;
use Modules\Users\app\Models\MedicalTeam;
use Modules\Laboratory\app\Models\Laboratory;
use Illuminate\Validation\Rule;
use Modules\Appointments\app\Models\Appointment;
use Modules\Pharmacy\app\Models\Pharmacy;
use Modules\Pathologies\app\Models\PathologyTeam;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator; // Import the Validator facade

class DashboardController extends Controller
{
     //show dashboard view
     public function showdash()
     {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter.');
        }
        //$user = null;
           //if (Auth::check())
           {
           // Récupérez l'utilisateur authentifié
           $user = Auth::user();
           }
           // Passer les données de l'utilisateur et son rôle à la vue
           return view('dashboard::Dashboard.dashboard', compact('user'));
     }
         //to show profile
         public function showmyprofile()
     {
         // Vérifiez si l'utilisateur est connecté
         if (Auth::check()) {
             // Récupérez l'utilisateur authentifié
             $user = Auth::user();
             // Passez les données de l'utilisateur à la vue
             return view('Dashboard.viewmyprofile', compact('user'));
         } else {
             // Si l'utilisateur n'est pas connecté, retournez simplement la vue sans données
             return view('Dashboard.viewmyprofile');
         }
     }
        // to show profile setting view
        public function showprofilesetting()
     {
         $user = auth()->user();


         // Use the 'with' method to pass 'timeSlots' as part of the view return
         return view('Dashboard::Dashboard.profilesetting', compact('user'));
     }

      public function appointment()
   {
       // Récupère l'utilisateur connecté
       $user = auth()->user();

       // Récupère les rendez-vous du personnel médical connecté
       $appointments = Appointment::where('staff_attendee_id', $user->medicalTeam->id)->get();

       // Retourne la vue avec les rendez-vous
       return view('Dashboard::dashboard.appointments', compact('appointments'));
   }
   public function updatePhoto(Request $request) {
     $request->validate([
         'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
     ]);

     $user = auth()->user();
     if($request->file('profile_photo')){
     $path = $request->file('profile_photo')->store('profile_photos', 'public');
     $user->profile_photo_path = $path;
     $user->save();}

     return back()->with('success', 'Profile photo updated successfully.');
 }
 public function updateEducation(Request $request) {
   $request->validate([
       'education' => 'required|string',
   ]);

   $user = auth()->user();
   $user->education = $request->input('education');
   $user->save();

   return back()->with('success', 'Education details updated successfully.');
}

public function updateExperience(Request $request) {
   $request->validate([
       'experience' => 'required|string',
   ]);

   $user = auth()->user();
   $user->experience = $request->input('experience');
   $user->save();

   return back()->with('success', 'Experience details updated successfully.');
}

public function updateAchievements(Request $request) {
   $request->validate([
       'achievements' => 'required|string',
   ]);

   $user = auth()->user();
   $user->achievements = $request->input('achievements');
   $user->save();

   return back()->with('success', 'Achievements details updated successfully.');
}


         public function updateCalendar(Request $request)
   {
           // Validation rules
           $rules = [
               'start_time' => ['required', 'date_format:H:i'],
               'end_time' => ['required', 'date_format:H:i', 'after:start_time'],
               'appointment_duration' => ['required', 'integer', 'min:1'],
               'break_duration' => ['required', 'integer', 'min:0'],
           ];

           // Validate the request data
           $validator = Validator::make($request->all(), $rules);

           // Redirect back if validation fails
           if ($validator->fails()) {
               return redirect()->back()->withErrors($validator)->withInput();
           }

           // Get the authenticated user's ID
           $userId = Auth::id();

           // Update or insert the calendar settings for the user's medical team
           DB::table('medical_team')->updateOrInsert(
               ['user_id' => $userId],
               [
                   'start_time' => $request->input('start_time'),
                   'end_time' => $request->input('end_time'),
                   'appointment_duration' => $request->input('appointment_duration'),
                   'break_duration' => $request->input('break_duration'),
               ]
           );

           // Redirect back with success message
           return redirect()->back()->with('success', 'Calendar updated successfully');
   }
   public function getAvailableSlots(Request $request)
   {
       $date = Carbon::parse($request->date);
       $dayOfWeek = strtolower($date->format('l')); // ex: 'monday'
   
       $user = auth()->user();
       $model = $this->getModelBasedOnUser($user);
   
       if (!$model || !in_array($dayOfWeek, json_decode($model->workdays, true))) {
           return response()->json(['error' => 'This day is not available for appointments.'], 422);
       }
   
       // Génération dynamique des créneaux horaires
       $start = Carbon::createFromTimeString($model->start_time); // ex: '09:00'
       $end = Carbon::createFromTimeString($model->end_time);     // ex: '17:00'
       $duration = $model->appointment_duration ?? 30;
   
       $slots = [];
       while ($start->lt($end)) {
           $slotEnd = $start->copy()->addMinutes($duration);
           if ($slotEnd->gt($end)) break;
   
           $slots[] = [
               'start' => $start->format('H:i'),
               'end' => $slotEnd->format('H:i'),
           ];
   
           $start = $slotEnd;
       }
   
       return response()->json(['slots' => $slots]);
   }
   









   public function updateProfile(Request $request)
   {
       $rules = [
           'name' => ['sometimes', 'string', 'max:255'],
           'experience'=> ['sometimes','integer'],
           'phoneNumber' => ['sometimes', 'string', 'max:255'],
           'address_complete' => ['sometimes', 'string', 'max:255'],
           'appointment_fees' => ['sometimes', 'numeric'],
           'language' => 'sometimes|in:en,fr',
           'currency_id' => 'sometimes|exists:currencies,id',
           'professional_bio' => ['sometimes', 'string'],
           'profile_photo' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
       ];

       $validatedData = $request->validate($rules);


       // Get the authenticated user
       $user = Auth::user();
       $userId = $user->id;
       $medicalTeam = DB::table('medical_team')->where('user_id', $user->id)->first();
       $company = DB::table('companies')->where('user_id', $user->id)->first();

       $path = $user->profile_photo_path;
       if ($request->file('profile_photo')) {
           $image = $request->file('profile_photo');
           $path = $image->store('profile_photos', 'public');
           $user->profile_photo_path = $path;
       }

       // Update fields in the users table
       DB::table('users')
           ->where('id', $userId)
           ->update([
               'name' => $validatedData['name'] ?? $user->name,
               'profile_photo_path' => $path,
               // Update other fields in the same manner
           ]);

       if ($medicalTeam) {
           DB::table('medical_address')
               ->where('id', $medicalTeam->medical_address_id)
               ->update([
                   'address_complete' => $validatedData['address_complete'] ?? null,
                   // Update other fields in the same manner
               ]);

           DB::table('medical_service')
               ->where('id', $medicalTeam->medical_service_id)
               ->update([
                   'appointment_fees' => $validatedData['appointment_fees'] ?? null,
                   'professional_bio' => $validatedData['professional_bio'] ?? null,
                   // Update other fields in the same manner
               ]);
       } elseif ($company) {
           // Debug: Check before update
           logger('Updating Company Professional Bio:', ['professional_bio' => $validatedData['professional_bio']]);

           DB::table('companies')
               ->where('id', $company->id)
               ->update([
                   'professional_bio' => $validatedData['professional_bio'] ?? null,
                   // Update other fields in the same manner
               ]);

           DB::table('companies_address')
               ->where('id', $company->address_id)
               ->update([
                   'address_complete' => $validatedData['address_complete'] ?? null,
                   // Update other fields in the same manner
               ]);
       }

       return redirect()->route('dashboard')->with('success', 'Profile updated successfully');
   }




       public function updateLocation(Request $request)
   {
       // Retrieve the authenticated user
       $user = auth()->user();
       $medicalTeam = DB::table('medical_team')->where('user_id', $user->id)->first();
       $company = DB::table('companies')->where('user_id', $user->id)->first();

       // Update the appropriate table based on the user's role
       if ($company) {
         $companyaddress = $company->address_id;
         DB::table('companies_address')
         ->where('id', $companyaddress)
         ->update([
             'state_id' => $request->input('state_id'),
             'dependency_id' => $request->input('dependency_id'),
             'city_id' => $request->input('city_id'),
             'country_id' => $request->input('country_id'), // Update country_id field
         ]);

       } else {
         $medicaladdress = $medicalTeam->medical_address_id;
         DB::table('medical_address')
         ->where('id',  $medicaladdress)
         ->update([
             'state_id' => $request->input('state_id'),
             'dependency_id' => $request->input('dependency_id'),
             'city_id' => $request->input('city_id'),
             'country_id' => $request->input('country_id'), // Update country_id field
         ]);
       }


       // Redirect the user back to the form or any other desired page
       return redirect()->back()->with('success', 'Location information updated successfully');
   }



   public function storeEdCer(Request $request)
   {
       // Récupérer l'utilisateur connecté
       $user = auth()->user();
       $medicalTeam = DB::table('medical_team')->where('user_id', $user->id)->first();
       $company = DB::table('companies')->where('user_id', $user->id)->first();

       // Sélectionner le nom de la table appropriée en fonction du rôle de l'utilisateur
       $tableName = null;
       $foreignKeyName = null;
       $entityId = null;
       if ($company) {
           $tableName = 'companies';
           $foreignKeyName = 'user_id';
           $entityId = $company->id;
       } else {
           $tableName = 'medical_team';
           $foreignKeyName = 'user_id';
           $entityId = $medicalTeam->id;
       }

       // Fusionner les données d'éducation actuelles avec les nouvelles données soumises
       $educationData = [
           'institutes' => $request->input('education_institute'),
           'years' => $request->input('education_year'),
           'diplomas' => $request->input('education_diploma'),
       ];

       // Fusionner les données des certificats actuelles avec les nouvelles données soumises
       $certificateData = [
           'organizations' => $request->input('certificate_organization'),
           'years' => $request->input('certificate_year'),
           'names' => $request->input('certificate_name'),
       ];

       // Récupérer l'enregistrement existant
       $existingRecord = DB::table($tableName)->where($foreignKeyName, $user->id)->first();

       if ($existingRecord) {
           // Mettre à jour les champs education et certificates
           $existingEducation = json_decode($existingRecord->education, true) ?? [];
           $existingCertificates = json_decode($existingRecord->certificates, true) ?? [];

           // Ajouter les nouvelles données aux existantes
           $existingEducation[] = $educationData;
           $existingCertificates[] = $certificateData;

           // Encoder les données mises à jour en JSON
           $educationJson = json_encode($existingEducation);
           $certificateJson = json_encode($existingCertificates);

           // Mettre à jour la base de données
           DB::table($tableName)
               ->where($foreignKeyName, $user->id)
               ->update([
                   'education' => $educationJson,
                   'certificates' => $certificateJson,
               ]);
       } else {
           // Insérer une nouvelle ligne si aucune n'existe
           $dataToInsert = [
               $foreignKeyName => $user->id,
               'education' => json_encode([$educationData]),
               'certificates' => json_encode([$certificateData]),
           ];

           DB::table($tableName)->insert($dataToInsert);
       }

       return redirect()->back()->with('success', 'Success');
   }

   public function showEdCer()
   {
       $user = auth()->user();
       $medicalTeam = DB::table('medical_team')->where('user_id', $user->id)->first();
       $company = DB::table('companies')->where('user_id', $user->id)->first();

       // Sélectionner le nom de la table appropriée en fonction du rôle de l'utilisateur
       $tableName = null;
       $foreignKeyName = null;
       if ($company) {
           $tableName = 'companies';
           $foreignKeyName = 'user_id';
       } else {
           $tableName = 'medical_team';
           $foreignKeyName = 'user_id';
       }

       // Récupérer les données d'éducation et de certificats de l'utilisateur
       $userData = DB::table($tableName)->where($foreignKeyName, $user->id)->first();

       // Passer uniquement les données pertinentes à la vue
       $educationData = [];
       $certificateData = [];
       if ($userData) {
           $educationData = json_decode($userData->education, true) ?? [];
           $certificateData = json_decode($userData->certificates, true) ?? [];
       }

       // Retourner la vue avec les données
       return view('profilesetting')->with(['educationData' => $educationData, 'certificateData' => $certificateData]);
   }

       //to show feedbacks
        public function showfeedbacks()
   {
       // Récupérer l'utilisateur connecté
       $user = auth()->user();

       // Passer les données de l'utilisateur à la vue
       return view('Dashboard.feedbacks', compact('user'));
   }
   /*    public function showspecandserv()
   {
           // Récupérer l'utilisateur connecté
           $user = auth()->user();

           // Passer les données de l'utilisateur à la vue
           return view('Dashboard.Specandserv', compact('user'));
     }*/
       //to list subservices
       public function getSubCategories(Request $request)
     {
           $user = auth()->user();
           $specialityId = $request->input('speciality_id');
           $chosenServiceIds = ChosenService::where('medical_team_id', $user->medicalTeam->id)
                               ->orWhere('laboratory_id', $user->Laboratory->id)
                               ->pluck('service_category_id');

           $subCategories = ServiceCategory::whereIn('id', $chosenServiceIds)
                               ->where('service_category_id', $specialityId)
                               ->get();

           return view('Dashboard.Specandserv', ['subCategories' => $subCategories]);
     }
       // to delete a service and its subservices
       public function deleteServiceAndSubServices(Request $request)
     {
             $categoryId = $request->input('category_id');

             ChosenService::where('service_category_id', $categoryId)->delete();


               return redirect()->back()->with('success', 'Sub-service deleted successfully');
     }
           // to delete a chosen service
       public function deleteSubService(Request $request)
     {
           // Supprimer tous les sous-services associés à cette catégorie
         $subCategoryId = $request->input('sub_category_id');
         ChosenSubService::where('subservice_id', $subCategoryId)->delete();
               // Retourner une réponse JSON pour indiquer que le sous-service a été supprimé avec succès
               return redirect()->back()->with('success', 'Sub-service deleted successfully');
     }
       //to add new sevice and subservices
       public function addNewServiceAndSubServices(Request $request)
     {
           // Valider les données soumises
           $request->validate([
             'service_category_id' => [
                 'required',
                 'exists:service_categories,id',
             ],
             'subservice_id' => [
                 'required',
                 Rule::exists('service_sub_categories', 'id')->where(function ($query) use ($request) {
                     return $query->where('service_category_id', $request->service_category_id);
                 }),
             ],
         ]);


           // Récupérer l'ID de l'utilisateur connecté dans la table medicalTeam
           $medicalTeamId = Auth::user()->medicalTeam->id;

           // Créer un nouveau service choisi
           $chosenService = new ChosenService();
           $chosenService->medical_team_id = $medicalTeamId;
           $chosenService->service_category_id = $request->service_category_id;
           $chosenService->save();

           // Créer un nouveau sous-service choisi
           $chosenSubService = new ChosenSubService();
           $chosenSubService->medical_team_id = $medicalTeamId;
           $chosenSubService->service_category_id = $request->service_category_id;
           $chosenSubService->subservice_id = $request->subservice_id;
           $chosenSubService->tarifs = $request->tarifs;
           $chosenSubService->duration = $request->duration;
           $chosenSubService->save();


           // Rediriger l'utilisateur ou effectuer d'autres opérations

           return redirect()->back()->with('message', 'Opération réussie !');
     }
       //to show payout setting view
       public function showpayoutsetting()
     {
           // Récupérer l'utilisateur connecté
           $user = auth()->user();

           // Passer les données de l'utilisateur à la vue
           return view('Dashboard.payoutsetting', compact('user'));
     }
       //to show account setting view

       //to update user's email
       public function update(Request $request)
     {
       // Valider la requête
       $request->validate([
           'email' => 'required|email|unique:users,email,'.Auth::id(),
       ]);

       // Récupérer l'e-mail à mettre à jour
       $newEmail = $request->email;

       // Mettre à jour l'e-mail de l'utilisateur dans la base de données en utilisant une requête SQL brute
       DB::table('users')
           ->where('id', Auth::id())
           ->update(['email' => $newEmail]);

       // Redirection avec un message de succès
       return redirect()->back()->with('success', 'Email updated successfully');
     }
     public function updatePassword(Request $request)
   {
       // Vérifier si le mot de passe actuel est correct
       if (!Hash::check($request->current_password, Auth::user()->password)) {
           return redirect()->back()->withErrors(['current_password' => 'The provided current password is incorrect.']);
       }

       // Valider les champs de formulaire
       $request->validate([
           'password' => 'required|min:8',
       ]);

       // Mettre à jour le mot de passe de l'utilisateur directement dans la base de données
       $updated = DB::table('users')
                       ->where('id', Auth::id())
                       ->update(['password' => Hash::make($request->password)]);

       // Vérifier si la mise à jour a réussi
       if ($updated) {
           // Redirection avec un message de succès
           return redirect()->back()->with('success', 'Password updated successfully');
       } else {
           // Redirection avec un message d'erreur si la mise à jour a échoué
           return redirect()->back()->withErrors(['password' => 'Failed to update password']);
       }
   }
       /**
        * Supprime le compte de l'utilisateur.
        *
        * @param  \Illuminate\Http\Request  $request
        * @return \Illuminate\Http\RedirectResponse
        */
       public function deleteAccount(Request $request)
       {

           // Validation des données du formulaire
           $request->validate([
               'password' => 'required|string',
           ]);

           // Vérifier si le mot de passe fourni est correct
           if (!Hash::check($request->password, auth()->user()->password)) {
               return redirect()->back()->withErrors(['password' => 'The password is incorrect.']);
           }

           // Supprimer l'utilisateur de la base de données en utilisant une requête SQL brute
           DB::table('users')->where('id', auth()->user()->id)->delete();

           // Déconnecter l'utilisateur
           auth()->logout();

           // Rediriger vers la page d'accueil avec un message de succès
           return redirect()->route('connexion')->with('success', 'Your account has been deleted successfully.');
       }


       public function showpackages()
       {
           // Récupérer l'utilisateur connecté
           $user = auth()->user();

           // Passer les données de l'utilisateur à la vue
           return view('Dashboard::Dashboard.packages', compact('user'));
       }

       public function showpayouts()
       {
           // Récupérer l'utilisateur connecté
           $user = auth()->user();

           // Passer les données de l'utilisateur à la vue
           return view('Dashboard.invoices', compact('user'));
       }

   }
