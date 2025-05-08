<?php

namespace Modules\Patient\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Patient\App\Models\Patient;
use Modules\Appointments\App\Models\Appointment;

class DashboardClientController extends Controller
{
    public function showdash()
    {
        $patient = $this->getPatient();
        return view('patient::dashboard.index', compact('patient'));
    }

    public function showaccountsetting()
{
    $patient = $this->getPatient();

    if (!$patient) {
        return redirect()->route('login')->with('error', 'Veuillez vous connecter.');
    }

    $appointments = Appointment::where('patient_id', $patient->id)->get();

    return view('appointments::appointments.index', compact('appointments'));
}


    public function showprofilesetting()
    {
        $patient = $this->getPatient();
        return view('patient::dashboard.profile_setting', compact('patient'));
    }
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'gender' => 'required|in:male,female,other',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096' // 4 Mo par exemple

        ]);
    
        // 🔁 Récupérer le patient connecté
        $patient = $this->getPatient();
    
        if ($patient) {
            // ✅ Gérer l'upload de la photo si présente
            if ($request->hasFile('profile_photo')) {
                $photo = $request->file('profile_photo');
                $path = $photo->store('profile_photos', 'public');
                $patient->profile_photo_path = $path;
            }
    
            // ✅ Mettre à jour les autres champs
            $patient->update($request->only([
                'name', 'lastname', 'phone', 'address', 'email', 'gender'
            ]));
    
            // ✅ Sauvegarder les modifications (utile si la photo a changé)
            $patient->save();
        }
    
        return redirect()->back()->with('success', 'Profil mis à jour avec succès.');
    }
    

    public function updateLocation(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
        ]);

        $patient = $this->getPatient();
        if ($patient) {
            $patient->update(['address' => $request->input('address')]);
        }

        return redirect()->back()->with('success', 'Adresse mise à jour.');
    }

    public function appointment()
    {
        $patient = Auth::user()->patient;
    
        // Récupérer les rendez-vous du patient connecté
        $appointments = $patient
            ? Appointment::where('patient_id', $patient->id)->get()
            : collect(); // retourne une collection vide si aucun patient
    
        return view('appointments::appointments.index', compact('appointments'));
    }
    
    
    

    private function getPatient()
{
    $user = Auth::user();

    if (!$user) {
        return null;
    }

    return Patient::where('email', $user->email)->first();
}

    }
    

