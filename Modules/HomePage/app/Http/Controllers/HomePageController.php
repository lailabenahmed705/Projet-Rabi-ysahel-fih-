<?php

namespace Modules\HomePage\App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Modules\Users\app\Models\MedicalType;
use Modules\Users\app\Models\MedicalTeam;
use Modules\Users\app\Models\Company;
use Modules\International\app\Models\Country;
use Modules\International\app\Models\State;
use Modules\International\app\Models\Dependency;
use Modules\International\app\Models\City;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class HomePageController extends Controller
{
    public function index()
    {
        $medicalTypes = MedicalType::whereIn('name', ['Docteur', 'infirmier', 'kinésithérapeute', 'soignant', 'sage femme'])->get();
        $companyTypes = Company::select('company_type')->distinct()->get();

        $planIds = DB::table('feature_plan')
            ->where('feature_id', 18)
            ->pluck('plan_id');

        $userIds = DB::table('orders')
            ->whereIn('plan_id', $planIds)
            ->where('status', 'active')
            ->pluck('user_id');

        $doctors = User::whereIn('id', $userIds)
            ->where('role_id', 8)
            ->get();

        foreach ($doctors as $doctor) {
            $doctor->feedback_count = rand(1, 49);
            $doctor->image_url = $doctor->profile_photo_path ? $doctor->profile_photo_path : 'assets/images/uu.png';

            $medicalteam = DB::table('medical_team')->where('user_id', $doctor->id)->first();
            if ($medicalteam) {
                $medical_address = DB::table('medical_address')->where('id', $medicalteam->medical_address_id)->first();
                if ($medical_address) {
                    $dependency = DB::table('dependencies')->where('id', $medical_address->dependency_id)->first();
                    $state = DB::table('states')->where('id', $medical_address->state_id)->first();
                    if ($dependency && $state) {
                        $doctor->location = $dependency->name . ', ' . $state->name;
                    }
                } else {
                    $doctor->location = 'Everywhere';
                }
            }
        }

        return view('homePage::Homepage.Accueil', compact('medicalTypes', 'companyTypes', 'doctors'));
    }

    public function showMedicalType(Request $request)
    {
        $searchCategory = $request->input('search_category');

        $query = MedicalTeam::query();

        if (strpos($searchCategory, 'm-') === 0) {
            $medicalType = substr($searchCategory, 2);
            $query->where('medical_type_id', $medicalType);
        }

        $medicalTeams = $query->get();

        return view('homePage::Homepage.healthmeds', compact('medicalTeams'));
    }

    public function showcompany()
    {
        $companies = Company::all();
        return view('homePage::Homepage.companies', compact('companies'));
    }

    public function showcompanies(Request $request)
    {
        $searchCategory = $request->input('search_category');
        $searchLocation = $request->input('location');

        $query = Company::query();

        if (strpos($searchCategory, 'c-') === 0) {
            $companyType = substr($searchCategory, 2);
            $query->where('company_type', $companyType);
        }

        if (!empty($searchLocation)) {
            $query->whereHas('companyaddress.city', function ($query) use ($searchLocation) {
                $query->where('name', 'like', "%{$searchLocation}%")
                    ->orWhere('iso_code', 'like', "%{$searchLocation}%");
            });
        }

        $companies = $query->get();

        return view('homePage::Homepage.companies', compact('companies'));
    }

    public function showstaff()
    {
        $medicalTeams = MedicalTeam::all();
        return view('homePage::Homepage.healthmeds', compact('medicalTeams'));
    }

    public function showHealthMeds(Request $request)
    {
        $searchCategory = $request->input('search_category');
        $searchLocation = $request->input('location');

        $query = MedicalTeam::query();

        if (strpos($searchCategory, 'm-') === 0) {
            $medicalType = substr($searchCategory, 2);
            $query->where('medical_type_id', $medicalType);
        }

        if (!empty($searchLocation)) {
            $query->whereHas('medicalAddress.city', function ($query) use ($searchLocation) {
                $query->where('name', 'like', "%{$searchLocation}%")
                    ->orWhere('iso_code', 'like', "%{$searchLocation}%");
            });
        }

        $medicalTeams = $query->get();

        return view('homePage::Homepage.healthmeds', compact('medicalTeams'));
    }
}
