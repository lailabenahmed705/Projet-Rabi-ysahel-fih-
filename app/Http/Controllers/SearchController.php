<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Users\App\Models\MedicalTeam;
use Modules\Users\App\Models\MedicalType;
use Modules\Laboratory\App\Models\Laboratory;
use Modules\International\App\Models\Country;
use Modules\International\App\Models\State;
use Modules\International\App\Models\City;
use Modules\Pharmacy\App\Models\Pharmacy;
class SearchController extends Controller
{
    public function searchAutoComplete(Request $request)
    {
        $term = $request->input('term');
        $field = $request->input('field');

        switch ($field) {
            case 'search_category':
                $results = MedicalTeam::where('name', 'LIKE', '%' . $term . '%')->get();
                break;
            case 'country':
                $results = Country::where('name', 'LIKE', '%' . $term . '%')->get();
                break;
            case 'states':
                $results = State::where('name', 'LIKE', '%' . $term . '%')->get();
                break;
           
            case 'cities':
                $results = City::where('name', 'LIKE', '%' . $term . '%')->get();
                break;
            default:
                $results = [];
                break;
        }

        return response()->json($results);
    }

    public function search(Request $request)
    {
        $term = $request->input('search_category');
        $cityName = $request->input('city_name');

        $medicalTeams = MedicalTeam::with('user', 'medicalType')->whereHas('user', function ($q) use ($term) {
            $q->where('name', 'like', '%' . $term . '%');
        });

        $pharmacies = Pharmacy::query()->where('name', 'like', '%' . $term . '%');
        $laboratories = Laboratory::query()->where('name', 'like', '%' . $term . '%');

        if ($cityName) {
            $cityIds = City::where('name', 'like', '%' . $cityName . '%')->pluck('id');

            $medicalTeams->whereIn('city_id', $cityIds);
            $pharmacies->whereIn('city_id', $cityIds);
            $laboratories->whereIn('city_id', $cityIds);
        }

        return view('Homepage.search', [
            'medicalTeams' => $medicalTeams->get(),
            'pharmacies' => $pharmacies->get(),
            'laboratories' => $laboratories->get(),
            'term' => $term,
        ]);
    }


    public function showProfile($id)
{
    $medicalteam = MedicalTeam::findOrFail($id); // Récupérez l'équipe médicale avec l'ID spécifié
    return view('Homepage.singleprofile', compact('medicalteam')); // Passez la variable $medicalteam à votre vue
}
public function showpharprofile($id)
{
    $pharmacy = Pharmacy::findOrFail($id); // Récupérez l'équipe médicale avec l'ID spécifié
    return view('Homepage.pharprofile', compact('pharmacy')); // Passez la variable $medicalteam à votre vue
}
public function showlabprofile($id)
{
    $lab = Laboratory::findOrFail($id); // Récupérez l'équipe médicale avec l'ID spécifié
    return view('Homepage.labprofile', compact('lab')); // Passez la variable $medicalteam à votre vue
}
}